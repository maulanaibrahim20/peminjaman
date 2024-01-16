<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    public function superadmin()
    {
        return view('superadmin.dashboard');
    }

    public function admin()
    {
        return view('admin.dashboard');
    }

    public function mahasiswa()
    {
        return view('mahasiswa.dashboard');
    }
}
