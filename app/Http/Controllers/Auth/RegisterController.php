<?php

namespace App\Http\Auth\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function index()
    {
        return view('regis.register');
    }
    public function store(Request $request)
    {
        // dd($request->all());
        try {
            User::create([
                'name' => $request->name,
                'username' => str::slug($request->name),
                'email' => $request->email,
                'password' => $request->password,
                'no_tlp' => $request->no_tlp,
                'alamat' => $request->alamat,
                'role_id' => '3',
            ]);
            Alert::success('Register Berhasil, Silahkan Login');
            return redirect('/login');
        } catch (\Exception $e) {
            Alert::error('gagal update' . $e->getMessage());
            return back();
        }
    }
}
