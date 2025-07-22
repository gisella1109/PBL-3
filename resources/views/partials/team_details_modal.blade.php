<dialog id="teamDetailsModal{{ $team->id }}" style="border-radius:1rem; box-shadow:0 2px 16px rgba(0,0,0,0.10); width:100%; max-width:28rem; border:none;">
    <div style="background:#fff; border-radius:1rem; overflow:hidden;">
        <div style="padding:0.75rem 1.25rem; background:#0067ac; display:flex; justify-content:space-between; align-items:center;">
            <h5 style="color:#fff; font-weight:600;">Details - {{ $team->name }}</h5>
            <button type="button" onclick="this.closest('dialog').close()" style="color:#fff; font-size:2rem; font-weight:600; background:none; border:none; line-height:1; cursor:pointer;" onmouseover="this.style.color='#96d3da'" onmouseout="this.style.color='#fff'">&times;</button>
        </div>
        <div style="padding:1rem 1.25rem;">
            <h6 style="font-weight:bold; margin-bottom:0.5rem; color:#0067ac;">Anggota Tim:</h6>
            <ul style="list-style:disc inside; margin-bottom:0; color:#0067ac;">
                @forelse($team->members as $member)
                    <li>{{ $member->username }}</li>
                @empty
                    <li style="color:#96d3da;">Belum ada anggota.</li>
                @endforelse
            </ul>
        </div>
    </div>
</dialog>
<script>
    // Optional: close dialog on ESC
    document.getElementById('teamDetailsModal{{ $team->id }}').addEventListener('keydown', function(e) {
        if (e.key === "Escape") this.close();
    });
</script>