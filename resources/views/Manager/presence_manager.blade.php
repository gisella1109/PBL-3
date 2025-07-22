@extends('layouts.dashboard_manager')

@section('content')
<div class="flex flex-row min-h-screen bg-[#e6faf8]">


    {{-- Main Content --}}
    <div class="flex-1 px-8 py-8 max-w-6xl mx-auto">
        <h2 class="text-2xl font-bold text-[#0067ac] mb-6">Attendance from Members</h2>
        @include('partials.table_attendance', ['dataAbsensi' => $dataAbsensi])
    </div>
</div>
@endsection