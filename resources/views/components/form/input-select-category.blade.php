<select wire:model.live="categorySelected" class="categories-options newAd-categories" name="{{ $name }}" id="category_id" {{ ($required) ? 'required' : '' }}>
    
    <option value="" @if ($selectedCategory == null) selected @endif> @if(!$allCategories) Categoria @else Todas Categorias @endif</option>
    
    @foreach($categories as $category)

        @if($name == 'category_id')
            <option value="{{ $category->id }}" @if($selectedCategory == $category->id) selected @endif>{{ $category->name }}</option>
        @elseif($name== 'c')
            <option value="{{ $category->slug }}" @if($selectedCategory == $category->slug) selected @endif>{{ $category->name }}</option> 
        @endif

    @endforeach

</select>