<div>
    @if ($editingContactId)
        <livewire:contact-card :contact="$contacts->first()" :wire:key="'contact-'.$editingContactId" />
    @else
        @foreach ($contacts as $contact)
            <livewire:contact-card :contact="$contact" :wire:key="'contact-'.$contact->id" />
        @endforeach
    @endif

    <script>
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
        

        function mostrarSomenteEsteContato(event, id) {
            event.stopPropagation();
            const todosCards = document.querySelectorAll('.contact-card');

            todosCards.forEach(card => {
                if (card.dataset.id != id) {
                    card.classList.remove('showing'); // tira a classe de entrada
                    setTimeout(() => card.classList.add('hidden'), 10); // anima para desaparecer
                }
            });
        }

        function mostrarTodosOsContatos() {
            const todosCards = document.querySelectorAll('.contact-card');

            todosCards.forEach(card => {
                card.classList.remove('hidden'); // tira a classe de saída
                setTimeout(() => card.classList.add('showing'), 10); // anima para aparecer
            });
        }
    </script>
</div>
