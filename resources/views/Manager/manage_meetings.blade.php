@extends('layouts.dashboard_manager')

@section('content')
<div style="max-width:90rem; margin:0 auto; padding-left:1rem; padding-right:1rem;">
    {{-- Header Section --}}
    <div style="display:flex; flex-direction:column; gap:1rem; margin-bottom:2rem; align-items:flex-start; justify-content:space-between;">
        <div>
            <h1 style="font-size:2rem; font-weight:bold; color:#0067ac;">Manage Meetings</h1>
            <p style="margin-top:0.25rem; font-size:0.95rem; color:#0067ac;">Organize and track your team meetings</p>
        </div>
        <button type="button" 
                style="display:inline-flex; align-items:center; padding:0.5rem 1rem; background:#0067ac; color:#fff; font-size:0.95rem; font-weight:500; border-radius:0.5rem; box-shadow:0 1px 6px rgba(0,0,0,0.08); border:none; cursor:pointer; transition:background 0.2s;"
                onmouseover="this.style.background='#38a169'" onmouseout="this.style.background='#0067ac'"
                onclick="openModal('addMeetingModal')">
            <svg style="width:1.25rem; height:1.25rem; margin-right:0.5rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
            </svg>
            Add New Meeting
        </button>
    </div>

    {{-- Alert Messages --}}
    @if(session('success'))
        <div style="margin-bottom:1.5rem; background:#d0eaeb; border:1.5px solid #96d3da; border-radius:0.75rem; padding:1rem;" id="successAlert">
            <div style="display:flex; align-items:center;">
                <svg style="width:1.25rem; height:1.25rem; color:#0067ac; margin-right:0.75rem;" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                </svg>
                <span style="color:#0067ac; font-weight:500;">{{ session('success') }}</span>
                <button type="button" style="margin-left:auto; color:#0067ac; background:none; border:none; font-size:1rem; cursor:pointer;" onmouseover="this.style.color='#e53e3e'" onmouseout="this.style.color='#0067ac'" onclick="closeAlert('successAlert')">
                    <svg style="width:1rem; height:1rem;" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"/>
                    </svg>
                </button>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div style="margin-bottom:1.5rem; background:#fff3cd; border:1.5px solid #ffe066; border-radius:0.75rem; padding:1rem;" id="errorAlert">
            <div style="display:flex; align-items:center;">
                <svg style="width:1.25rem; height:1.25rem; color:#e53e3e; margin-right:0.75rem;" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"/>
                </svg>
                <span style="color:#e53e3e; font-weight:500;">{{ session('error') }}</span>
                <button type="button" style="margin-left:auto; color:#e53e3e; background:none; border:none; font-size:1rem; cursor:pointer;" onmouseover="this.style.color:'#b91c1c'" onmouseout="this.style.color:'#e53e3e'" onclick="closeAlert('errorAlert')">
                    <svg style="width:1rem; height:1rem;" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"/>
                    </svg>
                </button>
            </div>
        </div>
    @endif

    @if($errors->any())
        <div style="margin-bottom:1.5rem; background:#fff3cd; border:1.5px solid #ffe066; border-radius:0.75rem; padding:1rem;" id="validationAlert">
            <div style="display:flex; align-items:flex-start;">
                <svg style="width:1.25rem; height:1.25rem; color:#e53e3e; margin-right:0.75rem; margin-top:0.125rem;" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"/>
                </svg>
                <div style="flex:1;">
                    <h3 style="color:#e53e3e; font-weight:500; margin-bottom:0.5rem;">Please fix the following errors:</h3>
                    <ul style="list-style:disc inside; color:#b28704; margin:0;">
                        @foreach($errors->all() as $error)
                            <li style="font-size:0.95rem;">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <button type="button" style="color:#e53e3e; background:none; border:none; font-size:1rem; cursor:pointer;" onmouseover="this.style.color='#b91c1c'" onmouseout="this.style.color='#e53e3e'" onclick="closeAlert('validationAlert')">
                    <svg style="width:1rem; height:1rem;" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"/>
                    </svg>
                </button>
            </div>
        </div>
    @endif

    {{-- Meetings Grid --}}
    @include('partials.meetings_table', ['meetings' => $meetings, 'teams' => $teams])

    {{-- Modals --}}
    @include('partials.add_meeting_modal', ['teams' => $teams])
</div>
@endsection

@push('scripts')
<script>
function openModal(modalId) {
    document.getElementById(modalId).classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}
function closeModal(modalId) {
    document.getElementById(modalId).classList.add('hidden');
    document.body.style.overflow = 'auto';
}
// Close modal when clicking outside of it
document.addEventListener('click', function(event) {
    const modals = document.querySelectorAll('[id$="Modal"]');
    modals.forEach(modal => {
        if (event.target === modal) {
            closeModal(modal.id);
        }
    });
});
// Close modal with Escape key
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        const modals = document.querySelectorAll('[id$="Modal"]:not(.hidden)');
        modals.forEach(modal => {
            closeModal(modal.id);
        });
    }
});
function closeAlert(alertId) {
    var el = document.getElementById(alertId);
    if (el) el.style.display = 'none';
}


function openModal(id) {
    var modal = document.getElementById(id);
    if (modal) {
        modal.style.display = 'block';
        document.body.style.overflow = 'hidden'; // prevent background scroll
    }
}
function closeModal(id) {
    var modal = document.getElementById(id);
    if (modal) {
        modal.style.display = 'none';
        document.body.style.overflow = 'auto';
    }
}
// Optional: close modal on backdrop click or ESC key
document.addEventListener('click', function(event) {
    if (event.target.classList && event.target.id && event.target.id.startsWith('editMeetingModal')) {
        event.target.style.display = 'none';
        document.body.style.overflow = 'auto';
    }
});
document.addEventListener('keydown', function(event) {
    if (event.key === "Escape") {
        document.querySelectorAll('[id^="editMeetingModal"]').forEach(function(modal){
            modal.style.display = 'none';
        });
        document.body.style.overflow = 'auto';
    }
});
</script>
@endpush