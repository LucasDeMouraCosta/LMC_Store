<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class CategoriesList extends Component
{   
    public $categories;

    public function render(){
        $this->categories = Category::get();

        return view('livewire.categories-list');
    }
}
