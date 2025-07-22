@props(['task'])

<div style="max-width: 38rem; margin: 1.5rem auto 0 auto; background: #d0eaeb; border-radius: 0.5rem; box-shadow: 0 1px 6px rgba(0,0,0,0.08); padding: 1.5rem;">
    <h2 style="margin-bottom: 1rem; font-size: 1.25rem; font-weight: bold; color: #0067ac;">Submit Tugas: {{ $task->nama }}</h2>

    <form action="{{ route('task_member.submit', $task->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div style="margin-bottom: 1rem;">
            <label for="submission_text" style="display: block; font-weight: 600; margin-bottom: 0.25rem; color: #0067ac;">Deskripsi Submission</label>
            <textarea name="submission_text" id="submission_text" style="width: 100%; border: 1px solid #96d3da; padding: 0.5rem 0.75rem; border-radius: 0.375rem; background: #fff;" rows="4" required>{{ old('submission_text', $task->submission_text ?? '') }}</textarea>
            @error('submission_text')
                <div style="color: #e53e3e; font-size: 0.8rem; margin-top: 0.25rem;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-bottom: 1rem;">
            <label for="submission_file" style="display: block; font-weight: 600; margin-bottom: 0.25rem; color: #0067ac;">Upload File (Opsional)</label>
            <input type="file" name="submission_file" id="submission_file" style="width: 100%; color: #0067ac;">
            @error('submission_file')
                <div style="color: #e53e3e; font-size: 0.8rem; margin-top: 0.25rem;">{{ $message }}</div>
            @enderror

            @if(!empty($task->submission_file))
                <div style="margin-top: 0.5rem;">
                    <span style="font-size: 0.8rem; color: #0067ac;">File sebelumnya: </span>
                    <a href="{{ asset($task->submission_file) }}" target="_blank" style="text-decoration: underline; color: #0067ac;">{{ basename($task->submission_file) }}</a>
                </div>
            @endif
        </div>

        <div style="display: flex; gap: 0.5rem;">
            <button type="submit" style="background: #0067ac; color: #fff; padding: 0.5rem 1rem; border-radius: 0.375rem; font-weight: 600; border: none; cursor: pointer;" onmouseover="this.style.background='#38a169'" onmouseout="this.style.background='#0067ac'">Submit Tugas</button>
            <a href="{{ route('task_member.index') }}" style="background: #96d3da; color: #0067ac; padding: 0.5rem 1rem; border-radius: 0.375rem; font-weight: 600; text-decoration: none; border: none; display: inline-block;" onmouseover="this.style.background='#e0e0e0'" onmouseout="this.style.background='#96d3da'">Kembali</a>
        </div>
    </form>
</div>