<select wire:model.live="categorySelected" class="categories-options" name="{{ $name }}" id="category_id">
    <option value="" @if(!$allCategories) disabled @endif @if ($selectedCategory == null) selected @endif> @if(!$allCategories) Categoria @else Todas @endif</option>
    @foreach($categories as $category)
    <option value="{{ $category->id }}" @if($selectedCategory == $category->id) selected @endif>{{ $category->name }}</option>
    @endforeach
</select>