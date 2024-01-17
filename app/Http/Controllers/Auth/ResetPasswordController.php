<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;




class ResetPasswordController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function index()
    {
        return view('autentikasi.reset-password.reset-password');
    }

    public function process(Request $request)
    {
        $user = $this->user->whereEmail($request->email)->first();
        if (!$user) {
            alert::warning('error', 'Akun Tidak Ditemukan');
            return back()->with('error', 'akun tidak ditemukan');
        }

        $status = Password::sendResetLink($request->only('email'));

        if ($status == Password::RESET_LINK_SENT) {
            Alert::success('Success', "link reset password telah dikirim ke email anda");
            return back()->with('success', 'link reset password telah dikirim ke email anda');
        }
        throw ValidationException::withMessages([
            'email' => [trans($status)]
        ]);
    }
}
