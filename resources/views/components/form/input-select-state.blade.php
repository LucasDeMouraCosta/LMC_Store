<select name="state_id" class="states">
    <option value="" disabled selected>Estado</option>
    @foreach($states as $state)
        <option value="{{ $state->id }}">{{ $state->initials." - ".$state->name }}</option>
    @endforeach
</select>