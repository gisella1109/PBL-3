<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;
use App\Models\TeamMember;
use App\Models\ScheduleList;
use App\Models\Meeting;
use Illuminate\Support\Facades\Auth;

class HomeMemberController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if (!$user || $user->role !== 'Member') {
            abort(403, 'Unauthorized');
        }

        // Jumlah meetings yang di-assignee ke user (member)
        $meetings_count = Meeting::where('assignee', $user->id)->count();

        // Jumlah schedule (jadwal) yang di-assignee ke user (member)
        $schedule_count = ScheduleList::where('assignee', $user->id)->count();

        // Jumlah teams aktif yang diikuti member
        $teams_count = TeamMember::where('user_id', $user->id)->where('status', 'active')->count();

        // Daftar tugas milik member
        $tasks = Task::where('member_id', $user->id)->orderBy('deadline', 'asc')->get();

        return view('member.dashboard_member', [
            'meetings_count' => $meetings_count,
            'schedule_count' => $schedule_count,
            'teams_count'    => $teams_count,
            'tasks'          => $tasks,
        ]);
    }
    public function schedulesJson()
{
    $user = Auth::user();
    if (!$user || $user->role !== 'Member') {
        abort(403, 'Unauthorized');
    }

    // Ambil semua schedule yang di-assignee ke member (user)
    $schedules = \App\Models\ScheduleList::where('assignee', $user->id)->get();

    // Format data sesuai kebutuhan FullCalendar
    $events = $schedules->map(function($schedule) {
        return [
            'id' => $schedule->id,
            'title' => $schedule->title ?? 'Schedule',
            'start' => $schedule->start, // Pastikan kolom 'start' ada di tabel!
            'end'   => $schedule->end,   // Pastikan kolom 'end' ada di tabel (atau null)
            'description' => $schedule->description ?? '',
        ];
    });

    return response()->json($events);
}
public function acceptSchedule(Request $request)
{
    $user = Auth::user();
    if (!$user || $user->role !== 'Member') {
        abort(403, 'Unauthorized');
    }

    $scheduleId = $request->input('schedule_id');
    $schedule = \App\Models\ScheduleList::where('id', $scheduleId)
                ->where('assignee', $user->id)
                ->firstOrFail();

    // Misal field status: 'pending', 'accepted', 'rejected'
    $schedule->status = 'accepted';
    $schedule->save();

    return response()->json(['success' => true]);
}

public function rejectSchedule(Request $request)
{
    $user = Auth::user();
    if (!$user || $user->role !== 'Member') {
        abort(403, 'Unauthorized');
    }

    $scheduleId = $request->input('schedule_id');
    $schedule = \App\Models\ScheduleList::where('id', $scheduleId)
                ->where('assignee', $user->id)
                ->firstOrFail();

    $schedule->status = 'rejected';
    $schedule->save();

    return response()->json(['success' => true]);
}
}