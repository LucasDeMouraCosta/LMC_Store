<?php

namespace App\Livewire;

use App\Models\Advertise;
use App\Models\Category;
use App\Models\State;
use Livewire\Component;
use Livewire\WithPagination;

class AdvertiseList extends Component
{
    use WithPagination;

    public $textSearch = '';
    public $stateSelected = null;
    public $categorySelected = null;

    protected $queryString = [
        'textSearch' => ['as' => 't', 'except' => ''],
        'stateSelected' => ['as' => 's', 'except' => null],
        'categorySelected' => ['as' => 'c', 'except' => null],
        'page' => ['except' => 1],
    ];

    public function updating($name, $value)
    {
        if ($name === 'textSearch' || $name === 'stateSelected' || $name === 'categorySelected') {
            $this->resetPage();
        }
    }

    public function render()
    {
        $filteredAdvertises = Advertise::query()
            ->when($this->textSearch, function ($query) {
                $query->where('title', 'like', '%' . $this->textSearch . '%');
            })
            ->when($this->stateSelected, function ($query) {
                $state = State::where('initials', $this->stateSelected)->first();

                $query->where('state_id', $state->id);
            })
            ->when($this->categorySelected, function ($query) {
                $category = Category::where('slug', $this->categorySelected)->first();
                
                $query->where('category_id', $category->id);
            })
            ->orderBy('created_at', 'desc')->paginate(12)->onEachSide(1);

        return view('livewire.advertise-list', compact('filteredAdvertises'));
    }
}