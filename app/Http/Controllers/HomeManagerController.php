<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;
use App\Models\Team;
use App\Models\TeamMember;
use App\Models\ScheduleList;
use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;

class HomeManagerController extends Controller
{
    public function index()
    {
        $manager = Auth::user();
        if (!$manager || $manager->role !== 'Manager') {
            abort(403, 'Unauthorized');
        }

        // Jumlah schedule (jadwal) yang di-assignee ke manager
        $schedule_count = ScheduleList::where('assignee', $manager->id)->count();

        // Jumlah teams yang dibuat oleh manager
        $team_count = Team::where('created_by', $manager->id)->count();

        // Id semua team yang dibuat manager
        $team_ids = Team::where('created_by', $manager->id)->pluck('team_id')->toArray();

        // Jumlah member dari semua tim yang dibuat manager
        $member_count = TeamMember::whereIn('team_id', $team_ids)->count();

        // Get daftar tugas untuk semua member di tim manager
        $member_ids = TeamMember::whereIn('team_id', $team_ids)->pluck('user_id')->toArray();
        $tugas_data = Task::with('member')
            ->whereIn('member_id', $member_ids)
            ->orderBy('deadline', 'asc')
            ->get();

        // Untuk keperluan dashboard, Anda juga bisa mengambil data lain sesuai kebutuhan

        return view('Manager.manager_dashboard', [
            'schedule_count' => $schedule_count,
            'team_count' => $team_count,
            'member_count' => $member_count,
            'tugas_data' => $tugas_data
        ]);
    }
}