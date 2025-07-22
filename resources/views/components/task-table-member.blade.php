@props(['tasks'])

<div style="overflow-x: auto;">
    <table style="width: 100%; font-size: 0.95rem; border: 1px solid #e0e0e0; border-radius: 0.5rem; background: #fff;">
        <thead>
            <tr style="background: #96d3da; color: #0067ac; text-align: left;">
                <th style="padding: 0.5rem; border-bottom: 1px solid #e0e0e0;">Tugas</th>
                <th style="padding: 0.5rem; border-bottom: 1px solid #e0e0e0;">Deadline</th>
                <th style="padding: 0.5rem; border-bottom: 1px solid #e0e0e0;">Status</th>
                <th style="padding: 0.5rem; border-bottom: 1px solid #e0e0e0;">Deskripsi</th>
                <th style="padding: 0.5rem; border-bottom: 1px solid #e0e0e0;">Update Status</th>
                <th style="padding: 0.5rem; border-bottom: 1px solid #e0e0e0;">Aksi</th>
            </tr>
        </thead>
        <tbody>
        @forelse($tasks as $task)
            <tr style="{{ (\Carbon\Carbon::parse($task->deadline)->lt(now()->startOfDay())) ? 'background:#e53e3e1a; border-left:4px solid #e53e3e;' : '' }}">
                <td style="padding: 0.5rem; font-weight: 600;">{{ $task->nama }}</td>
                <td style="padding: 0.5rem; white-space: nowrap;">{{ \Carbon\Carbon::parse($task->deadline)->translatedFormat('l, j F Y') }}</td>
                <td style="padding: 0.5rem;">
                    <span style="font-size: 0.88rem; padding: 0.25rem 0.5rem; border-radius: 0.25rem;
                        {{ $task->status === 'Selesai' ? 'background:#96d3da; color:#0067ac;' :
                           (\Carbon\Carbon::parse($task->deadline)->lt(now()->startOfDay()) ? 'background:#e53e3e; color:#fff;' : 'background:#e0e0e0; color:#0067ac;') }}">
                        {{ $task->status }}
                    </span>
                </td>
                <td style="padding: 0.5rem; color: #0067ac;">{{ $task->deskripsi }}</td>
                <td style="padding: 0.5rem;">
                    <form method="POST" action="{{ route('task_member.update_status', $task->id) }}">
                        @csrf
                        <select name="status" required style="border: 1px solid #96d3da; border-radius: 0.25rem; padding: 0.25rem 0.5rem; font-size: 0.95rem; color: #0067ac;">
                            <option value="Belum Selesai" {{ $task->status == 'Belum Selesai' ? 'selected' : '' }}>Belum Selesai</option>
                            <option value="Dalam Proses" {{ $task->status == 'Dalam Proses' ? 'selected' : '' }}>Dalam Proses</option>
                            <option value="Selesai" {{ $task->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                        </select>
                        <button type="submit" style="margin-left: 0.5rem; background: #0067ac; color: #fff; padding: 0.25rem 0.5rem; border-radius: 0.25rem; font-size: 0.88rem; border: none; cursor: pointer;" onmouseover="this.style.background='#38a169'" onmouseout="this.style.background='#0067ac'">
                            Update
                        </button>
                    </form>
                </td>
                <td style="padding: 0.5rem;">
                    <a href="{{ route('task_member.submit_form', $task->id) }}"
                        style="color: #0067ac; border: 1px solid #0067ac; padding: 0.25rem 0.5rem; border-radius: 0.25rem; text-decoration: none; font-weight: 600;"
                        onmouseover="this.style.background='#96d3da'" onmouseout="this.style.background='transparent'">
                        Add submission
                    </a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" style="text-align: center; color: #0067ac; padding: 1rem;">Tidak ada data tugas.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>