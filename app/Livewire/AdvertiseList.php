<?php

namespace App\Livewire;

use App\Models\Advertise;
use Livewire\Component;
use Livewire\WithPagination;

class AdvertiseList extends Component
{
    use WithPagination;

    public $textSearch = '';
    public $stateSelected = null;
    public $categorySelected = null;

    protected $queryString = [
        'textSearch' => ['except' => ''],
        'stateSelected' => ['except' => null],
        'categorySelected' => ['except' => null],
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
                $query->where('state_id', $this->stateSelected);
            })
            ->when($this->categorySelected, function ($query) {
                $query->where('category_id', $this->categorySelected);
            })
            ->paginate(1)->onEachSide(1);

        return view('livewire.advertise-list', compact('filteredAdvertises'));
    }
}