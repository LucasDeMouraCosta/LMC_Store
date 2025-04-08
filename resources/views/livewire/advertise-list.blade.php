<div>
    <div class="hero-area">
        <div class="search-area-adsList">
            <input wire:model.live.debounce.1000="textSearch" class="search-text" type="text" placeholder="Estou procurando por..." />
            <div class="options-area">
                <div class="categories-area">
                    <p>Categoria</p>
                    <x-form.input-select-category :allCategories=true name="c" />
                </div>
                <div class="states-area">
                    <p>Estados</p>
                    <x-form.input-select-state :allStates=true name="s" />
                </div>
                {{-- <button class="search-mobile-button">Procurar</button> --}}
            </div>
        </div>
    </div>
    <div class="ads">
        <div class="ads-title">Anúncios recentes</div>
        <div class="ads-area">

            @if ($filteredAdvertises->isEmpty())
                <div class="no-ads-message">
                    <p>Nenhum resultado encontrado.</p>
                </div>
            @else
                @foreach ($filteredAdvertises as $filtered_advertise)
                    <a href="{{ route('advertise.show', ['slug' => $filtered_advertise->slug]) }}" class="ad-item">
                        <x-basic-ad :advertise="$filtered_advertise" :canEdit="false" />
                    </a>
                @endforeach
            @endif

        </div>
    </div>
    <div class="mt-10">
        <div class="pagination-info text-gray-600 text-sm mb-4">
            Mostrando {{ $filteredAdvertises->firstItem() }} até {{ $filteredAdvertises->lastItem() }} de {{ $filteredAdvertises->total() }} resultados
        </div>
        {{ $filteredAdvertises->links('vendor.pagination.custom-tailwind') }}
    </div>
    
</div>
