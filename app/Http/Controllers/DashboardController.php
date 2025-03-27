<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateMyAccountRequest;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    
    public function my_account(){

        $data['user'] = User::find(Auth::user()->id);
        $data['states'] = State::all();

        return view('dashboard.my_account', $data);
    }

    public function my_account_action(UpdateMyAccountRequest $request){
        
        $data = $request->only(['name', 'email', 'state_id']);

        $user = User::find(Auth::user()->id);
        $user->update($data);

        return redirect()->back()->with('success', 'Dados atualizados com sucesso');
    }
}
