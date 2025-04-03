<div class="gallery-wrapper" style="position: relative;">

    <div class="main-photo" style="background-image: url('{{ $featuredUrl }}'); transition: all .3s;">
        
        @if($images->count() > 1)
            <button wire:click="prevImage" class="nav-button nav-left" aria-label="Imagem anterior">
                &#10094;
            </button>

            <button wire:click="nextImage" class="nav-button nav-right" aria-label="Próxima imagem">
                &#10095;
            </button>
        @endif
        
    </div>

    <div class="secondary-photos">
        @foreach ($images as $image)
            <div wire:click="setFeatured('{{ $image['url'] }}')" 
                class="secondary-image"
                style="background-image: url('{{ $image['url'] }}');
                       transition: all .3s;
                       @if ($image['url'] != $featuredUrl)
                           opacity: 50%;
                       @endif
                ">
            </div>
        @endforeach
    </div>

</div>
