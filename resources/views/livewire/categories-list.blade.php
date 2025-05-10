<div class="categories-area">
    <div class="title">Categorias</div>
    <div class="buttons">
        @foreach ($categories as $category)
            <a class="category" href="{{ route('advertise.search', ['c' => $category->slug]) }}">
                <i class="{{ $category->icon }}"></i>
                <p>{{ $category->name }}</p>
            </a>
        @endforeach
    </div>
</div>