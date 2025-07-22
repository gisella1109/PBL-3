<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-br from-indigo-200 to-blue-300 flex justify-center items-center min-h-screen">

<div class="card w-96 bg-white shadow-xl border border-gray-200">
    <div class="card-body">
        <h2 class="text-center text-2xl font-bold text-primary">Welcome To Our Web</h2>
        <p class="text-center mb-4 text-gray-600">Login To Your Account</p>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-control">
                <label for="username" class="label">
                    <span class="label-text text-gray-700">Username</span>
                </label>
                <input type="text" id="username" name="username" class="input input-bordered" placeholder="Enter your username" required value="{{ old('username') }}">
                @error('username')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-control mt-4">
                <label for="password" class="label">
                    <span class="label-text text-gray-700">Password</span>
                </label>
                <input type="password" id="password" name="password" class="input input-bordered" placeholder="Enter your password" required>
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-control mt-4">
                <label for="role" class="label">
                    <span class="label-text text-gray-700">Select a role</span>
                </label>
                <select name="role" id="role" class="select select-bordered w-full">
                    <option value="Member" {{ old('role') == 'Member' ? 'selected' : '' }}>Member</option>
                    <option value="Manager" {{ old('role') == 'Manager' ? 'selected' : '' }}>Manager</option>
                </select>
            </div>

            <div class="form-control mt-6">
                <button type="submit" class="btn btn-primary w-full">LOGIN</button>
            </div>
        </form>

        <div class="mt-4 text-center">
            <p class="text-gray-600">Don't have an account? 
                <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Sign up here</a>
            </p>
        </div>
    </div>
</div>

</body>
</html>
