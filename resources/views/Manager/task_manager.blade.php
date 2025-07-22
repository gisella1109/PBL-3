@extends('layouts.dashboard_manager')

@section('content')
<div style="max-width:100%; padding-left:0.5rem; padding-right:0.5rem;">
    <div style="margin-bottom:2rem;">
        <h1 style="font-size:2rem; font-weight:bold; color:#0067ac; margin-bottom:0.5rem;">Manajemen Tugas</h1>
        <p style="color:#0067ac;">Kelola, tambah, dan pantau tugas serta submission member Anda.</p>
    </div>

    <div style="display:grid; grid-template-columns:1fr 1fr; gap:1.5rem; margin-bottom:2rem;">
        {{-- Form Tambah Tugas --}}
        @include('partials.add_task_form')

        {{-- Daftar Submission Tugas --}}
        @include('components.task-submissions')
    </div>

    {{-- Tabel Tugas --}}
    @include('components.task-table')
</div>
@endsection