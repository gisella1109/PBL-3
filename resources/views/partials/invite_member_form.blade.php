<div style="background:#d0eaeb; border-radius:1.25rem; box-shadow:0 1px 6px rgba(0,0,0,0.08); margin-bottom:1.5rem; width:100%; max-width:32rem; margin-left:auto; margin-right:auto; border:1.5px solid #96d3da;">
    <div style="padding:1rem 1.25rem; background:#96d3da; border-radius:1.25rem 1.25rem 0 0;">
        <h5 style="color:#0067ac; font-weight:bold; font-size:1.125rem; margin:0;">Kirim Undangan ke Member</h5>
    </div>
    <div style="padding:1.5rem;">
        <form method="POST" action="{{ route('invite.member.dynamic') }}" id="invite-member-form">
            @csrf
            <div style="margin-bottom:1.25rem;">
                <label for="username" style="display:block; font-weight:500; color:#0067ac; margin-bottom:0.25rem;">Username yang diundang:</label>
                <select id="username" name="username" style="width:100%; border-radius:0.5rem; border:1.5px solid #96d3da; padding:0.5rem 0.75rem; color:#0067ac;" required>
                    <option value="">Pilih Member</option>
                    @foreach($members as $member)
                        <option value="{{ $member->username }}">{{ $member->username }}</option>
                    @endforeach
                </select>
            </div>
            <div id="team-select-wrapper" style="margin-bottom:1.25rem; display:none;">
                <label for="team_id" style="display:block; font-weight:500; color:#0067ac; margin-bottom:0.25rem;">Pilih Tim:</label>
                <select id="team_id" name="team_id" style="width:100%; border-radius:0.5rem; border:1.5px solid #96d3da; padding:0.5rem 0.75rem; color:#0067ac;" required>
                    <option value="">Pilih Tim</option>
                    @foreach($teams as $team)
                        <option value="{{ $team->team_id }}">{{ $team->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" name="invite_member" id="invite-btn" disabled
                style="background:#0067ac; color:#fff; padding:0.75rem 1.5rem; border-radius:0.5rem; font-weight:600; width:100%; border:none; font-size:1rem; cursor:pointer; opacity:0.6;"
                onmouseover="this.style.background='#38a169'" onmouseout="this.style.background='#0067ac'">
                Kirim Undangan
            </button>
        </form>
        @if(!count($teams))
            <div style="color:#e53e3e; font-weight:600; text-align:center; margin-top:1rem;">
                Anda belum membuat tim. Buat tim terlebih dahulu sebelum mengundang member.
            </div>
        @endif
    </div>
</div>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const usernameSelect = document.getElementById('username');
    const teamSelectWrapper = document.getElementById('team-select-wrapper');
    const teamSelect = document.getElementById('team_id');
    const inviteBtn = document.getElementById('invite-btn');

    usernameSelect.addEventListener('change', function() {
        if (this.value) {
            teamSelectWrapper.style.display = 'block';
        } else {
            teamSelectWrapper.style.display = 'none';
            teamSelect.value = '';
        }
        updateInviteBtn();
    });
    if (teamSelect) {
        teamSelect.addEventListener('change', updateInviteBtn);
    }
    function updateInviteBtn() {
        if (usernameSelect.value && teamSelect && teamSelect.value) {
            inviteBtn.disabled = false;
            inviteBtn.style.opacity = 1;
        } else {
            inviteBtn.disabled = true;
            inviteBtn.style.opacity = 0.6;
        }
    }
});
</script>