<select name="state_id" class="states">
    <option value="" disabled @if ($selectedState == null) selected @endif>Estado</option>
    @foreach($states as $state)
        <option value="{{ $state->id }}" @if($selectedState == $state->id) selected @endif>{{ $state->initials." - ".$state->name }}</option>
    @endforeach
</select>