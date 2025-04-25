<div class="contact-card showing" data-id="{{ $contact->id }}">
    @if ($isEditing)
        <div class="contact-card-editing">
            <div class="contact-description-area">
                <label class="contact-description-label" for="labelInput">Descrição do contato</label>
                <input id="labelInput" type="text" wire:model.defer="labelEdit" class="input-edit" />
                @error('labelEdit')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="number-area">
                <label class="number-label" for="numberInput">Telefone</label>
                <input id="numberInput" type="text" wire:model.defer="numberEdit" class="input-edit" />
                @error('numberEdit')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="contact-actions-editing">
                <button class="btn-contact-editing btn-save" wire:click="saveEdit">
                    Salvar
                </button>

                <button class="btn-contact-editing btn-cancel" wire:click="cancelEdit">
                    Cancelar
                </button>
            </div>
        </div>
    @else
        <div class="contact-card-left">
            <div class="contact-card-header">
                <h4 class="contact-label">{{ $contact->label }}</h4>
            </div>

            <div class="contact-card-body">
                <p class="contact-number">{{ preg_replace('/(\d{2})(\d{5})(\d{4})/', '($1) $2-$3', $contact->number) }}</p>
            </div>
        </div>

        <div class="contact-card-right">
            <div class="contact-actions">
                <a class="btn-contact btn-edit" wire:click="edit"
                    onclick="mostrarSomenteEsteContato(event, {{ $contact->id }})">
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>

                <a class="btn-contact btn-delete" wire:click="confirmDelete">
                    <i class="fa-solid fa-trash"></i>
                </a>
            </div>
        </div>
    @endif
</div>
