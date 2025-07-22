<div style="background:#d0eaeb; border-radius:1.25rem; box-shadow:0 1px 6px rgba(0,0,0,0.08); padding:1.5rem; width:100%;">
    <div style="margin-bottom:1rem;">
        <h2 style="font-weight:bold; font-size:1.125rem; color:#0067ac; margin-bottom:0.5rem;">Tambah Tugas Baru</h2>
    </div>
    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf
        <div style="margin-bottom:1rem;">
            <label style="display:block; font-weight:500; color:#0067ac; margin-bottom:0.25rem;">Pilih Member</label>
            <select name="assigned_member" style="width:100%; border-radius:0.5rem; border:1.5px solid #96d3da; padding:0.5rem 0.75rem; color:#0067ac;" required>
                <option value="">-- Pilih Member --</option>
                @foreach($members as $m)
                    <option value="{{ $m->id }}">{{ $m->username }}</option>
                @endforeach
            </select>
        </div>
        <div style="margin-bottom:1rem;">
            <label style="display:block; font-weight:500; color:#0067ac; margin-bottom:0.25rem;">Nama Tugas</label>
            <input type="text" name="task_name" style="width:100%; border-radius:0.5rem; border:1.5px solid #96d3da; padding:0.5rem 0.75rem; color:#0067ac;" required>
        </div>
        <div style="margin-bottom:1rem;">
            <label style="display:block; font-weight:500; color:#0067ac; margin-bottom:0.25rem;">Deadline</label>
            <input type="date" name="deadline" style="width:100%; border-radius:0.5rem; border:1.5px solid #96d3da; padding:0.5rem 0.75rem; color:#0067ac;" required>
        </div>
        <div style="margin-bottom:1rem;">
            <label style="display:block; font-weight:500; color:#0067ac; margin-bottom:0.25rem;">Status</label>
            <select name="status" style="width:100%; border-radius:0.5rem; border:1.5px solid #96d3da; padding:0.5rem 0.75rem; color:#0067ac;" required>
                <option value="Belum Selesai">Belum Selesai</option>
                <option value="Dalam Proses">Dalam Proses</option>
                <option value="Selesai">Selesai</option>
            </select>
        </div>
        <div style="margin-bottom:1rem;">
            <label style="display:block; font-weight:500; color:#0067ac; margin-bottom:0.25rem;">Deskripsi</label>
            <textarea name="description" rows="3" style="width:100%; border-radius:0.5rem; border:1.5px solid #96d3da; padding:0.5rem 0.75rem; color:#0067ac;"></textarea>
        </div>
        <button type="submit" style="background:#0067ac; color:#fff; padding:0.75rem 1.5rem; border-radius:0.5rem; font-weight:600; width:100%; border:none; font-size:1rem; cursor:pointer;"
            onmouseover="this.style.background='#38a169'" onmouseout="this.style.background='#0067ac'">
            Tambah Tugas
        </button>
    </form>
</div>