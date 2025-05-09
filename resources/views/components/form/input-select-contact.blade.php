<select wire:model.live="user_contact_id" name="user_contact_id" class="contacts newAd-contacts">
    @foreach ($contacts as $contact)
        <option value="{{ $contact->id }}">{{ $contact->label." - ".$contact->formattedNumber }}</option>
    @endforeach
</select>