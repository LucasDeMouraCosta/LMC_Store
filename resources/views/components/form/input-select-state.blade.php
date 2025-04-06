<select wire:model.live="stateSelected" name="{{ $name }}" class="states">
    <option value="" @if(!$allStates) disabled @endif @if ($selectedState == null) selected @endif> @if(!$allStates) Estado @else Todos @endif</option>
    @foreach($states as $state)
        <option value="{{ $state->id }}" @if($selectedState == $state->id) selected @endif>{{ $state->initials." - ".$state->name }}</option>
    @endforeach
</select>