<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamMemberController extends Controller
{
    /**
     * Tampilkan daftar anggota tim (semua status)
     * atau daftar semua tim user yang login.
     */
    public function index(Request $request, $team_id = null)
    {
        $user = Auth::user();

        if ($team_id) {
            // Tanpa filter status: tampilkan SEMUA anggota tim
            $team = Team::findOrFail($team_id);

            $members = TeamMember::with('user')
                ->where('team_id', $team_id)
                ->get();

            return view('member.teams', [
                'team' => $team,
                'members' => $members,
                'teams' => null,
                'user' => $user,
            ]);
        } else {
            // Jika tidak ada team_id, tampilkan semua tim user login
            $teams = Team::whereHas('members', function($q) use ($user) {
                $q->where('user_id', $user->id);
            })->get();

            return view('member.teams', [
                'teams' => $teams,
                'team' => null,
                'members' => null,
                'user' => $user,
            ]);
        }
    }

    public function updateStatus(Request $request)
    {
        $request->validate([
            'team_id' => 'required|integer|exists:teams,team_id',
            'user_id' => 'required|integer|exists:users,id',
            'action'  => 'required|in:accept,reject',
        ]);

        $user = Auth::user();
        // Pastikan user yang login hanya bisa update status miliknya sendiri
        if ($user->id != $request->input('user_id')) {
            abort(403, 'Unauthorized action.');
        }

        $teamMember = TeamMember::where('team_id', $request->input('team_id'))
            ->where('user_id', $request->input('user_id'))
            ->firstOrFail();

        if ($request->input('action') === 'accept') {
            $teamMember->status = 'active';
        } else {
            $teamMember->status = 'rejected'; // Atau hapus record jika ingin, atau tetap 'pending' tergantung kebutuhan
        }
        $teamMember->save();

        return redirect()->back()->with('swal', [
            'icon' => 'success',
            'title' => 'Status Updated!',
            'text' => 'Team invitation has been ' . ($request->input('action') === 'accept' ? 'accepted.' : 'rejected.'),
            'timer' => 1600,
        ]);
    }
}