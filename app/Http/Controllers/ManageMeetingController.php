<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meeting;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;

class ManageMeetingController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $meetings = Meeting::where('created_by', $user->id)->orderBy('due_date')->get();
        $teams = Team::all();

        return view('manager.manage_meetings', compact('meetings', 'teams'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'due_date' => 'required|date',
            'status' => 'required|string',
            'assignee' => 'nullable|integer|exists:teams,team_id'
        ]);

        Meeting::create([
            'name' => $request->input('name'),
            'due_date' => $request->input('due_date'),
            'status' => $request->input('status'),
            'created_by' => Auth::id(),
            'assignee' => $request->input('assignee')
        ]);
        return redirect()->route('meetings.index')->with('success', 'Meeting created!');
    }

    public function update(Request $request, Meeting $meeting)
    {
        $request->validate([
            'name' => 'required|string',
            'due_date' => 'required|date',
            'status' => 'required|string',
            'assignee' => 'nullable|integer|exists:teams,team_id'
        ]);

        $meeting->update([
            'name' => $request->input('name'),
            'due_date' => $request->input('due_date'),
            'status' => $request->input('status'),
            'assignee' => $request->input('assignee')
        ]);
        return redirect()->route('meetings.index')->with('success', 'Meeting updated!');
    }

    public function destroy(Meeting $meeting)
    {
        $meeting->delete();
        return redirect()->route('meetings.index')->with('success', 'Meeting deleted!');
    }
}