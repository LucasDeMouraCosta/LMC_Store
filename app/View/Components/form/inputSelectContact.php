<?php

namespace App\View\Components\form;

use App\Models\UserContact;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class inputSelectContact extends Component
{
   
    public $contacts;

    public function __construct(){
        $this->contacts = UserContact::where('user_id', Auth::user()->id)->orderBy('label')->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.input-select-contact');
    }
}
