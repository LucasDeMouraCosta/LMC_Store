<?php

namespace App\View\Components\form;

use App\Models\State;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputSelectState extends Component
{
    public $states;
    public $selectedState;

    public function __construct($selectedState = null)
    {
        $this->states = State::all();
        $this->selectedState = $selectedState;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.input-select-state');
    }
}
