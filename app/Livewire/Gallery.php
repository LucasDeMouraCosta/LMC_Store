<?php

namespace App\Livewire;

use Livewire\Component;

class Gallery extends Component
{
    public $images;
    public $featuredUrl;
    public $currentIndex = 0;

    public function mount($images){
        $this->images = collect($images);
        $this->featuredUrl = $this->images->firstWhere('sequence_number', 0)?->url ?? '/assets/icons/imageIcon.png';
        $this->currentIndex = $this->images->search(fn ($image) => $image['url'] === $this->featuredUrl) ?? 0;
    }

    public function setFeatured(String $url){
        $this->featuredUrl = $url;
        $this->currentIndex = $this->images->search(fn ($image) => $image['url'] === $url) ?? 0;
    }

    public function nextImage(){
        $this->currentIndex = ($this->currentIndex + 1) % $this->images->count();
        if ($this->images->isNotEmpty()) {
    $this->featuredUrl = $this->images[$this->currentIndex]['url'];
}
    }

    public function prevImage(){
        $this->currentIndex = ($this->currentIndex - 1 + $this->images->count()) % $this->images->count();
        if ($this->images->isNotEmpty()) {
            $this->featuredUrl = $this->images[$this->currentIndex]['url'];
        }
    }
}
