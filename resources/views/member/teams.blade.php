@extends('layouts.dashboard_member')

@section('content')
    <h1 style="margin-bottom:1.5rem; font-size:2rem; font-weight:bold; color:#0067ac;">Teams</h1>

    @if(!empty($teams) && $teams->count())
        <style>
            .team-grid {
                display: grid;
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }
            @media (min-width: 768px) {
                .team-grid {
                    grid-template-columns: repeat(2, 1fr);
                }
            }
            @media (min-width: 1024px) {
                .team-grid {
                    grid-template-columns: repeat(3, 1fr);
                }
            }
        </style>
        <div class="team-grid">
            @foreach($teams as $team)
                <x-team-card :team="$team" :userId="$user->id" />
            @endforeach
        </div>
    @else
        <div style="color:#0067ac;">Belum ada tim yang Anda ikuti.</div>
    @endif
@endsection