<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(){
        return view('auth.register');
    }

    public function register_action(RegisterRequest $request){

        dd('ok');

        $data = $request->only('name', 'email', 'password');
        $data['password'] = bcrypt($data['password']);
        
        $user = User::create($data);

        return redirect()->route('login');
    }
}
