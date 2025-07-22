<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale() ?: 'id') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Time To Meet' }}</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- FullCalendar & jQuery --}}
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/fullcalendar.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/fullcalendar.min.js"></script>
    {{-- Boxicons --}}
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    {{-- SweetAlert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('head')
</head>
<body class="min-h-screen bg-green-100 font-sans">
    @include('partials.siderbar_member')
    
    <!-- Mobile Header -->
    <header class="lg:hidden fixed top-0 left-0 right-0 bg-white shadow-md z-30 px-4 py-3">
        <div class="flex items-center justify-between">
            <button id="mobile-menu-button" class="text-2xl text-green-700 hover:text-green-800">
                <i class="bx bx-menu"></i>
            </button>
            <div class="flex items-center">
                <img src="{{ asset('meetingsreminder.png') }}" alt="logo_icon" class="w-8 h-8 rounded mr-2">
                <span class="font-bold text-lg text-green-700">TimeToMeet</span>
            </div>
            <div class="w-8"></div> <!-- Spacer untuk balance -->
        </div>
    </header>

    <!-- Main Content -->
    <main id="main-content" class="flex-1 transition-all duration-300 lg:ml-64 pt-16 lg:pt-0 p-6">
        @yield('content')
    </main>

    {{-- SweetAlert2 for flash messages --}}
    <script>
        @if(session('swal'))
            Swal.fire({
                icon: "{{ session('swal.icon') ?? 'info' }}",
                title: "{{ session('swal.title') ?? '' }}",
                text: "{{ session('swal.text') ?? '' }}",
                timer: {{ session('swal.timer') ?? 2000 }},
                showConfirmButton: false
            });
        @endif

        // Validasi error (dari $errors Laravel)
        @if ($errors->any())
            Swal.fire({
                icon: "error",
                title: "Validasi Error",
                html: `{!! implode('<br>', $errors->all()) !!}`,
                timer: 3300,
                showConfirmButton: true
            });
        @endif
    </script>

    {{-- Sidebar Toggle Script --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const sidebarToggle = document.getElementById('sidebar-toggle');
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const sidebarOverlay = document.getElementById('sidebar-overlay');
            const mainContent = document.getElementById('main-content');

            function toggleSidebar() {
                sidebar.classList.toggle('-translate-x-full');
                if (window.innerWidth < 1024) {
                    sidebarOverlay.classList.toggle('hidden');
                }
            }
            function closeSidebar() {
                sidebar.classList.add('-translate-x-full');
                if (window.innerWidth < 1024) {
                    sidebarOverlay.classList.add('hidden');
                }
            }
            function openSidebar() {
                sidebar.classList.remove('-translate-x-full');
                if (window.innerWidth < 1024) {
                    sidebarOverlay.classList.remove('hidden');
                }
            }

            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', toggleSidebar);
            }
            if (mobileMenuButton) {
                mobileMenuButton.addEventListener('click', openSidebar);
            }
            if (sidebarOverlay) {
                sidebarOverlay.addEventListener('click', closeSidebar);
            }

            document.addEventListener('click', function(event) {
                if (window.innerWidth < 1024) {
                    const isClickInsideSidebar = sidebar.contains(event.target);
                    const isClickOnToggle = mobileMenuButton && mobileMenuButton.contains(event.target);
                    if (!isClickInsideSidebar && !isClickOnToggle && !sidebar.classList.contains('-translate-x-full')) {
                        closeSidebar();
                    }
                }
            });

            window.addEventListener('resize', function() {
                if (window.innerWidth >= 1024) {
                    sidebar.classList.remove('-translate-x-full');
                    sidebarOverlay.classList.add('hidden');
                } else {
                    sidebar.classList.add('-translate-x-full');
                    sidebarOverlay.classList.add('hidden');
                }
            });

            if (window.innerWidth < 1024) {
                sidebar.classList.add('-translate-x-full');
                sidebarOverlay.classList.add('hidden');
            } else {
                sidebar.classList.remove('-translate-x-full');
                sidebarOverlay.classList.add('hidden');
            }
        });
    </script>
    @stack('scripts')
</body>
</html>