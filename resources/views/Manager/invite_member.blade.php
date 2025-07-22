@extends('layouts.dashboard_manager')

@section('content')
<div style="max-width:100%; overflow:hidden;">
    <!-- Header -->
    <div style="margin-bottom:1.5rem;">
        <h1 style="font-size:2rem; font-weight:bold; color:#0067ac; margin-bottom:0.5rem;">Invite Member</h1>
        <p style="color:#0067ac;">Manage your team, invite members, and create new teams below.</p>
    </div>

    <!-- Invite & Create Forms: Grid Kiri-Kanan -->
    <div style="
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 2.5rem;
        margin-bottom: 2.5rem;
        align-items: flex-start;
        width:100%;
        max-width:68rem;
        margin-left:auto;
        margin-right:auto;
    ">
        <div>
            @include('partials.invite_member_form')
        </div>
        <div>
            @include('partials.create_team_form')
        </div>
    </div>

    <h2 style="font-size:1.25rem; font-weight:bold; text-align:center; margin-top:2.5rem; margin-bottom:1.5rem; color:#0067ac;">Daftar Tim</h2>
    <div>
        @include('partials.team_list')
    </div>
</div>
@endsection