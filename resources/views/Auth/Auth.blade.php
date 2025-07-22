<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Time To Meet | Login & Register</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-green-100 font-sans">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-lg px-8 py-8">
        <div class="flex flex-col items-center mb-6">
            <div class="flex items-center gap-2 mb-2">
                <!-- Icon Website -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2" fill="#B4E197"/>
                  <path stroke="#256029" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M8 12h4v4m0-4V8"/>
                </svg>
                <span class="text-2xl font-extrabold text-green-700 tracking-tight">Time To Meet</span>
            </div>
            <div class="flex justify-center space-x-2 w-full">
                <button id="loginTab" type="button" class="w-1/2 px-4 py-2 rounded-t-lg font-semibold text-gray-700 border-b-2 border-green-500 focus:outline-none" onclick="showTab('login')">
                    Login
                </button>
                <button id="registerTab" type="button" class="w-1/2 px-4 py-2 rounded-t-lg font-semibold text-gray-500 border-b-2 border-transparent focus:outline-none" onclick="showTab('register')">
                    Register
                </button>
            </div>
        </div>
        
        {{-- Login Form --}}
        <form id="loginForm" method="POST" action="{{ route('auth.login') }}" class="space-y-4">
            @csrf
            <h2 class="text-2xl font-bold text-center text-gray-700 mb-2">Welcome Back!</h2>
            <p class="text-center text-gray-500 mb-4">Login to your Time To Meet account</p>
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-3 py-2 rounded relative">
                    <ul class="text-xs ml-2 list-disc">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div>
                <label class="block text-sm font-medium text-gray-700" for="login_username">Username</label>
                <input class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-green-400 focus:border-green-400"
                       type="text" id="login_username" name="username" required autocomplete="username" value="{{ old('username') }}">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700" for="login_password">Password</label>
                <input class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-green-400 focus:border-green-400"
                       type="password" id="login_password" name="password" required autocomplete="current-password">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700" for="login_role">Select Role</label>
                <select class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-green-400 focus:border-green-400"
                        id="login_role" name="role" required>
                    <option value="Member" {{ old('role')=="Member" ? "selected" : "" }}>Member</option>
                    <option value="Manager" {{ old('role')=="Manager" ? "selected" : "" }}>Manager</option>
                </select>
            </div>
            <button type="submit" class="w-full py-2 px-4 rounded-lg bg-green-600 text-white font-semibold hover:bg-green-700 transition">LOGIN</button>
            <p class="text-center text-sm mt-2 text-gray-500">
                Don't have an account? <a href="#" class="text-green-600 hover:underline" onclick="showTab('register')">Sign up here!</a>
            </p>
        </form>

        {{-- Register Form --}}
        <form id="registerForm" method="POST" action="{{ route('auth.register') }}" class="space-y-4 hidden">
            @csrf
            <h2 class="text-2xl font-bold text-center text-gray-700 mb-2">Sign Up</h2>
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-3 py-2 rounded relative">
                    <ul class="text-xs ml-2 list-disc">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="flex justify-center gap-2 mb-2">
                <button type="button" id="roleMemberBtn" class="flex-1 py-2 rounded-lg font-semibold text-white bg-green-600" onclick="setRole('Member')">Member</button>
                <button type="button" id="roleManagerBtn" class="flex-1 py-2 rounded-lg font-semibold text-green-600 bg-green-100" onclick="setRole('Manager')">Manager</button>
            </div>
            <input type="hidden" id="register_role" name="role" value="Member">
            <div>
                <label class="block text-sm font-medium text-gray-700" for="register_username">Username</label>
                <input class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-green-400 focus:border-green-400"
                       type="text" id="register_username" name="username" required value="{{ old('username') }}">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700" for="register_password">Password</label>
                <input class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-green-400 focus:border-green-400"
                       type="password" id="register_password" name="password" required>
            </div>
            <button type="submit" class="w-full py-2 px-4 rounded-lg bg-green-600 text-white font-semibold hover:bg-green-700 transition">Create Account</button>
            <p class="text-center text-sm mt-2 text-gray-500">
                Already have an account? <a href="#" class="text-green-600 hover:underline" onclick="showTab('login')">Login</a>
            </p>
        </form>
    </div>

    <script>
        @if(session('swal'))
            Swal.fire({
                icon: '{{ session('swal.icon') }}',
                title: '{{ session('swal.title') }}',
                text: '{{ session('swal.text') }}',
                timer: {{ session('swal.timer') ?? 1800 }},
                timerProgressBar: true,
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                customClass: {
                    popup: 'border-2 border-green-600 bg-green-50'
                },
                color: '#166534',
                background: '#f0fdf4'
            });
            // Jika berhasil register, otomatis pindah ke tab login
            @if(session('swal.icon') == 'success' && session('swal.title') == 'Registrasi berhasil!')
                document.addEventListener("DOMContentLoaded", function() {
                    showTab('login');
                });
            @endif
        @endif

        // Show correct tab on reload if there are errors or old input
        window.onload = function() {
            @if(old('username') && !session('swal'))
                showTab('register');
            @endif
        };

        function showTab(tab) {
            const loginTab = document.getElementById('loginTab');
            const registerTab = document.getElementById('registerTab');
            const loginForm = document.getElementById('loginForm');
            const registerForm = document.getElementById('registerForm');
            if (tab === 'login') {
                loginForm.classList.remove('hidden');
                registerForm.classList.add('hidden');
                loginTab.classList.add('text-gray-700', 'border-green-500');
                loginTab.classList.remove('text-gray-500', 'border-transparent');
                registerTab.classList.remove('text-gray-700', 'border-green-500');
                registerTab.classList.add('text-gray-500', 'border-transparent');
            } else {
                loginForm.classList.add('hidden');
                registerForm.classList.remove('hidden');
                registerTab.classList.add('text-gray-700', 'border-green-500');
                registerTab.classList.remove('text-gray-500', 'border-transparent');
                loginTab.classList.remove('text-gray-700', 'border-green-500');
                loginTab.classList.add('text-gray-500', 'border-transparent');
            }
        }

        function setRole(role) {
            document.getElementById('register_role').value = role;
            if (role === 'Member') {
                document.getElementById('roleMemberBtn').classList.add('bg-green-600', 'text-white');
                document.getElementById('roleMemberBtn').classList.remove('bg-green-100', 'text-green-600');
                document.getElementById('roleManagerBtn').classList.add('bg-green-100', 'text-green-600');
                document.getElementById('roleManagerBtn').classList.remove('bg-green-600', 'text-white');
            } else {
                document.getElementById('roleManagerBtn').classList.add('bg-green-600', 'text-white');
                document.getElementById('roleManagerBtn').classList.remove('bg-green-100', 'text-green-600');
                document.getElementById('roleMemberBtn').classList.add('bg-green-100', 'text-green-600');
                document.getElementById('roleMemberBtn').classList.remove('bg-green-600', 'text-white');
            }
        }
    </script>
</body>
</html>