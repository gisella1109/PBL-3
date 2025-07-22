<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi;
use Illuminate\Support\Facades\Auth;

class PresenceManagerController extends Controller
{
    /**
     * Display a listing of the resource (all absensi for manager).
     */
    public function index()
    {
        $dataAbsensi = Absensi::orderByDesc('tanggal')->get();

        $user = Auth::user();
        $profile_image = $user->profile_image ?? asset('default-profile.png');

        return view('manager.presence_manager', compact('dataAbsensi', 'user', 'profile_image'));
    }
}