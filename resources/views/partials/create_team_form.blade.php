<div style="background:#d0eaeb; border-radius:1.25rem; box-shadow:0 1px 6px rgba(0,0,0,0.08); margin-bottom:1.5rem; width:100%; max-width:32rem; margin-left:auto; margin-right:auto; border:1.5px solid #96d3da;">
    <div style="padding:1rem 1.25rem; background:#96d3da; border-radius:1.25rem 1.25rem 0 0;">
        <h5 style="color:#0067ac; font-weight:bold; font-size:1.125rem; margin:0;">Buat Tim Baru</h5>
    </div>
    <div style="padding:1.5rem;">
        <form method="POST" action="{{ route('teams.store') }}">
            @csrf
            <div style="margin-bottom:1.25rem;">
                <label for="name" style="display:block; font-weight:500; color:#0067ac; margin-bottom:0.25rem;">Nama Tim:</label>
                <input type="text" id="name" name="name" style="width:100%; border-radius:0.5rem; border:1.5px solid #96d3da; padding:0.5rem 0.75rem; color:#0067ac;" placeholder="Masukkan nama tim" required>
            </div>
            <button type="submit" name="create_team" style="background:#0067ac; color:#fff; padding:0.75rem 1.5rem; border-radius:0.5rem; font-weight:600; width:100%; border:none; font-size:1rem; cursor:pointer;"
                onmouseover="this.style.background='#38a169'" onmouseout="this.style.background='#0067ac'">
                Buat Tim
            </button>
        </form>
    </div>
</div>