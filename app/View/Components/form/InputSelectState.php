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
    public $allStates;
    public $name;

    public function __construct($selectedState = null, $allStates = false, $name = null)
    {
        $this->states = State::all();
        $this->selectedState = $selectedState;
        $this->allStates = $allStates;
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.input-select-state');
    }
}
