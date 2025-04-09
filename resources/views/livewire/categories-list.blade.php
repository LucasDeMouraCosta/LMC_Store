<div class="categories-area">
    <div class="title">Categorias</div>
    <div class="buttons">
        @foreach ($categories as $category)
            <button class="{{ $loop->first ? 'category-selected' : 'category' }}">
                <img src="{{ asset($category->icon) }}" alt="Ícone {{ $category->name }}" />
                {{ $category->name }}
            </button>
        @endforeach
    </div>
</div>