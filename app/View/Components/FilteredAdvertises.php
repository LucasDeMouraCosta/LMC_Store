<?php

namespace App\View\Components;

use App\Models\Advertise;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FilteredAdvertises extends Component
{
    public $advertises;

    public function __construct()
    {
        $this->advertises = Advertise::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.filtered-advertises');
    }
}
