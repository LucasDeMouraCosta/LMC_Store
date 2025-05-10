<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class CategoriesList extends Component
{   
    public $categories;

    public function render(){
        $this->categories = Category::limit(7)->get();

        return view('livewire.categories-list');
    }
}
