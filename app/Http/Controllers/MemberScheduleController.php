<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Meeting;
use App\Models\TeamMember;
use App\Models\User;

class MemberScheduleController extends Controller
{
    /**
     * Display a listing of the meetings for the member.
     */
    public function index()
    {
        $user = Auth::user();

        // Cek login pertama
        if ($user->is_first_login) {
            return redirect()->route('customize_profile');
        }

        // Query laravel versi dari query native kamu:
        $meetings = Meeting::query()
            ->join('team_members', 'meetings.assignee', '=', 'team_members.team_id')
            ->join('users as creators', 'meetings.created_by', '=', 'creators.id')
            ->select(
                'meetings.id',
                'meetings.name',
                'meetings.due_date',
                'meetings.status',
                'creators.username as created_by'
            )
            ->where('team_members.user_id', $user->id)
            ->where('team_members.status', 'active')
            ->orderBy('meetings.due_date', 'asc')
            ->get();

        return view('member.schedule', [
            'meetings' => $meetings,
            'user' => $user,
        ]);
    }

    // Anda bisa implementasikan resource controller lain (create, store, show, edit, update, destroy) jika perlu,
    // namun untuk kebutuhan "lihat jadwal" cukup index saja.
}