<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;


class LoginController extends Controller
{

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function index()
    {
        return view('autentikasi.login.login');
    }
    public function login(Request $request)
    {
        $user = $this->user->whereEmail($request->email)->first();

        if (!$user) {
            Alert::error('Maaf Akun Anda Tidak Terdaftar');
            return back()->with('error', 'Maaf Akun Anda Tidak Terdaftar');
        }
        if (!Hash::check($request->password, $user->password)) {
            return back()->withError('hallo');
        }
        if (!$user->email_verified_at) {
            alert::warning('Maaf Akun Anda Belum Terverifikasi');
            return back()->with('error', 'Maaf Akun Anda Belum Terverifikasi');
        }
        if (Auth::attempt(["email" => $request->email, "password" => $request->password])) {
            $request->session()->regenerate();
            if ($user->role_id == '1') {
                return redirect("/superadmin/dashboard")->withSuccess('Selamat Anda Berhasil Login, Selamat Datang ' . Auth::user()->name);
            } else if ($user->role_id == '2') {
                return redirect("/admin/dashboard")->withsuccess('selamat anda berhasil login, selmat datang' . Auth::user()->name);
            } else if ($user->role_id == '3') {
                return redirect("/mahasiswa/dashboard")->withsuccess('selamat anda berhasil login, selamat datang' . Auth::user()->name);
            }
        } else {
            return back()->withError('error');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
