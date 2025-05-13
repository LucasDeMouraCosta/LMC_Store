<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ChangePassword extends Component
{

    public $current_password;
    public $new_password;
    public $new_password_confirmation;

    public function render(){
        return view('livewire.change-password');
    }

    public function changePassword(){

        $this->resetErrorBag();

        $this->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|max:255',
        ]);

        $user = User::find(Auth::user()->id);

        if (!Hash::check($this->current_password, $user->password)) {
            $this->addError('current_password', 'A senha atual está incorreta.');
            return;
        }

        if (Hash::check($this->new_password, $user->password)) {
            $this->addError('new_password', 'A nova senha não pode ser igual à senha atual.');
            return;
        }

        if ($this->new_password !== $this->new_password_confirmation) {
            $this->addError('new_password_confirmation', 'As senhas não coincidem.');
            return;
        }
    
        $user->password = Hash::make($this->new_password);
        $user->save();
        
        $this->reset();

        $this->dispatch('passwordChanged');
    }
}
