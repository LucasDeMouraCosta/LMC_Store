<?php

namespace App\View\Components;

use App\Models\State;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class hero extends Component
{
    public $states;
    public $categories;

    public function __construct()
    {
        $this->states = State::all();

        $this->categories = [
            ['value' => '1', 'name' => 'Eletrônicos'],
            ['value' => '2', 'name' => 'Móveis'],
            ['value' => '3', 'name' => 'Eletrodomésticos'],
            ['value' => '4', 'name' => 'Brinquedos'],
            ['value' => '5', 'name' => 'Informática'],
            ['value' => '6', 'name' => 'Outros'],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.hero');
    }
}
