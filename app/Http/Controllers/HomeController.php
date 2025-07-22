<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'nama' => 'Zetta Amini mulya',
            'pekerjaan' => 'programmer',
        ];
        return view('home');

        $nama = "Sylus";
        $pekerjaan = "CEO";
        return view('home', compact('nama', 'pekerjaan'));
    }

    public function contact()
    {
        return view('contact');
    }
}
