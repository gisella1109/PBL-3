<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeManagerController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\HomeMemberController;
use App\Http\Controllers\TeamMemberController;
use App\Http\Controllers\TaskMemberController;


// Halaman utama
Route::get('/', function () {
    return view('welcome');
});
// Prefix semua auth di /auth
Route::prefix('auth')->name('auth.')->group(function () {
    Route::get('/', [AuthController::class, 'showAuth'])->name('page');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Dashboard Member via Controller
Route::get('/member_dashboard', [HomeMemberController::class, 'index'])->name('member_dashboard');
Route::get('/member/schedules/json', [HomeMemberController::class, 'schedulesJson'])->name('member.schedules.json');
Route::post('/member/schedules/accept', [HomeMemberController::class, 'acceptSchedule'])->name('member.schedules.accept');
Route::post('/member/schedules/reject', [HomeMemberController::class, 'rejectSchedule'])->name('member.schedules.reject');
Route::resource('member/schedules', \App\Http\Controllers\MemberScheduleController::class, [
    'names' => [
        'index' => 'member.schedules.index',
        // tambahkan lainnya jika perlu
    ]
])->middleware(['auth']);

// Daftar semua tim yang diikuti member & anggota tim
Route::prefix('teams-members')->middleware(['auth'])->name('teams.members.')->group(function () {
    // Daftar tim yang diikuti user (member)
    Route::get('/', [TeamMemberController::class, 'index'])->name('index');
    // Daftar anggota dari tim tertentu
    Route::get('/{team_id}', [TeamMemberController::class, 'index'])->name('show');
    // Update status: Accept/Reject undangan tim
    Route::post('/status/update', [TeamMemberController::class, 'updateStatus'])->name('status.update');
});


Route::resource('presence', \App\Http\Controllers\PresenceController::class)->middleware(['auth']);


// Task Member Dashboard & Update Status
Route::get('/task_member', [TaskMemberController::class, 'index'])
    ->name('task_member.index')
    ->middleware(['auth']);

Route::post('/task_member/update_status/{id}', [TaskMemberController::class, 'updateStatus'])
    ->name('task_member.update_status')
    ->middleware(['auth']);

// Form submit tugas (GET)
Route::get('/task_member/submit/{id}', [TaskMemberController::class, 'submitForm'])
    ->name('task_member.submit_form')
    ->middleware(['auth']);

// Proses submit tugas (POST)
Route::post('/task_member/submit/{id}', [TaskMemberController::class, 'submit'])
    ->name('task_member.submit')
    ->middleware(['auth']);

// Dashboard untuk Manager (gunakan controller agar data dinamis)
Route::get('/manager_dashboard', [HomeManagerController::class, 'index'])->name('manager_dashboard');
Route::resource('meetings', \App\Http\Controllers\ManageMeetingController::class)->except(['show']);

Route::resource('schedule', \App\Http\Controllers\ScheduleController::class)->except(['show', 'create', 'edit']);
Route::get('/schedule/load', [\App\Http\Controllers\ScheduleController::class, 'load'])
    ->name('schedule.load');


Route::resource('teams', \App\Http\Controllers\TeamController::class)->middleware(['auth']);
Route::post('teams/{team}/invite', [\App\Http\Controllers\TeamController::class, 'inviteMember'])->name('invite.member')->middleware(['auth']);
Route::post('/invite-member', [\App\Http\Controllers\TeamController::class, 'inviteMemberDynamic'])->name('invite.member.dynamic');

Route::prefix('manager')->middleware(['auth'])->name('manager.')->group(function () {
    Route::resource('presence', \App\Http\Controllers\PresenceManagerController::class);
});
Route::resource('tasks', TaskController::class);

// Customize profile
Route::get('/customize_profile', [AuthController::class, 'showCustomizeProfile'])->name('customize_profile');
Route::post('/customize_profile', [AuthController::class, 'customizeProfile'])->name('customize_profile.submit');
=======
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListBarangController;
use App\Http\Controllers\AuthController; // pastikan AuthController diimport

// Routing ke HomeController
Route::get('/', [HomeController::class, 'index']);
Route::get('/contact', [HomeController::class, 'contact']); // Cukup satu saja
Route::get('/list-barang', [ListBarangController::class, 'tampilkan']);

// Route login POST
Route::post('/login', [AuthController::class, 'login']); // Login handler
// Route register POST
Route::post('/register', [AuthController::class, 'register']); // Register handler

// Route untuk tampilan login, register, dan lainnya
Route::get('/login', function () {
    return view('login');
});

Route::get('/dashboard_member', function () {
    return view('dashboard');
})->middleware('auth'); // pastikan user sudah login

Route::get('/schedule', function () {
    return view('schedule');
});

Route::get('/kalendermember', function () {
    return view('Kalendermember');
});

Route::get('/teams', function () {
    return view('teams');
});

Route::get('/presence', function () {
    return view('presence');
});

Route::get('/register', function () {
    return view('register');
});
>>>>>>> 8498eb2529faa2a04cb51e402f03bc4c6f493ac8
