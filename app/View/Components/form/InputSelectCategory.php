<?php

namespace App\View\Components\form;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputSelectCategory extends Component
{
    public $categories;
    public $selectedCategory;
    public $allCategories;

    public function __construct($selectedCategory = null, $allCategories = false)
    {
        $this->categories = Category::all();
        $this->selectedCategory = $selectedCategory;
        $this->allCategories = $allCategories;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        
        return view('components.form.input-select-category');
    }
}
