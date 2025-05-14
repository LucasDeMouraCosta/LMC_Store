<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{
    public function register(){
        return view('auth.register');
    }

    public function register_action(RegisterRequest $request){

        $data = $request->only('name', 'email', 'password');
        $data['password'] = Hash::make($data['password']);
        
        $user = User::create($data);

        Auth::loginUsingId($user->id);

        return redirect()->route('select-state');

    }

    public function state_action(Request $request){

        $data = $request->only(['state_id']);
        $stateRegister = State::find($data['state_id']);

        if(!$stateRegister){
            return redirect()->back()->with('error', 'Estado não encontrado');
        }
        $user = User::find(Auth::user()->id);
        $user->state_id =  $stateRegister->id;
        $user->save();

        return redirect()->route('home');
    }


    public function login_action(LoginRequest $request){
        $credentials = $request->only('email', 'password');

        session()->flash('email', $request->email);

        if (Auth::attempt($credentials)) {
            return redirect()->route('home');
        }

        return redirect()->back()->with('error', 'Credenciais inválidas');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function forgot_password_action(Request $request){
        session()->flash('email', $request->email);
        
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink($request->only('email'));

        return $status === Password::RESET_LINK_SENT
            ? back()->with('status', __($status))
            : back()->withErrors(['email' => __($status)]);
    }
}
