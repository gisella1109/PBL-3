<div id="sidebar"
    class="sidebar fixed top-0 left-0 h-full w-64"
    style="background-color: #96d3da; box-shadow: 0 4px 24px rgba(0,0,0,0.08);">
    <div class="logo_details flex items-center p-4" style="border-bottom: 1px solid #e0e0e0;">
        <img src="{{ asset('img/Element/meetingsreminder.png') }}" alt="logo_icon" class="w-10 h-10 rounded">
        <div class="logo_name ml-2 font-bold text-xl" style="color: #fff;">TimeToMeet</div>
        <i id="sidebar-toggle" class="bx bx-menu ml-auto cursor-pointer text-xl" style="color: #fff;"></i>
    </div>
    <ul class="nav-list flex-1 px-2 py-4 space-y-2">
        <li>
            <div class="relative">
                <i class="bx bx-search absolute left-3 top-3" style="color: #0067ac;"></i>
                <input type="text" placeholder="Search..."
                    class="w-full pl-10 pr-2 py-2 rounded-lg text-sm"
                    style="background: #0067ac; color: #fff; border: none; outline: none;">
            </div>
        </li>
        <li>
            <a href="{{ route('member_dashboard') }}"
                class="flex items-center p-2 rounded-lg transition-colors"
                style="
                    background: {{ request()->routeIs('member_dashboard') ? '#fff' : '#96d3da' }};
                    color: {{ request()->routeIs('member_dashboard') ? '#0067ac' : '#fff' }};
                    font-weight: {{ request()->routeIs('member_dashboard') ? 'bold' : 'normal' }};
                "
                onmouseover="this.style.background='#e0e0e0'; this.style.color='#0067ac';"
                onmouseout="this.style.background={{ request()->routeIs('member_dashboard') ? '\'#fff\'' : '\'#96d3da\'' }}; this.style.color={{ request()->routeIs('member_dashboard') ? '\'#0067ac\'' : '\'#fff\'' }};"
            >
                <i class="bx bxs-home mr-2"></i>
                <span>Home</span>
            </a>
        </li>
        <li>
            <a href="{{ route('member.schedules.index') }}"
                class="flex items-center p-2 rounded-lg transition-colors"
                style="
                    background: {{ request()->routeIs('member.schedules.index') ? '#fff' : '#96d3da' }};
                    color: {{ request()->routeIs('member.schedules.index') ? '#0067ac' : '#fff' }};
                    font-weight: {{ request()->routeIs('member.schedules.index') ? 'bold' : 'normal' }};
                "
                onmouseover="this.style.background='#e0e0e0'; this.style.color='#0067ac';"
                onmouseout="this.style.background={{ request()->routeIs('member.schedules.index') ? '\'#fff\'' : '\'#96d3da\'' }}; this.style.color={{ request()->routeIs('member.schedules.index') ? '\'#0067ac\'' : '\'#fff\'' }};"
            >
                <i class="bx bxs-calendar-check mr-2"></i>
                <span>Schedule</span>
            </a>
        </li>
        <li>
            <a href="{{ route('teams.members.index') }}"
                class="flex items-center p-2 rounded-lg transition-colors"
                style="
                    background: {{ (request()->routeIs('teams.members.*') && !request()->route('team_id')) ? '#fff' : '#96d3da' }};
                    color: {{ (request()->routeIs('teams.members.*') && !request()->route('team_id')) ? '#0067ac' : '#fff' }};
                    font-weight: {{ (request()->routeIs('teams.members.*') && !request()->route('team_id')) ? 'bold' : 'normal' }};
                "
                onmouseover="this.style.background='#e0e0e0'; this.style.color='#0067ac';"
                onmouseout="this.style.background={{ (request()->routeIs('teams.members.*') && !request()->route('team_id')) ? '\'#fff\'' : '\'#96d3da\'' }}; this.style.color={{ (request()->routeIs('teams.members.*') && !request()->route('team_id')) ? '\'#0067ac\'' : '\'#fff\'' }};"
            >
                <i class="bx bxs-group mr-2"></i>
                <span>Teams</span>
            </a>
        </li>
        <li>
            <a href="{{ route('presence.index') }}"
                class="flex items-center p-2 rounded-lg transition-colors"
                style="
                    background: {{ request()->routeIs('presence.*') ? '#fff' : '#96d3da' }};
                    color: {{ request()->routeIs('presence.*') ? '#0067ac' : '#fff' }};
                    font-weight: {{ request()->routeIs('presence.*') ? 'bold' : 'normal' }};
                "
                onmouseover="this.style.background='#e0e0e0'; this.style.color='#0067ac';"
                onmouseout="this.style.background={{ request()->routeIs('presence.*') ? '\'#fff\'' : '\'#96d3da\'' }}; this.style.color={{ request()->routeIs('presence.*') ? '\'#0067ac\'' : '\'#fff\'' }};"
            >
                <i class="bx bx-user-check mr-2"></i>
                <span>Attendance</span>
            </a>
        </li>
        <li>
            <a href="{{ route('task_member.index') }}"
                class="flex items-center p-2 rounded-lg transition-colors"
                style="
                    background: {{ request()->routeIs('task_member.*') ? '#fff' : '#96d3da' }};
                    color: {{ request()->routeIs('task_member.*') ? '#0067ac' : '#fff' }};
                    font-weight: {{ request()->routeIs('task_member.*') ? 'bold' : 'normal' }};
                "
                onmouseover="this.style.background='#e0e0e0'; this.style.color='#0067ac';"
                onmouseout="this.style.background={{ request()->routeIs('task_member.*') ? '\'#fff\'' : '\'#96d3da\'' }}; this.style.color={{ request()->routeIs('task_member.*') ? '\'#0067ac\'' : '\'#fff\'' }};"
            >
                <i class="bx bx-task-x mr-2"></i>
                <span>Tasks</span>
            </a>
        </li>
    </ul>
    <div class="profile flex items-center p-4" style="border-top: 1px solid #e0e0e0;">
        <img src="{{ Auth::user() && Auth::user()->profile_image ? asset(Auth::user()->profile_image) : 'https://placehold.co/80x80/16a34a/fff?text=' . strtoupper(substr(Auth::user()->display_username ?? (Auth::user()->username ?? session('display_username', 'U')), 0, 1)) }}"
            alt="profile image" class="w-10 h-10 rounded-full object-cover" style="background: #e0e0e0;">
        <div class="ml-3">
            <div class="font-semibold text-sm" style="color: #fff;">
                {{ Auth::user()->display_username ?? (Auth::user()->username ?? session('display_username')) }}
            </div>
            <div class="text-xs" style="color: #0067ac;">
                {{ Auth::user()->role ?? '' }}
            </div>
        </div>
        <form action="{{ url('logout') }}" method="POST" class="ml-auto">
            @csrf
            <button type="submit" title="Logout" class="text-xl transition-colors"
                style="color: #0067ac;" 
                onmouseover="this.style.color='#e53e3e';"
                onmouseout="this.style.color='#0067ac';"
            >
                <i class="bx bx-log-out"></i>
            </button>
        </form>
    </div>
</div>

<!-- Overlay untuk mobile -->
<div id="sidebar-overlay" class="fixed inset-0" style="background: rgba(0,0,0,0.5); z-index: 40; display: none;"></div>