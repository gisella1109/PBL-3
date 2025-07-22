<div style="overflow-x:auto;">
    <table style="min-width:100%; background:#fff; box-shadow:0 1px 6px rgba(0,0,0,0.08); border-radius:1rem; border:1.5px solid #96d3da;">
        <thead style="background:#96d3da;">
            <tr>
                <th style="padding:1rem 1.5rem; text-align:left; font-weight:600; color:#0067ac; text-transform:uppercase; letter-spacing:1px;">Nama Tim</th>
                <th style="padding:1rem 1.5rem; text-align:left; font-weight:600; color:#0067ac; text-transform:uppercase; letter-spacing:1px;">Details</th>
            </tr>
        </thead>
        <tbody>
            @forelse($teams as $team)
                <tr style="border-bottom:1.5px solid #d0eaeb;">
                    <td style="padding:0.75rem 1.5rem;">{{ $team->name }}</td>
                    <td style="padding:0.75rem 1.5rem;">
                        <button type="button"
                                style="background:#0067ac; color:#fff; font-size:0.95rem; border-radius:0.5rem; padding:0.5rem 1.25rem; font-weight:500; border:none; cursor:pointer; transition:background 0.2s;"
                                onmouseover="this.style.background='#38a169'"
                                onmouseout="this.style.background='#0067ac'"
                                onclick="document.getElementById('teamDetailsModal{{ $team->id }}').showModal()">
                            Details
                        </button>
                        @include('partials.team_details_modal', ['team' => $team])
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="2" style="padding:1.25rem; text-align:center; color:#96d3da;">Belum ada tim.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>