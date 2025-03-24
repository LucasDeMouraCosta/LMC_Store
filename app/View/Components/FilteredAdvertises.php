<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FilteredAdvertises extends Component
{
    public $advertisesList;

    public function __construct()
    {
        $this->advertisesList = [
            ['image' => 'https://via.placeholder.com/150', 'title' => 'Anúncio 1', 'price' => 'R$ 100,00', 'href' => '#'],
            ['image' => 'https://via.placeholder.com/150', 'title' => 'Anúncio 2', 'price' => 'R$ 200,00', 'href' => '#'],
            ['image' => 'https://via.placeholder.com/150', 'title' => 'Anúncio 3', 'price' => 'R$ 300,00', 'href' => '#'],
            ['image' => 'https://via.placeholder.com/150', 'title' => 'Anúncio 4', 'price' => 'R$ 400,00', 'href' => '#'],
            ['image' => 'https://via.placeholder.com/150', 'title' => 'Anúncio 5', 'price' => 'R$ 500,00', 'href' => '#'],
            ['image' => 'https://via.placeholder.com/150', 'title' => 'Anúncio 6', 'price' => 'R$ 600,00', 'href' => '#'],
            ['image' => 'https://via.placeholder.com/150', 'title' => 'Anúncio 7', 'price' => 'R$ 700,00', 'href' => '#'],
            ['image' => 'https://via.placeholder.com/150', 'title' => 'Anúncio 8', 'price' => 'R$ 800,00', 'href' => '#'],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.filtered-advertises');
    }
}
