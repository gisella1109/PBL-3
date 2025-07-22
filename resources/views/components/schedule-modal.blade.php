<div id="schedule-modal" style="position:fixed; inset:0; background:rgba(0,0,0,0.3); display:flex; align-items:center; justify-content:center; z-index:50; display:none;">
    <div style="background:#d0eaeb; border-radius:0.75rem; box-shadow:0 2px 12px rgba(0,0,0,0.12); padding:1.5rem; width:100%; max-width:26rem; position:relative;">
        <h4 style="font-size:1.125rem; font-weight:bold; margin-bottom:0.5rem; color:#0067ac;">Schedule Details</h4>
        <p id="schedule-description" style="margin-bottom:1rem; color:#0067ac;"></p>
        <div style="display:flex; gap:0.5rem;">
            <button id="accept-schedule" style="padding:0.5rem 1rem; background:#0067ac; color:#fff; border-radius:0.375rem; border:none; font-weight:600; cursor:pointer;" onmouseover="this.style.background='#38a169'" onmouseout="this.style.background='#0067ac'">Accept</button>
            <button id="reject-schedule" style="padding:0.5rem 1rem; background:#e53e3e; color:#fff; border-radius:0.375rem; border:none; font-weight:600; cursor:pointer;" onmouseover="this.style.background='#b91c1c'" onmouseout="this.style.background='#e53e3e'">Reject</button>
            <button id="close-modal" style="padding:0.5rem 1rem; background:#96d3da; color:#0067ac; border-radius:0.375rem; border:none; font-weight:600; cursor:pointer;" onmouseover="this.style.background='#e0e0e0'" onmouseout="this.style.background='#96d3da'">Close</button>
        </div>
        <button id="close-modal-x" style="position:absolute; top:0.75rem; right:0.75rem; color:#0067ac; font-size:1.5rem; background:none; border:none; cursor:pointer;" onmouseover="this.style.color='#e53e3e'" onmouseout="this.style.color='#0067ac'">&times;</button>
    </div>
</div>
@push('scripts')
<script>
    $('#close-modal, #close-modal-x').click(function () {
        $('#schedule-modal').hide();
    });
    $('#accept-schedule').click(function () {
        var id = $(this).data('schedule-id');
        $.post('{{ url("accept_reject_schedule") }}', { schedule_id: id, action: 'accept', _token: '{{ csrf_token() }}' }, function () {
            $('#schedule-modal').hide();
            location.reload();
        });
    });
    $('#reject-schedule').click(function () {
        var id = $(this).data('schedule-id');
        $.post('{{ url("accept_reject_schedule") }}', { schedule_id: id, action: 'reject', _token: '{{ csrf_token() }}' }, function () {
            $('#schedule-modal').hide();
            location.reload();
        });
    });
</script>
@endpush