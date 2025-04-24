<select wire:model.live="stateSelected" name="{{ $name }}" class="states newAd-states">
    
    <option value="" @if(!$allStates) disabled @endif @if ($selectedState == null) selected @endif> @if(!$allStates) Estado @else Todos Estados @endif</option>
    
    @foreach($states as $state)

        @if($name == 'state_id')
            <option value="{{ $state->id }}" @if($selectedState == $state->id) selected @endif>{{ $state->name." - ".$state->initials }}</option>
        @elseif($name == 's')
            <option value="{{ $state->initials }}" @if($selectedState == $state->initials) selected @endif>{{ $state->name." - ".$state->initials }}</option>
        @endif

    @endforeach
</select>