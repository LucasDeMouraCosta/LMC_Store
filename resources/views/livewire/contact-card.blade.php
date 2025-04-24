<div class="contact-card showing" data-id="{{ $contact->id }}">
    <div class="contact-card-left">
        @if ($isEditing)
            <div class="contact-card-header">
                <label for="labelInput">Descrição do contato</label><br>
                <input id="labelInput" type="text" wire:model.defer="labelEdit" class="input-edit" />
            </div>

            <div class="contact-card-body">
                <label for="numberInput">Telefone</label><br>
                <input id="numberInput" type="text" wire:model.defer="numberEdit" class="input-edit" />
            </div>
        @else
            <div class="contact-card-header">
                <h4 class="contact-label">{{ $contact->label }}</h4>
            </div>

            <div class="contact-card-body">
                <p class="contact-number">{{ $contact->number }}</p>
            </div>
        @endif

    </div>

    <div class="contact-card-right">
        <div class="contact-actions">
            @if ($isEditing)
                <a class="btn-contact btn-save" wire:click="saveEdit" onclick="mostrarTodosOsContatos()">
                    <i class="fa-solid fa-check"></i>
                </a>

                <a class="btn-contact btn-cancel" wire:click="cancelEdit" onclick="mostrarTodosOsContatos()">
                    <i class="fa-solid fa-xmark"></i>
                </a>
            @else
                <a class="btn-contact btn-edit" wire:click="edit" onclick="mostrarSomenteEsteContato(event, {{ $contact->id }})">
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>

                <a class="btn-contact btn-delete" wire:click="confirmDelete">
                    <i class="fa-solid fa-trash"></i>
                </a>
            @endif
        </div>
    </div>
</div>