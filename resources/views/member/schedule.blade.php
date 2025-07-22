@extends('layouts.dashboard_manager')

@section('content')
<div style="max-width:90rem; margin:0 auto; padding-top:2rem; padding-bottom:2rem;">
    <div style="display:grid; grid-template-columns:2fr 1fr; gap:2rem; align-items:flex-start;">
        <div style="flex:1; min-width:0;">
            <x-calendar />
        </div>
        <div style="width:100%; max-width:28rem;">
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

<div id="calendar" style="background: #d0eaeb; border-radius: 0.5rem; box-shadow: 0 1px 6px rgba(0,0,0,0.08); padding: 1rem;"></div>
@push('scripts')
<script>
    $(document).ready(function () {
        $('#calendar').fullCalendar({
            events: '{{ route("schedule.load") }}',
            eventClick: function (event) {
                $('#schedule-description').text(event.description || 'Tidak ada deskripsi.');
                $('#accept-schedule').attr('data-schedule-id', event.id);
                $('#reject-schedule').attr('data-schedule-id', event.id);
                $('#schedule-modal').show();
            }
        });
    });
</script>
@endpush