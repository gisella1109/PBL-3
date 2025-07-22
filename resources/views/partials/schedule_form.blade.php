<div style="background:#d0eaeb; border-radius:1.25rem; box-shadow:0 1px 6px rgba(0,0,0,0.08); border:1.5px solid #96d3da; max-width:500px; margin-left:auto; margin-right:auto;">
    <div style="padding:0.75rem 1rem; background:#0067ac; border-radius:1.25rem 1.25rem 0 0;">
        <h2 style="color:#fff; font-size:1.15rem; font-weight:bold;">Schedule Form</h2>
    </div>
    <form action="{{ isset($schedule) ? route('schedule.update', $schedule->id) : route('schedule.store') }}"
          method="POST" id="schedule-form"
          style="padding:1.5rem; display:flex; flex-direction:column; gap:1.15rem;">
        @csrf
        @if(isset($schedule))
            @method('PUT')
        @endif

        <!-- Title -->
        <div>
            <label for="title" style="display:block; margin-bottom:0.35rem; font-weight:500; color:#0067ac;">Title</label>
            <input
                type="text"
                name="title"
                id="title"
                required
                value="{{ old('title', $schedule->title ?? '') }}"
                style="width:100%; box-sizing:border-box; border-radius:0.5rem; border:1.5px solid #96d3da; padding:0.65rem 0.9rem; color:#0067ac;"
            >
        </div>

        <div style="display:flex; gap:1rem; flex-wrap: wrap;">
            <div style="flex:1 1 140px;">
                <label for="assignee" style="display:block; margin-bottom:0.35rem; font-weight:500; color:#0067ac;">Assignee (Member)</label>
                <select
                    name="assignee"
                    id="assignee"
                    style="width:100%; box-sizing:border-box; border-radius:0.5rem; border:1.5px solid #96d3da; padding:0.65rem 0.9rem; color:#0067ac;"
                >
                    <option value="">Select a member</option>
                    @foreach($members as $member)
                        <option value="{{ $member->id }}"
                            {{ old('assignee', $schedule->assignee ?? '') == $member->id ? 'selected' : '' }}>
                            {{ $member->username }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div style="flex:1 1 140px;">
                <label for="start_datetime" style="display:block; margin-bottom:0.35rem; font-weight:500; color:#0067ac;">Start</label>
                <input
                    type="datetime-local"
                    name="start_datetime"
                    id="start_datetime"
                    required
                    value="{{ old('start_datetime', isset($schedule) ? \Illuminate\Support\Str::replace(' ', 'T', $schedule->start_datetime) : '') }}"
                    style="width:100%; box-sizing:border-box; border-radius:0.5rem; border:1.5px solid #96d3da; padding:0.65rem 0.9rem; color:#0067ac;"
                >
            </div>
            <div style="flex:1 1 140px;">
                <label for="end_datetime" style="display:block; margin-bottom:0.35rem; font-weight:500; color:#0067ac;">End</label>
                <input
                    type="datetime-local"
                    name="end_datetime"
                    id="end_datetime"
                    required
                    value="{{ old('end_datetime', isset($schedule) ? \Illuminate\Support\Str::replace(' ', 'T', $schedule->end_datetime) : '') }}"
                    style="width:100%; box-sizing:border-box; border-radius:0.5rem; border:1.5px solid #96d3da; padding:0.65rem 0.9rem; color:#0067ac;"
                >
            </div>
        </div>

        <!-- Description -->
        <div>
            <label for="description" style="display:block; margin-bottom:0.35rem; font-weight:500; color:#0067ac;">Description</label>
            <textarea
                name="description"
                id="description"
                rows="3"
                required
                style="width:100%; box-sizing:border-box; border-radius:0.5rem; border:1.5px solid #96d3da; padding:0.65rem 0.9rem; color:#0067ac;"
            >{{ old('description', $schedule->description ?? '') }}</textarea>
        </div>

        <!-- Buttons -->
        <div style="display:flex; gap:0.75rem; padding-top:0.5rem;">
            <button
                type="submit"
                style="flex:1; background:#0067ac; color:#fff; padding:0.85rem 0; border-radius:0.5rem; font-weight:600; border:none; cursor:pointer;"
                onmouseover="this.style.background='#38a169'" onmouseout="this.style.background='#0067ac'">
                {{ isset($schedule) ? 'Update' : 'Save' }}
            </button>
            <button
                type="reset"
                style="flex:1; background:#e0e0e0; color:#0067ac; padding:0.85rem 0; border-radius:0.5rem; font-weight:600; border:none; cursor:pointer;"
                onmouseover="this.style.background='#96d3da'" onmouseout="this.style.background='#e0e0e0'">
                Cancel
            </button>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const startInput = document.getElementById('start_datetime');
    const endInput = document.getElementById('end_datetime');

    // Set min for startInput (now) and keep updating on reset
    function setMinStartDate() {
        const now = new Date();
        const pad = n => n.toString().padStart(2, '0');
        const minVal = now.getFullYear() + '-' +
            pad(now.getMonth() + 1) + '-' +
            pad(now.getDate()) + 'T' +
            pad(now.getHours()) + ':' +
            pad(now.getMinutes());
        startInput.min = minVal;
        // If start < now, reset
        if (startInput.value && startInput.value < minVal) {
            startInput.value = minVal;
        }
    }
    setMinStartDate();

    // End date cannot be before start date/time
    function updateEndMin() {
        if (startInput.value) {
            endInput.min = startInput.value;
            if (endInput.value && endInput.value < startInput.value) {
                endInput.value = startInput.value;
            }
        }
    }

    // On change start or reset
    startInput.addEventListener('change', updateEndMin);
    document.getElementById('schedule-form').addEventListener('reset', function() {
        setTimeout(function() {
            setMinStartDate();
            updateEndMin();
        }, 10);
    });

    // On load, trigger once
    updateEndMin();

    // Prevent manual entry of invalid date via blur
    endInput.addEventListener('blur', function() {
        if (endInput.value && startInput.value && endInput.value < startInput.value) {
            endInput.value = startInput.value;
        }
    });
});
</script>