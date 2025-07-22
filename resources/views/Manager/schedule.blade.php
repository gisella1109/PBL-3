@extends('layouts.dashboard_manager')

@section('content')
<div style="max-width:90rem; margin:0 auto; padding-top:2rem; padding-bottom:2rem;">
    <div style="
        display: grid;
        grid-template-columns: minmax(0,2.5fr) minmax(0,1fr);
        gap: 2.5rem;
        align-items: flex-start;
    ">
        <!-- Kalender di kiri -->
        <div style="width:100%; min-width:0;">
            <x-calendar />
        </div>
        <!-- Form di kanan -->
        <div style="width:100%; max-width:28rem; min-width:0;">
            @include('partials.schedule_form', [
                'members' => $members,
                // 'schedule' => $schedule // <-- jika edit, tambahkan variabel ini
            ])
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    window.schedules = @json($schedules ?? []);
</script>
@endpush