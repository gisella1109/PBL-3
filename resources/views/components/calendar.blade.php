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