<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Tampilkan daftar semua tugas
    public function index()
    {
        // Ambil semua tugas dengan relasi member
        $tugas_data = Task::with('member')->orderBy('deadline', 'asc')->get();
        $members = User::where('role', 'member')->get();
        // Tugas yang statusnya 'Selesai' untuk submission
        $task_submissions = Task::with('member')->where('status', 'Selesai')->get();

        return view('manager.task_manager', compact('tugas_data', 'members', 'task_submissions'));
    }

    // Simpan tugas baru
    public function store(Request $request)
    {
        $request->validate([
            'assigned_member' => 'required|exists:users,id',
            'task_name' => 'required|string|max:255',
            'deadline' => 'required|date',
            'status' => 'required|string|max:32',
            'description' => 'nullable|string',
        ]);

        Task::create([
            'member_id' => $request->input('assigned_member'),
            'nama' => $request->input('task_name'),
            'deadline' => $request->input('deadline'),
            'status' => $request->input('status'),
            'deskripsi' => $request->input('description'),
        ]);

        return redirect()->route('tasks.index')->with('swal', [
            'icon' => 'success',
            'title' => 'Berhasil!',
            'text' => 'Tugas berhasil ditambahkan.',
            'timer' => 2000,
        ]);
    }

    // (Optional) Show detail tugas
    public function show($id)
    {
        $task = Task::with('member')->findOrFail($id);
        return view('manager.task_detail', compact('task'));
    }

    // (Optional) Tampilkan form edit tugas
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        $members = User::where('role', 'member')->get();
        return view('manager.edit_task', compact('task', 'members'));
    }

    // (Optional) Update tugas
    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $request->validate([
            'assigned_member' => 'required|exists:users,id',
            'task_name' => 'required|string|max:255',
            'deadline' => 'required|date',
            'status' => 'required|string|max:32',
            'description' => 'nullable|string',
        ]);
        $task->update([
            'member_id' => $request->input('assigned_member'),
            'nama' => $request->input('task_name'),
            'deadline' => $request->input('deadline'),
            'status' => $request->input('status'),
            'deskripsi' => $request->input('description'),
        ]);
        return redirect()->route('tasks.index')->with('swal', [
            'icon' => 'success',
            'title' => 'Berhasil!',
            'text' => 'Tugas berhasil diupdate.',
            'timer' => 2000,
        ]);
    }

    // (Optional) Hapus tugas
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->route('tasks.index')->with('swal', [
            'icon' => 'success',
            'title' => 'Berhasil!',
            'text' => 'Tugas berhasil dihapus.',
            'timer' => 2000,
        ]);
    }
}