@extends('layouts.dashboard_manager')

@section('content')
<div style="max-width:100%; overflow:hidden;">
    <!-- Header Dashboard -->
    <div style="margin-bottom:1.5rem;">
        <h1 style="font-size:2rem; font-weight:bold; color:#0067ac;">Dashboard Manager</h1>
        <p style="color:#0067ac;">Welcome back! Here's what's happening today.</p>
    </div>

    <!-- Stats Cards -->
    <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(240px,1fr)); gap:1.5rem; margin-bottom:1.5rem;">
        <div style="background: #96d3da; padding:1.25rem; border-radius:1.25rem; box-shadow:0 1px 6px rgba(0,0,0,0.08); border:1.5px solid #d0eaeb;">
            <div style="display:flex; align-items:center;">
                <div style="padding:0.5rem; background:#d0eaeb; border-radius:0.5rem;">
                    <i class="bx bx-calendar-event" style="color:#0067ac;"></i>
                </div>
                <div style="margin-left:0.75rem;">
                    <p style="font-size:0.95rem; font-weight:500; color:#0067ac;">Total Schedules</p>
                    <p style="font-size:1.25rem; font-weight:bold; color:#fff;">{{ $schedule_count }}</p>
                </div>
            </div>
        </div>
        
        <div style="background: #96d3da; padding:1.25rem; border-radius:1.25rem; box-shadow:0 1px 6px rgba(0,0,0,0.08); border:1.5px solid #d0eaeb;">
            <div style="display:flex; align-items:center;">
                <div style="padding:0.5rem; background:#d0eaeb; border-radius:0.5rem;">
                    <i class="bx bx-group" style="color:#0067ac;"></i>
                </div>
                <div style="margin-left:0.75rem;">
                    <p style="font-size:0.95rem; font-weight:500; color:#0067ac;">Teams</p>
                    <p style="font-size:1.25rem; font-weight:bold; color:#fff;">{{ $team_count }}</p>
                </div>
            </div>
        </div>
        
        <div style="background: #96d3da; padding:1.25rem; border-radius:1.25rem; box-shadow:0 1px 6px rgba(0,0,0,0.08); border:1.5px solid #d0eaeb;">
            <div style="display:flex; align-items:center;">
                <div style="padding:0.5rem; background:#d0eaeb; border-radius:0.5rem;">
                    <i class="bx bx-user" style="color:#0067ac;"></i>
                </div>
                <div style="margin-left:0.75rem;">
                    <p style="font-size:0.95rem; font-weight:500; color:#0067ac;">Members</p>
                    <p style="font-size:1.25rem; font-weight:bold; color:#fff;">{{ $member_count }}</p>
                </div>
            </div>
        </div>

        <div style="background: #96d3da; padding:1.25rem; border-radius:1.25rem; box-shadow:0 1px 6px rgba(0,0,0,0.08); border:1.5px solid #d0eaeb;">
            <div style="display:flex; align-items:center;">
                <div style="padding:0.5rem; background:#d0eaeb; border-radius:0.5rem;">
                    <i class="bx bx-task" style="color:#0067ac;"></i>
                </div>
                <div style="margin-left:0.75rem;">
                    <p style="font-size:0.95rem; font-weight:500; color:#0067ac;">Total Tasks</p>
                    <p style="font-size:1.25rem; font-weight:bold; color:#fff;">{{ $tugas_data->count() }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Extra stats (completed/pending/overdue) -->
    <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(240px,1fr)); gap:1.5rem; margin-bottom:1.5rem;">
        <div style="background: #96d3da; padding:1.25rem; border-radius:1.25rem; box-shadow:0 1px 6px rgba(0,0,0,0.08); border:1.5px solid #d0eaeb;">
            <div style="display:flex; align-items:center;">
                <div style="padding:0.5rem; background:#d0eaeb; border-radius:0.5rem;">
                    <i class="bx bx-check-circle" style="color:#0067ac;"></i>
                </div>
                <div style="margin-left:0.75rem;">
                    <p style="font-size:0.95rem; font-weight:500; color:#0067ac;">Completed</p>
                    <p style="font-size:1.25rem; font-weight:bold; color:#fff;">{{ $tugas_data->where('status', 'Selesai')->count() }}</p>
                </div>
            </div>
        </div>
        
        <div style="background: #96d3da; padding:1.25rem; border-radius:1.25rem; box-shadow:0 1px 6px rgba(0,0,0,0.08); border:1.5px solid #d0eaeb;">
            <div style="display:flex; align-items:center;">
                <div style="padding:0.5rem; background:#e0e0e0; border-radius:0.5rem;">
                    <i class="bx bx-time" style="color:#0067ac;"></i>
                </div>
                <div style="margin-left:0.75rem;">
                    <p style="font-size:0.95rem; font-weight:500; color:#0067ac;">Pending</p>
                    <p style="font-size:1.25rem; font-weight:bold; color:#fff;">{{ $tugas_data->where('status', 'Belum Selesai')->count() }}</p>
                </div>
            </div>
        </div>
        
        <div style="background: #96d3da; padding:1.25rem; border-radius:1.25rem; box-shadow:0 1px 6px rgba(0,0,0,0.08); border:1.5px solid #d0eaeb;">
            <div style="display:flex; align-items:center;">
                <div style="padding:0.5rem; background:#e0e0e0; border-radius:0.5rem;">
                    <i class="bx bx-error-circle" style="color:#0067ac;"></i>
                </div>
                <div style="margin-left:0.75rem;">
                    <p style="font-size:0.95rem; font-weight:500; color:#0067ac;">Overdue</p>
                    <p style="font-size:1.25rem; font-weight:bold; color:#fff;">
                        {{ $tugas_data->filter(function($task) { return $task->deadline < now()->format('Y-m-d') && $task->status !== 'Selesai'; })->count() }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Grid -->
    <div style="display:grid; grid-template-columns:1fr 1fr; gap:1.5rem;">
        <!-- Calendar Component -->
        <div style="background: #d0eaeb; border-radius:1.25rem; box-shadow:0 1px 6px rgba(0,0,0,0.08); border:1.5px solid #96d3da;">
            <div style="padding:1rem; border-bottom:1.5px solid #96d3da;">
                <h2 style="font-size:1.125rem; font-weight:600; color:#0067ac; display:flex; align-items:center;">
                    <i class="bx bx-calendar" style="margin-right:0.5rem;"></i>
                    Calendar
                </h2>
            </div>
            <div style="padding:1rem;">
                @include('components.calendar')
            </div>
        </div>

        <!-- Task Table Component -->
        <div style="background: #d0eaeb; border-radius:1.25rem; box-shadow:0 1px 6px rgba(0,0,0,0.08); border:1.5px solid #96d3da;">
            <div style="padding:1rem; border-bottom:1.5px solid #96d3da;">
                <h2 style="font-size:1.125rem; font-weight:600; color:#0067ac; display:flex; align-items:center;">
                    <i class="bx bx-list-ul" style="margin-right:0.5rem;"></i>
                    Recent Tasks
                </h2>
            </div>
            <div style="padding:1rem;">
                @include('components.task-table', ['tugas_data' => $tugas_data])
            </div>
        </div>
    </div>
</div>

@include('components.schedule-modal')

@push('scripts')
<!-- Dashboard scripts (if any) -->
@endpush
@endsection