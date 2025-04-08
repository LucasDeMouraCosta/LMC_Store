<select wire:model.live="categorySelected" class="categories-options" name="{{ $name }}" id="category_id">
    
    <option value="" @if(!$allCategories) disabled @endif @if ($selectedCategory == null) selected @endif> @if(!$allCategories) Categoria @else Todas Categorias @endif</option>
    
    @foreach($categories as $category)

        @if($name == 'category_id')
            <option value="{{ $category->id }}" @if($selectedCategory == $category->id) selected @endif>{{ $category->name }}</option>
        @elseif($name== 'c')
            <option value="{{ $category->slug }}" @if($selectedCategory == $category->slug) selected @endif>{{ $category->name }}</option> 
        @endif

    @endforeach

</select>