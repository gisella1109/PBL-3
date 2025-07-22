@props(['task'])

<form method="POST" action="{{ route('task_member.update_status', $task->id) }}" style="display:flex; gap:0.5rem; align-items:center;">
    @csrf
    <select name="status" required
        style="border:1.5px solid #96d3da; border-radius:0.5rem; padding:0.25rem 0.75rem; font-size:0.95rem; color:#0067ac;">
        <option value="Belum Selesai" {{ $task->status == 'Belum Selesai' ? 'selected' : '' }}>Belum Selesai</option>
        <option value="Dalam Proses" {{ $task->status == 'Dalam Proses' ? 'selected' : '' }}>Dalam Proses</option>
        <option value="Selesai" {{ $task->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
    </select>
    <button type="submit" name="update_status"
        style="background:#0067ac; color:#fff; padding:0.25rem 1rem; border-radius:0.5rem; font-size:0.85rem; font-weight:500; border:none; cursor:pointer; transition:background 0.2s;"
        onmouseover="this.style.background='#38a169'"
        onmouseout="this.style.background='#0067ac'">
        Update
    </button>
</form>