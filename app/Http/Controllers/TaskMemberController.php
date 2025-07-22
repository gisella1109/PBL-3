<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;
use App\Models\User;

class TaskMemberController extends Controller
{
    // Tampilkan daftar tugas milik user yang sedang login
    public function index()
    {
        $member_id = Auth::id();
        $user = User::findOrFail($member_id);
        $tasks = Task::where('member_id', $member_id)->orderBy('deadline')->get();

        return view('member.task_member', [
            'profile_image' => $user->profile_image,
            'display_name' => $user->username,
            'role' => $user->role,
            'tasks' => $tasks,
        ]);
    }

    // Update status tugas
    public function updateStatus(Request $request, $id)
    {
        $task = Task::where('id', $id)->where('member_id', Auth::id())->firstOrFail();

        $request->validate([
            'status' => 'required|in:Belum Selesai,Dalam Proses,Selesai',
        ]);

        $task->status = $request->input('status');
        $task->save();

        return redirect()->route('task_member.index')->with('success', 'Task status updated!');
    }
     // Form submit tugas (GET)
    public function submitForm($id)
    {
        $task = Task::where('id', $id)
            ->where('member_id', auth()->id())
            ->firstOrFail();

        return view('member.submit_task', compact('task'));
    }

    // Proses submit tugas (POST)
    // Proses submit tugas (POST)
public function submit(Request $request, $id)
{
    $request->validate([
        'submission_text' => 'required|string',
        'submission_file' => 'nullable|file|max:20480',
    ]);

    $task = Task::where('id', $id)
        ->where('member_id', auth()->id())
        ->firstOrFail();

    $submission_file = $task->submission_file;
    if ($request->hasFile('submission_file')) {
        $filename = time() . '_' . $request->file('submission_file')->getClientOriginalName();
        $path = $request->file('submission_file')->storeAs('uploads', $filename, 'public');
        $submission_file = 'storage/' . $path;
    }

    $task->submission_text = $request->input('submission_text'); // PERBAIKAN DI SINI
    $task->submission_file = $submission_file;
    $task->status = 'Selesai';
    $task->save();

    return redirect()->route('task_member.index')->with('swal', [
        'icon' => 'success',
        'title' => 'Submission Success',
        'text'  => 'Tugas berhasil di-submit!',
        'timer' => 1800,
    ]);
}
}