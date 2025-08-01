<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
<<<<<<< HEAD
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showAuth()
    {
        return view('Auth.Auth');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
            'role'     => 'required|in:Member,Manager',
        ]);

        $username = $request->input('username');
        $password = $request->input('password');
        $role = $request->input('role');

        /** @var \App\Models\User|null $user */
        $user = User::where('username', $username)
            ->where('role', $role)
            ->first();

        if ($user && Hash::check($password, $user->password)) {
            Auth::login($user);

            session([
                'user_id' => $user->id,
                'username' => $user->username,
                'display_username' => $user->display_username,
                'role' => $user->role,
            ]);

            session()->flash('swal', [
                'icon' => 'success',
                'title' => 'Login berhasil!',
                'text' => 'Selamat datang kembali, ' . $user->display_username,
                'timer' => 1600,
            ]);

            if ($user->is_first_login) {
                return redirect()->route('customize_profile');
            } else {
                if ($user->role === 'Member') {
                    return redirect()->route('member_dashboard');
                } else {
                    return redirect()->route('manager_dashboard');
                }
            }
        }

        session()->flash('swal', [
            'icon' => 'error',
            'title' => 'Login gagal!',
            'text' => 'Username, role, atau password salah.',
            'timer' => 1800,
        ]);

        return back()->withInput();
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|unique:users,username',
            'password' => 'required|string|min:6',
            'role'     => 'required|in:Member,Manager',
        ]);

        $username = $request->input('username');
        $password = $request->input('password');
        $role = $request->input('role');

        $user = User::create([
            'username' => $username,
            'password' => Hash::make($password),
            'role' => $role,
            'profile_image' => null,
            'display_username' => $username,
            'is_first_login' => 1,
        ]);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Registrasi berhasil!',
            'text' => 'Akun berhasil dibuat. Silakan login.',
            'timer' => 1600,
        ]);

        return redirect()->route('auth.page');
    }

    public function logout()
    {
        Auth::logout();
        session()->flush();

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Berhasil logout!',
            'text' => 'Anda telah keluar.',
            'timer' => 1600,
        ]);

        return redirect()->route('auth.page');
    }

    /**
     * Tampilkan halaman custom profile saat pertama login.
     */
    public function showCustomizeProfile()
    {
        /** @var \App\Models\User|null $user */
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('auth.page');
        }

        // Perhatikan path gambar default
        $profile_image = $user->profile_image ? asset($user->profile_image) : asset('img/Profile/default_profile.png');

        // view('customize_profile') => resources/views/customize_profile.blade.php
        // Jika view di folder, misal: resources/views/Auth/customize_profile.blade.php, pakai 'Auth.customize_profile'
        return view('General.customize_profile', [
            'user' => $user,
            'profile_image' => $profile_image
        ]);
    }

  /**
 * Proses update profile user saat pertama login.
 * Gambar disimpan ke public/img/Profile/
 */
public function customizeProfile(Request $request)
{
    /** @var \App\Models\User|null $user */
    $user = Auth::user();

    if (!$user) {
        return redirect()->route('auth.page');
    }

    // Hanya validasi bahwa ada username, profile_image tidak dibatasi tipe/ukuran
    $request->validate([
        'username' => 'required|string|max:255',
        'profile_image' => 'nullable|file'
    ]);

    $user->display_username = $request->input('username');

    if ($request->hasFile('profile_image')) {
        $image = $request->file('profile_image');
        // Bikin nama file unik
        $filename = uniqid('profile_') . '.' . $image->getClientOriginalExtension();
        // Simpan ke public/img/Profile/
        $image->move(public_path('img/Profile'), $filename);
        // Simpan path relatif ke database
        $user->profile_image = 'img/Profile/' . $filename;
    }

    $user->is_first_login = 0;
    $user->save();

    session(['display_username' => $user->display_username]);

    if ($user->role === 'Member') {
        return redirect()->route('member_dashboard');
    } else {
        return redirect()->route('manager_dashboard');
    }
}
}
=======
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Method untuk menangani login
    public function login(Request $request)
    {
        // Validasi input user
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Cek apakah user berhasil di-authenticate
        if (Auth::attempt([
            'username' => $request->username,
            'password' => $request->password
        ])) {
            // Jika berhasil login, redirect ke dashboard
            return redirect()->intended('/dashboard_member');
        } else {
            // Jika gagal login, kembali ke halaman login dengan error
            return back()->withErrors([
                'message' => 'Username atau password salah.',
            ]);
        }
    }

    // Method untuk menangani register
    public function register(Request $request)
    {
        // Validasi input user
        $request->validate([
            'username' => 'required|string|unique:users',
            'name' => 'required|string|max:255', // validasi nama
            'email' => 'required|string|email|max:255|unique:users', // validasi email
            'password' => 'required|string|min:8|confirmed', // konfirmasi password
        ]);

        // Membuat user baru
        $user = User::create([
            'username' => $request->username,
            'name' => $request->name,  // Menyimpan nama
            'email' => $request->email,  // Menyimpan email
            'password' => Hash::make($request->password), // hash password
        ]);

        // Login setelah registrasi
        Auth::login($user); // Menggunakan login langsung setelah registrasi

        // Redirect ke dashboard atau halaman lain setelah login
        return redirect()->route('dashboard_member'); // Bisa ganti dengan halaman lain sesuai role atau akses
    }
}
>>>>>>> 8498eb2529faa2a04cb51e402f03bc4c6f493ac8
