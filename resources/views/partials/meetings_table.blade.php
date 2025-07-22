{{-- Meetings Stats Cards --}}
<div style="background:#d0eaeb; border-radius:1.25rem; box-shadow:0 1px 6px rgba(0,0,0,0.08); overflow:hidden; margin-bottom:2.5rem;">
    <div style="display: flex; flex-wrap: wrap; gap: 1.5rem; padding: 1.5rem; background: #96d3da; border-bottom: 1.5px solid #d0eaeb; justify-content: space-between;">
        <div style="flex: 1 1 200px; min-width: 220px; background:#fff; border-radius:1rem; padding:1.25rem; margin:0; box-shadow:0 1px 6px rgba(0,0,0,0.04); display: flex; align-items: center;">
            <div style="padding:0.5rem; background:#d0eaeb; border-radius:0.5rem;">
                <svg style="width:1.5rem; height:1.5rem; color:#0067ac;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                </svg>
            </div>
            <div style="margin-left:1rem;">
                <p style="font-size:0.95rem; font-weight:500; color:#0067ac;">Total Meetings</p>
                <p style="font-size:2rem; font-weight:bold; color:#0067ac;">{{ $meetings->count() }}</p>
            </div>
        </div>
        <div style="flex: 1 1 200px; min-width: 220px; background:#fff; border-radius:1rem; padding:1.25rem; margin:0; box-shadow:0 1px 6px rgba(0,0,0,0.04); display: flex; align-items: center;">
            <div style="padding:0.5rem; background:#e53e3e1a; border-radius:0.5rem;">
                <svg style="width:1.5rem; height:1.5rem; color:#e53e3e;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <div style="margin-left:1rem;">
                <p style="font-size:0.95rem; font-weight:500; color:#e53e3e;">To Do</p>
                <p style="font-size:2rem; font-weight:bold; color:#e53e3e;">{{ $meetings->where('status', 'To Do')->count() }}</p>
            </div>
        </div>
        <div style="flex: 1 1 200px; min-width: 220px; background:#fff; border-radius:1rem; padding:1.25rem; margin:0; box-shadow:0 1px 6px rgba(0,0,0,0.04); display: flex; align-items: center;">
            <div style="padding:0.5rem; background:#ffe066; border-radius:0.5rem;">
                <svg style="width:1.5rem; height:1.5rem; color:#b28704;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                </svg>
            </div>
            <div style="margin-left:1rem;">
                <p style="font-size:0.95rem; font-weight:500; color:#b28704;">In Progress</p>
                <p style="font-size:2rem; font-weight:bold; color:#b28704;">{{ $meetings->where('status', 'In Progress')->count() }}</p>
            </div>
        </div>
        <div style="flex: 1 1 200px; min-width: 220px; background:#fff; border-radius:1rem; padding:1.25rem; margin:0; box-shadow:0 1px 6px rgba(0,0,0,0.04); display: flex; align-items: center;">
            <div style="padding:0.5rem; background:#38a1691a; border-radius:0.5rem;">
                <svg style="width:1.5rem; height:1.5rem; color:#38a169;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <div style="margin-left:1rem;">
                <p style="font-size:0.95rem; font-weight:500; color:#38a169;">Completed</p>
                <p style="font-size:2rem; font-weight:bold; color:#38a169;">{{ $meetings->where('status', 'Done')->count() }}</p>
            </div>
        </div>
    </div>
</div>

{{-- Modern Meetings Table --}}
@if($meetings->count())
    {{-- Boxicons CDN --}}
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        .meeting-table-wrap {
            overflow-x: auto;
            background: #fff;
            border-radius: 1.25rem;
            box-shadow: 0 2px 16px #0067ac10;
            margin-bottom: 2.5rem;
        }
        .meeting-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            min-width: 800px;
        }
        .meeting-table thead tr {
            background: #96d3da;
        }
        .meeting-table th, .meeting-table td {
            padding: 1rem 1.2rem;
            text-align: left;
            font-size: 1rem;
            color: #0067ac;
        }
        .meeting-table th {
            font-weight: 700;
            border-bottom: 2px solid #d0eaeb;
            letter-spacing: 0.03em;
        }
        .meeting-table tbody tr {
            border-bottom: 1px solid #e9f4f7;
            transition: background 0.16s;
        }
        .meeting-table tbody tr:hover {
            background: #f3fbfd;
        }
        .meeting-table .meeting-status {
            display: inline-block;
            font-size: 0.95rem;
            font-weight: 600;
            border-radius: 0.75rem;
            padding: 0.32rem 1.1rem;
        }
        .meeting-status.todo {
            background: #e53e3e1a;
            color: #e53e3e;
        }
        .meeting-status.inprogress {
            background: #ffe066;
            color: #b28704;
        }
        .meeting-status.done {
            background: #38a1691a;
            color: #38a169;
        }
        .meeting-table .icon-btn {
            background: #0067ac;
            color: #fff;
            border-radius: 0.5rem;
            padding: 0.45rem 0.9rem;
            border: none;
            cursor: pointer;
            font-size: 1.18rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: background 0.18s;
            margin-right: 0.18rem;
        }
        .meeting-table .icon-btn:hover {
            background: #38a169;
        }
        .meeting-table .delete-btn {
            background: #e53e3e;
        }
        .meeting-table .delete-btn:hover {
            background: #b91c1c;
        }
        @media (max-width: 900px) {
            .meeting-table {
                min-width: 600px;
                font-size: 0.96rem;
            }
        }
        @media (max-width: 600px) {
            .meeting-table th, .meeting-table td {
                padding: 0.65rem 0.5rem;
                font-size: 0.92rem;
            }
        }
    </style>
    <div class="meeting-table-wrap">
        <table class="meeting-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Team</th>
                    <th>Status</th>
                    <th>Due Date</th>
                    <th style="text-align:center;">Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($meetings as $meeting)
                <tr>
                    <td style="max-width:220px; word-break:break-word;">{{ $meeting->name }}</td>
                    <td>
                        @if($meeting->assignee)
                            @php $assignedTeam = $teams->firstWhere('team_id', $meeting->assignee); @endphp
                            <span>{{ $assignedTeam ? $assignedTeam->name : 'Not found' }}</span>
                        @else
                            <span style="color:#96d3da;">Unassigned</span>
                        @endif
                    </td>
                    <td>
                        <span class="meeting-status
                            {{ $meeting->status == 'To Do' ? 'todo' : ($meeting->status == 'In Progress' ? 'inprogress' : ($meeting->status == 'Done' ? 'done' : '')) }}">
                            {{ $meeting->status }}
                        </span>
                    </td>
                    <td>
                        {{ \Carbon\Carbon::parse($meeting->due_date)->format('d M Y') }}
                    </td>
                    <td style="text-align:center;">
                        <button type="button" class="icon-btn"
                            title="Edit"
                            onclick="openModal('editMeetingModal{{ $meeting->id }}')">
                            <i class='bx bx-edit-alt'></i>
                        </button>
                        <form method="POST" action="{{ route('meetings.destroy', $meeting->id) }}"
                            onsubmit="return confirm('Are you sure you want to delete this meeting?')" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="icon-btn delete-btn" title="Delete">
                                <i class='bx bx-trash'></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @includeIf('partials.edit_meeting_modal', ['meeting' => $meeting, 'teams' => $teams])
            @endforeach
            </tbody>
        </table>
    </div>
@else
    <div style="text-align:center; color:#96d3da; font-size:1.1rem; margin:2rem 0;">
        No meetings found.
    </div>
@endif