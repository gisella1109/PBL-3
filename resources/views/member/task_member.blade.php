@extends('layouts.dashboard_member')

@section('content')
<div style="display: flex;">
    <div style="flex:1; padding:2rem; min-height:100vh;">
        <div style="margin-bottom:1.5rem;">
            <h1 style="font-size:2rem; font-weight:bold; color:#0067ac; margin-bottom:0.5rem;">Task List</h1>
            <p style="color:#0067ac;">Daftar tugas Anda dan update status tugas di bawah ini.</p>
        </div>
        <x-task-table-member :tasks="$tasks" />

        @if(isset($selectedTask))
            <x-task-submit-form :task="$selectedTask" />
        @endif
    </div>
</div>
@endsection