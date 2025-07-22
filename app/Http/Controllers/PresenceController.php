<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi;
use Illuminate\Support\Facades\Auth;

class PresenceController extends Controller
{
    public function index()
    {
        $absensis = Absensi::where('member_id', Auth::id())->orderByDesc('tanggal')->get();
        return view('member.presence', compact('absensis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'status' => 'required|in:Hadir,Tidak Hadir,Izin',
            'foto' => 'required',
        ]);

        $filename = null;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('img/Absensi');
            // Pastikan folder img/Absensi sudah ada atau buat otomatis
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            $file->move($destinationPath, $namaFile);
            $filename = 'img/Absensi/' . $namaFile; // Simpan path relatif dari public
        }

        Absensi::create([
            'member_id' => Auth::id(),
            'nama'      => Auth::user()->username,
            'tanggal'   => $request->input('tanggal'),
            'status'    => $request->input('status'),
            'foto'      => $filename,
        ]);

        return redirect()->route('presence.index')->with('success', 'Absence added!');
    }
}