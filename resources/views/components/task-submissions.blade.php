<div style="background: #d0eaeb; border-radius: 0.5rem; box-shadow: 0 1px 6px rgba(0,0,0,0.08); padding: 1rem; width: 100%;">
    <h2 style="font-weight: bold; font-size: 1.125rem; color: #0067ac; margin-bottom: 1rem;">Daftar Submission Tugas</h2>
    <div style="overflow-x: auto;">
        @if($task_submissions->count())
            <table style="width: 100%; font-size: 0.95rem; border: 1px solid #e0e0e0; border-radius: 0.5rem; background: #fff;">
                <thead>
                    <tr style="background: #96d3da; color: #0067ac; text-align: left;">
                        <th style="padding: 0.5rem; border-bottom: 1px solid #e0e0e0;">Nama Tugas</th>
                        <th style="padding: 0.5rem; border-bottom: 1px solid #e0e0e0;">Deskripsi Submission</th>
                        <th style="padding: 0.5rem; border-bottom: 1px solid #e0e0e0;">File</th>
                        <th style="padding: 0.5rem; border-bottom: 1px solid #e0e0e0;">Dikirim Oleh</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($task_submissions as $sub)
                        <tr>
                            <td style="padding: 0.5rem;">{{ $sub->nama }}</td>
                            <td style="padding: 0.5rem;">{{ $sub->submission_text }}</td>
                            <td style="padding: 0.5rem;">
                                @if($sub->submission_file)
                                    <a href="{{ asset($sub->submission_file) }}" target="_blank" style="color: #0067ac; text-decoration: underline;">Lihat File</a>
                                @else
                                    <span style="color: #0067ac;">Tidak ada file</span>
                                @endif
                            </td>
                            <td style="padding: 0.5rem;">{{ $sub->username }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div style="text-align: center; color: #0067ac; padding: 1rem;">Belum ada submission tugas.</div>
        @endif
    </div>
</div>