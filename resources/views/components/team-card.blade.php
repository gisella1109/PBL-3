@props(['team', 'userId'])

@php
    $member = $team->members->where('user_id', $userId)->first();
@endphp

<div style="background: #d0eaeb; border-radius: 0.75rem; box-shadow: 0 1px 6px rgba(0,0,0,0.08); padding: 1.25rem; display: flex; flex-direction: column; height: 100%; border: 1px solid #96d3da;">
    <div>
        <h5 style="font-weight: 600; font-size: 1.125rem; color: #0067ac; margin-bottom: 0.25rem;">
            <a href="{{ route('teams.members.show', ['team_id' => $team->team_id]) }}" style="color: #0067ac; text-decoration: none;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">
                {{ $team->name ?? $team->team_name }}
            </a>
        </h5>
        <p style="font-size: 0.95rem; color: #0067ac; margin-bottom: 1rem;">
            <strong>Status:</strong>
            {{ $member ? ($member->status === 'pending' ? 'Pending' : 'Active') : '-' }}
        </p>
    </div>
    @if($member && $member->status === 'pending')
        <form action="{{ route('teams.members.status.update') }}" method="POST" style="display: flex; gap: 0.5rem; margin-top: auto;">
            @csrf
            <input type="hidden" name="team_id" value="{{ $team->team_id }}">
            <input type="hidden" name="user_id" value="{{ $userId }}">
            <button type="submit" name="action" value="accept"
                style="background:#0067ac; color:#fff; padding:0.5rem 1.5rem; border-radius:0.375rem; border:none; font-weight:600; cursor:pointer;" onmouseover="this.style.background='#38a169'" onmouseout="this.style.background='#0067ac'">Accept</button>
            <button type="submit" name="action" value="reject"
                style="background:#e53e3e; color:#fff; padding:0.5rem 1.5rem; border-radius:0.375rem; border:none; font-weight:600; cursor:pointer;" onmouseover="this.style.background='#b91c1c'" onmouseout="this.style.background='#e53e3e'">Reject</button>
        </form>
    @endif
</div>