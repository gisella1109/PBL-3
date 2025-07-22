@extends('layouts.dashboard_manager')

@section('content')
<div style="display:flex; justify-content:center; align-items:center; min-height:100vh; background:#d0eaeb;">
    <div style="background:#fff; border-radius:2rem; padding:2.5rem; box-shadow:0 6px 32px rgba(0,0,0,0.08); width:100%; max-width:26rem; border:1.5px solid #96d3da;">
        <h1 style="font-size:2rem; font-weight:bold; margin-bottom:1.5rem; text-align:center; color:#0067ac;">Customize Your Profile!</h1>
        <div style="display:flex; justify-content:center; margin-bottom:1rem;">
            @php
                $display = $user->display_username ?? $user->username ?? 'U';
                $initial = strtoupper(mb_substr(trim($display), 0, 1));
                $profileSrc = $user->profile_image
                    ? asset($user->profile_image)
                    : "https://placehold.co/112x112/96d3da/fff?text=" . $initial;
            @endphp
            <img id="profilePreview" src="{{ $profileSrc }}"
                 alt="Profile Picture"
                 style="width:7rem; height:7rem; border-radius:9999px; object-fit:cover; border:4px solid #96d3da; box-shadow:0 2px 8px rgba(0,0,0,0.08); background:#e0e0e0; transition:transform 0.3s;"
                 onmouseover="this.style.transform='scale(1.05)';"
                 onmouseout="this.style.transform='scale(1)';"
            >
        </div>
        <p style="color:#0067ac; margin-bottom:1.25rem; text-align:center; font-weight:500;">Upload Your Profile Picture</p>
        <form action="{{ route('customize_profile.submit') }}" method="POST" enctype="multipart/form-data" style="display:flex; flex-direction:column; gap:1rem;">
            @csrf
            <input type="text" name="username"
                style="width:100%; padding:0.75rem 1rem; border-radius:1rem; border:2px solid #96d3da; outline:none; color:#0067ac; font-size:1rem; font-weight:500;"
                value="{{ old('username', $user->display_username) }}" required
                placeholder="Your Display Name"/>
            <input type="file" name="profile_image" accept="image/*" onchange="previewImage(event)"
                   style="width:100%; padding:0.75rem 1rem; border-radius:1rem; border:2px solid #96d3da; background:#e0e0e0; color:#0067ac;"/>
            <button type="submit"
                style="width:100%; padding:0.75rem 1rem; border-radius:1rem; background:linear-gradient(90deg, #96d3da, #0067ac); color:#fff; font-weight:bold; font-size:1.25rem; box-shadow:0 2px 8px rgba(0,0,0,0.08); border:none; cursor:pointer; transition:background 0.3s;"
                onmouseover="this.style.background='linear-gradient(90deg, #0067ac, #96d3da)';"
                onmouseout="this.style.background='linear-gradient(90deg, #96d3da, #0067ac)';"
            >
                CONFIRM
            </button>
        </form>
    </div>
</div>
@push('scripts')
<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function () {
            document.getElementById('profilePreview').src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endpush
@endsection