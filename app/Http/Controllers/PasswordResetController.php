<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PasswordResetController extends Controller
{
    public function showResetForm($token, Request $request){
        $email = $request->input('email');
        if (!$email) {
            return redirect()->route('login')->with('error', 'Ocorreu um erro ao tentar redefinir sua senha. Tente novamente.');
        }
        return view('auth.reset-password', compact('token', 'email'));
    }

    public function reset(Request $request){

        $request->validate([
            'token' => 'required',
            'password' => 'required|min:6|max:255|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->save();

                Auth::login($user);
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['token' => [__($status)]]);
    }
}