<div>
    @if ($isCreating)
        <div class="contact-card showing">
            <div class="contact-card-editing">
                <div class="contact-description-area">
                    <label class="contact-description-label" for="newLabelInput">Descrição do contato</label>
                    <input id="newLabelInput" type="text" wire:model.defer="newLabel" class="input-edit" placeholder="Digite uma descrição para o novo contato" />
                    @error('newLabel')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="number-area">
                    <label class="number-label" for="newNumberInput">Telefone</label>
                    <input id="numberInput" type="text" wire:model.defer="newNumber" class="input-edit" placeholder="Número de telefone" />
                    @error('newNumber')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="contact-actions-editing">
                    <button class="btn-contact-editing btn-save" wire:click="saveNewContact">
                        Salvar
                    </button>

                    <button class="btn-contact-editing btn-cancel" wire:click="cancelCreating">
                        Cancelar
                    </button>
                </div>
            </div>
        </div>
    @elseif ($editingContactId)
        <livewire:contact-card :contact="$contacts->first()" :wire:key="'contact-'.$editingContactId" />
    @else
        <div class="create-contact-button">
            <button class="btn-create-contact" wire:click="startCreating">
                <i class="fa-solid fa-circle-plus"></i>Criar Novo Contato
            </button>
        </div>
        @foreach ($contacts as $contact)
            <livewire:contact-card :contact="$contact" :wire:key="'contact-'.$contact->id" />
        @endforeach
    @endif

    <script>

        Livewire.on('editingContact', function () {
            setTimeout(() => {

                $('#numberInput').mask('(00) 00000-0000');

            }, 100);
        });

        Livewire.on('apply-mask', function () {
            setTimeout(() => {
                $('#numberInput').unmask();
                $('#numberInput').mask('(00) 00000-0000');
            }, 1);
        });

        Livewire.on('confirmingDelete', data => {
            Swal.fire({
                title: 'Tem certeza?',
                html: `Deseja realmente excluir o contato <b>"${data[0].label}"</b>? Você não poderá desfazer isso e <b>todos os seus anúncios que usam esse contato ficarão sem um contato relacionado</b>!`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                confirmButtonText: 'DELETAR',
                cancelButtonText: 'CANCELAR'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.find(data[0].componentId).call('deleteContact');
                }
            });
        });


        function showingOnlyThisContact(event, id) {
            event.stopPropagation();
            const newContactButton = document.querySelector('.create-contact-button');
            if (newContactButton) {
                newContactButton.style.display = 'none'; // esconde o botão de criar novo contato
            }
            const todosCards = document.querySelectorAll('.contact-card');

            todosCards.forEach(card => {
                if (card.dataset.id != id) {
                    card.classList.remove('showing'); // tira a classe de entrada
                    setTimeout(() => card.classList.add('hidden'), 10); // anima para desaparecer
                }
            });
        }

    </script>
</div>
