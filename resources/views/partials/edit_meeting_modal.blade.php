{{-- Modal Backdrop Edit Meeting --}}
<div id="editMeetingModal{{ $meeting->id }}" style="position:fixed; inset:0; background:rgba(0,103,172,0.18); overflow-y:auto; height:100%; width:100%; z-index:50; display:none;">
    <div style="position:relative; top:5rem; margin-left:auto; margin-right:auto; padding:1.25rem; border:1.5px solid #96d3da; width:24rem; box-shadow:0 2px 16px rgba(0,0,0,0.10); border-radius:1rem; background:#fff;">
        <form method="POST" action="{{ route('meetings.update', $meeting->id) }}" id="editMeetingForm{{ $meeting->id }}">
            @csrf
            @method('PUT')
            
            {{-- Modal Header --}}
            <div style="background:#96d3da; border-radius:1rem 1rem 0 0; padding:1.25rem 1.5rem 1rem 1.5rem; border-bottom:1.5px solid #d0eaeb;">
                <div style="display:flex; justify-content:space-between; align-items:center;">
                    <h5 style="font-size:1.125rem; font-weight:bold; color:#0067ac;">
                        Edit Meeting: {{ $meeting->name }}
                    </h5>
                    <button type="button" 
                            style="color:#0067ac; font-size:1.5rem; font-weight:bold; background:none; border:none; cursor:pointer;"
                            onmouseover="this.style.color='#e53e3e';"
                            onmouseout="this.style.color='#0067ac';"
                            onclick="closeModal('editMeetingModal{{ $meeting->id }}')">
                        &times;
                    </button>
                </div>
            </div>
            
            {{-- Modal Body --}}
            <div style="padding:1rem 1.5rem; display:flex; flex-direction:column; gap:1rem;">
                <div>
                    <label for="edit_name_{{ $meeting->id }}" style="display:block; margin-bottom:0.5rem; font-size:0.95rem; font-weight:500; color:#0067ac;">
                        Meeting Name <span style="color:#e53e3e;">*</span>
                    </label>
                    <input type="text" 
                           style="width:100%; padding:0.5rem 0.75rem; border:1.5px solid #96d3da; border-radius:0.5rem; color:#0067ac;"
                           id="edit_name_{{ $meeting->id }}"
                           name="name" 
                           value="{{ $meeting->name }}" 
                           placeholder="Enter meeting name"
                           required>
                </div>
                
                <div>
                    <label for="edit_due_date_{{ $meeting->id }}" style="display:block; margin-bottom:0.5rem; font-size:0.95rem; font-weight:500; color:#0067ac;">
                        Due Date <span style="color:#e53e3e;">*</span>
                    </label>
                    <input type="date" 
                           style="width:100%; padding:0.5rem 0.75rem; border:1.5px solid #96d3da; border-radius:0.5rem; color:#0067ac;"
                           id="edit_due_date_{{ $meeting->id }}"
                           name="due_date" 
                           value="{{ $meeting->due_date }}" 
                           required>
                </div>
                
                <div>
                    <label for="edit_status_{{ $meeting->id }}" style="display:block; margin-bottom:0.5rem; font-size:0.95rem; font-weight:500; color:#0067ac;">
                        Status <span style="color:#e53e3e;">*</span>
                    </label>
                    <select style="width:100%; padding:0.5rem 0.75rem; border:1.5px solid #96d3da; border-radius:0.5rem; color:#0067ac;"
                            id="edit_status_{{ $meeting->id }}"
                            name="status" 
                            required>
                        <option value="To Do" {{ $meeting->status == 'To Do' ? 'selected' : '' }}>To Do</option>
                        <option value="In Progress" {{ $meeting->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                        <option value="Done" {{ $meeting->status == 'Done' ? 'selected' : '' }}>Done</option>
                    </select>
                </div>
                
                <div>
                    <label for="edit_assignee_{{ $meeting->id }}" style="display:block; margin-bottom:0.5rem; font-size:0.95rem; font-weight:500; color:#0067ac;">
                        Assign to Team
                    </label>
                    <select style="width:100%; padding:0.5rem 0.75rem; border:1.5px solid #96d3da; border-radius:0.5rem; color:#0067ac;"
                            id="edit_assignee_{{ $meeting->id }}"
                            name="assignee">
                        <option value="">Unassigned</option>
                        @foreach($teams as $team)
                            <option value="{{ $team->team_id }}" {{ $meeting->assignee == $team->team_id ? 'selected' : '' }}>
                                {{ $team->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            
            {{-- Modal Footer --}}
            <div style="background:#d0eaeb; border-radius:0 0 1rem 1rem; padding:1rem 1.5rem; border-top:1.5px solid #96d3da;">
                <div style="display:flex; justify-content:end; gap:0.75rem;">
                    <button type="button" 
                            style="padding:0.5rem 1rem; background:#e0e0e0; color:#0067ac; border-radius:0.5rem; font-weight:500; border:none; cursor:pointer;"
                            onmouseover="this.style.background='#96d3da'"
                            onmouseout="this.style.background='#e0e0e0'"
                            onclick="closeModal('editMeetingModal{{ $meeting->id }}')">
                        Cancel
                    </button>
                    <button type="submit" 
                            style="padding:0.5rem 1rem; background:#0067ac; color:#fff; border-radius:0.5rem; font-weight:600; border:none; cursor:pointer; display:flex; align-items:center;"
                            onmouseover="this.style.background='#38a169'"
                            onmouseout="this.style.background='#0067ac'">
                        <svg style="width:1rem; height:1rem; margin-right:0.5rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Save Changes
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>