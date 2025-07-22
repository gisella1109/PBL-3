<?php

use Illuminate\Support\Facades\Route;
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
