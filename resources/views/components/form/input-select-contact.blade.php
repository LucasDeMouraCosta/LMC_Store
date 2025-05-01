<select wire:model.live="user_contact_id" name="user_contact_id" class="contacts newAd-contacts">
    @foreach ($contacts as $contact)
        <option value="{{ $contact->id }}">{{ $contact->label." - ".preg_replace('/(\d{2})(\d{5})(\d{4})/', '($1) $2-$3', $contact->number)}}</option>
    @endforeach
</select>