<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\TeamMember;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class TeamController extends Controller
{
    // Tampilkan halaman utama: daftar tim, form invite, form create team
    public function index()
    {
        $user = Auth::user();

        // Semua tim yang dibuat user ini
        $teams = Team::with(['members.user'])
            ->where('created_by', $user->id)
            ->get();

        // Semua user role member
        $members = User::where('role', 'member')->get();

        // Ambil tim terakhir yang dibuat user
        $lastTeam = Team::where('created_by', $user->id)
            ->orderByDesc('created_at')
            ->first();

        return view('manager.invite_member', compact('teams', 'members', 'lastTeam'));
    }

    // Tampilkan form buat tim (opsional)
    public function create()
    {
        return view('manager.create_team');
    }

    // Simpan tim baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $team = Team::create([
            'name' => $request->input('name'),
            'created_by' => Auth::id(),
            'created_at' => now()
        ]);

        return redirect()->route('teams.index')
            ->with('swal', [
                'icon' => 'success',
                'title' => 'Berhasil!',
                'text' => "Tim {$team->name} berhasil dibuat.",
                'timer' => 2000,
            ]);
    }

    // Invite member (dengan select member, lalu select team)
    public function inviteMemberDynamic(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|exists:users,username',
            'team_id'  => 'required|integer|exists:teams,team_id'
        ]);

        if ($validator->fails()) {
            return back()->with('swal', [
                'icon' => 'error',
                'title' => 'Gagal!',
                'text' => 'Data tidak valid.',
                'timer' => 2200,
            ]);
        }

        $team = Team::findOrFail($request->input('team_id'));
        $member = User::where('username', $request->input('username'))->first();

        if (!$member) {
            return back()->with('swal', [
                'icon' => 'error',
                'title' => 'Gagal!',
                'text' => 'Username tidak ditemukan.',
                'timer' => 2200,
            ]);
        }

        if (TeamMember::where('team_id', $team->team_id)->where('user_id', $member->id)->exists()) {
            return back()->with('swal', [
                'icon' => 'error',
                'title' => 'Gagal!',
                'text' => 'User sudah tergabung di tim ini.',
                'timer' => 2500,
            ]);
        }

        TeamMember::create([
            'team_id'   => $team->team_id,
            'user_id'   => $member->id,
            'role'      => 'member',
            'status'    => 'pending',
            'invited_at'=> Carbon::now()
        ]);

        return back()->with('swal', [
            'icon' => 'success',
            'title' => 'Berhasil!',
            'text' => "Invite berhasil dikirim ke {$member->username}.",
            'timer' => 2000,
        ]);
    }

    // Detail tim (opsional)
    public function show($id)
    {
        $team = Team::with('members.user')->findOrFail($id);
        return view('manager.team_detail', compact('team'));
    }

    // Edit nama tim (opsional)
    public function edit($id)
    {
        $team = Team::findOrFail($id);
        return view('manager.edit_team', compact('team'));
    }

    // Update tim (opsional)
    public function update(Request $request, $id)
    {
        $team = Team::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255'
        ]);
        $team->update(['name' => $request->input('name')]);
        return redirect()->route('teams.index')
            ->with('swal', [
                'icon' => 'success',
                'title' => 'Berhasil!',
                'text' => 'Nama tim berhasil diupdate.',
                'timer' => 2000,
            ]);
    }

    // Hapus tim (opsional)
    public function destroy($id)
    {
        $team = Team::findOrFail($id);
        $team->delete();
        return redirect()->route('teams.index')
            ->with('swal', [
                'icon' => 'success',
                'title' => 'Berhasil!',
                'text' => 'Tim berhasil dihapus.',
                'timer' => 2000,
            ]);
    }
}