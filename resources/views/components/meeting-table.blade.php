<div style="background: #d0eaeb; border-radius: 0.5rem; box-shadow: 0 1px 6px rgba(0,0,0,0.08); padding: 1rem;">
    @if($meetings->count())
    <div style="overflow-x:auto;">
        <table style="min-width:100%; border: 1px solid #e0e0e0; font-size: 0.95rem; background: #fff; border-radius: 0.5rem;">
            <thead>
                <tr style="background: #96d3da; color: #0067ac; text-align: left;">
                    <th style="padding: 0.75rem; border-bottom: 1px solid #e0e0e0; font-weight:600;">Meeting Name</th>
                    <th style="padding: 0.75rem; border-bottom: 1px solid #e0e0e0; font-weight:600;">Due Date</th>
                    <th style="padding: 0.75rem; border-bottom: 1px solid #e0e0e0; font-weight:600;">Status</th>
                    <th style="padding: 0.75rem; border-bottom: 1px solid #e0e0e0; font-weight:600;">Created By</th>
                </tr>
            </thead>
            <tbody>
                @foreach($meetings as $meeting)
                <tr style="border-bottom: 1px solid #e0e0e0; transition: background 0.2s;" onmouseover="this.style.background='#e0e0e0'" onmouseout="this.style.background='#fff'">
                    <td style="padding: 0.75rem;">{{ $meeting->name }}</td>
                    <td style="padding: 0.75rem;">{{ \Carbon\Carbon::parse($meeting->due_date)->format('d-m-Y') }}</td>
                    <td style="padding: 0.75rem;">
                        <span style="
                            display: inline-block; padding: 0.25rem 0.5rem; border-radius: 0.25rem; font-size: 0.88rem; font-weight: 500;
                            @if($meeting->status === 'Completed')
                                background: #96d3da; color: #0067ac;
                            @elseif($meeting->status === 'Pending')
                                background: #e0e0e0; color: #0067ac;
                            @elseif($meeting->status === 'Cancelled')
                                background: #e53e3e; color: #fff;
                            @else
                                background: #d0eaeb; color: #0067ac;
                            @endif
                        ">
                            {{ $meeting->status }}
                        </span>
                    </td>
                    <td style="padding: 0.75rem;">{{ $meeting->created_by }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <div style="width: 100%; background: #fff3cd; border-left: 4px solid #ffe066; color: #b28704; padding: 1rem; border-radius: 0.5rem; margin-top: 1rem;" role="alert">
        <p style="font-weight: 600;">No schedules available for your teams.</p>
    </div>
    @endif
</div>