@props(['absensis'])

<style>
.presence-grid-table {
    width: 100%;
    border-radius: 1rem;
    background: #d0eaeb;
    box-shadow: 0 2px 12px rgba(0,103,172,0.07);
    border-collapse: separate;
    border-spacing: 0;
    overflow: hidden;
    margin-bottom: 2.5rem;
}
.presence-grid-table thead tr {
    background: #96d3da;
}
.presence-grid-table th {
    color: #0067ac;
    font-weight: 700;
    padding: 1rem 1.25rem;
    text-align: left;
    letter-spacing: 0.02em;
    font-size: 1rem;
    border-bottom: 2px solid #d0eaeb;
}
.presence-grid-table tbody tr {
    transition: background 0.18s;
}
.presence-grid-table tbody tr:hover {
    background: #b9dbe2;
}
.presence-grid-table td {
    padding: 1rem 1.25rem;
    font-size: 1.05rem;
    vertical-align: middle;
    color: #0067ac;
    font-weight: 500;
    border-bottom: 1px solid #e9f4f7;
}
.presence-status {
    display: inline-block;
    padding: 0.22rem 0.9rem;
    border-radius: 2rem;
    font-size: 0.9rem;
    font-weight: 600;
    letter-spacing: 0.01em;
}
.status-present {
    background: #96d3da;
    color: #0067ac;
}
.status-absent {
    background: #e53e3e;
    color: #fff;
}
.status-excused {
    background: #e0e0e0;
    color: #0067ac;
}
.presence-photo {
    width: 3.5rem;
    height: 3.5rem;
    object-fit: cover;
    border-radius: 0.5rem;
    background: #e0e0e0;
    box-shadow: 0 2px 6px rgba(0,103,172,0.08);
    border: 2px solid #96d3da;
    transition: transform 0.18s;
}
.presence-photo:hover {
    transform: scale(1.07) rotate(-2deg);
    box-shadow: 0 8px 20px #96d3da60;
}
@media (max-width: 600px) {
    .presence-grid-table th,
    .presence-grid-table td {
        padding: 0.75rem 0.6rem;
        font-size: 0.95rem;
    }
    .presence-photo {
        width: 2.3rem;
        height: 2.3rem;
    }
}
</style>

<div style="overflow-x:auto;">
    <table class="presence-grid-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Date</th>
                <th>Status</th>
                <th>Photo</th>
            </tr>
        </thead>
        <tbody>
        @foreach($absensis as $absen)
            <tr>
                <td>{{ $absen->nama }}</td>
                <td>{{ \Carbon\Carbon::parse($absen->tanggal)->format('d M Y') }}</td>
                <td>
                    @if($absen->status === 'Hadir')
                        <span class="presence-status status-present">Present</span>
                    @elseif($absen->status === 'Tidak Hadir')
                        <span class="presence-status status-absent">Absent</span>
                    @else
                        <span class="presence-status status-excused">Excused</span>
                    @endif
                </td>
                <td>
                    @if($absen->foto && file_exists(public_path($absen->foto)))
                        <img src="{{ asset($absen->foto) }}" class="presence-photo" alt="Presence Photo">
                    @elseif($absen->foto && filter_var($absen->foto, FILTER_VALIDATE_URL))
                        <img src="{{ $absen->foto }}" class="presence-photo" alt="Presence Photo">
                    @else
                        <span style="color:#0067ac; font-style:italic;">No photo</span>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>