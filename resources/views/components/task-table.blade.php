<div style="background: #d0eaeb; border-radius: 0.75rem; box-shadow: 0 1px 6px rgba(0,0,0,0.08); padding: 1rem; width: 100%; margin-top: 1.5rem;">
    <div style="display: flex; flex-direction: column; gap: 0.5rem; margin-bottom: 1rem;">
        <div style="display: flex; flex-direction: column; gap: 0.5rem; width: 100%;">
            <select style="border: 1px solid #96d3da; padding: 0.5rem; border-radius: 0.375rem; font-size: 0.95rem; color: #0067ac;">
                <option>Next 7 days</option>
                <option>Today</option>
            </select>
            <select style="border: 1px solid #96d3da; padding: 0.5rem; border-radius: 0.375rem; font-size: 0.95rem; color: #0067ac;">
                <option>Sort by dates</option>
                <option>Sort by name</option>
            </select>
            <input type="text" placeholder="Search by task or name"
                   style="border: 1px solid #96d3da; padding: 0.5rem; border-radius: 0.375rem; font-size: 0.95rem; width: 100%; color: #0067ac;" />
        </div>
    </div>
    <div style="overflow-x:auto;">
        <table style="width:100%; font-size:0.95rem; border:1px solid #e0e0e0; border-radius:0.5rem; background:#fff;">
            <thead>
                <tr style="background:#96d3da; color:#0067ac; text-align:left;">
                    <th style="padding:0.5rem; border-bottom:1px solid #e0e0e0;">Tanggal</th>
                    <th style="padding:0.5rem; border-bottom:1px solid #e0e0e0;">Tugas</th>
                    <th style="padding:0.5rem; border-bottom:1px solid #e0e0e0;">Deskripsi</th>
                    <th style="padding:0.5rem; border-bottom:1px solid #e0e0e0;">Member</th>
                    <th style="padding:0.5rem; border-bottom:1px solid #e0e0e0;">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tugas_data as $tugas)
                <tr style="{{ (\Carbon\Carbon::parse($tugas->deadline)->lt(now()->startOfDay())) ? 'background:#e53e3e1a; border-left:4px solid #e53e3e;' : '' }}">
                    <td style="padding:0.5rem; white-space:nowrap;">
                        {{ \Carbon\Carbon::parse($tugas->deadline)->translatedFormat('l, j F Y') }}
                    </td>
                    <td style="padding:0.5rem; font-weight:600;">{{ $tugas->nama }}</td>
                    <td style="padding:0.5rem; color:#0067ac;">{{ $tugas->deskripsi }}</td>
                    <td style="padding:0.5rem; color:#0067ac;">
                        {{ $tugas->member?->display_username ?? $tugas->member?->username ?? '-' }}
                    </td>
                    <td style="padding:0.5rem;">
                        <span style="font-size:0.88rem; padding:0.25rem 0.5rem; border-radius:0.25rem;
                            {{ $tugas->status === 'Selesai' ? 'background:#96d3da; color:#0067ac;' :
                                (\Carbon\Carbon::parse($tugas->deadline)->lt(now()->startOfDay()) ? 'background:#e53e3e; color:#fff;' : 'background:#e0e0e0; color:#0067ac;') }}">
                            {{ $tugas->status }}
                        </span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="text-align:center; color:#0067ac; padding:1rem;">Tidak ada data tugas.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <button style="margin-top:1rem; color:#0067ac; background:none; border:none; text-decoration:underline; font-size:0.95rem; cursor:pointer;">Show more activities</button>
</div>