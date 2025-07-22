<?php

namespace App\Http\Controllers;

use App\Models\ScheduleList;
use App\Models\User;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = ScheduleList::with('assigneeUser')->orderBy('start_datetime')->get();
        $members = User::where('role', 'member')->get();
        return view('manager.schedule', compact('schedules', 'members'));
    }

    public function create()
    {
        $members = User::where('role', 'member')->get();
        return view('manager.schedule_create', compact('members'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_datetime' => 'required|date',
            'end_datetime' => 'required|date|after_or_equal:start_datetime',
            'assignee' => 'nullable|exists:users,id',
        ]);

        $validated['status'] = 'pending';

        ScheduleList::create($validated);

        return redirect()->route('schedule.index')->with('success', 'Schedule created!');
    }

    public function show(string $id)
    {
        $schedule = ScheduleList::with('assigneeUser')->findOrFail($id);
        return view('manager.schedule_show', compact('schedule'));
    }

    public function edit(string $id)
    {
        $schedule = ScheduleList::findOrFail($id);
        $members = User::where('role', 'member')->get();
        return view('manager.schedule_edit', compact('schedule', 'members'));
    }

    public function update(Request $request, string $id)
    {
        $schedule = ScheduleList::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_datetime' => 'required|date',
            'end_datetime' => 'required|date|after_or_equal:start_datetime',
            'assignee' => 'nullable|exists:users,id',
        ]);

        // Status tetap biarkan tidak bisa diubah dari sini (default/persist existing)
        $validated['status'] = $schedule->status ?? 'pending';

        $schedule->update($validated);

        return redirect()->route('schedule.index')->with('success', 'Schedule updated!');
    }

    public function destroy(string $id)
    {
        $schedule = ScheduleList::findOrFail($id);
        $schedule->delete();

        return redirect()->route('schedule.index')->with('success', 'Schedule deleted!');
    }

    public function load()
    {
        $events = ScheduleList::select([
            'id',
            'title',
            'description',
            'start_datetime as start',
            'end_datetime as end',
            'status',
            'assignee'
        ])->get();

        $events->transform(function ($event) {
            return [
                'id' => $event->id,
                'title' => $event->title,
                'description' => $event->description,
                'start' => $event->start,
                'end' => $event->end,
                'status' => $event->status,
                'assignee' => $event->assignee,
            ];
        });

        return response()->json($events);
    }
}