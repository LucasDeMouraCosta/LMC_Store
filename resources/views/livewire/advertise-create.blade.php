<main>
    <div class="newAd-page">
        <div class="newAd-title">Novo anúncio</div>
        <div class="newAd-areas">
            <div class="newAd-area-left">
                <div class="area-left-up">
                    <div class="area-left-up-title">Fotos ({{ count($photos) . '/10' }})</div>

                    @if (count($photos) > 0)
                        <div class="area-left-up-img" style="position: relative;">

                            <button wire:click="prevPhoto" class="nav-button nav-left" aria-label="Imagem anterior">
                                &#10094;
                            </button>

                            <img src="{{ $photos[$featuredPhotoIndex]->temporaryUrl() }}" />

                            <button wire:click="nextPhoto" class="nav-button nav-right" aria-label="Próxima imagem">
                                &#10095;
                            </button>

                        </div>
                    @else
                        <div onclick="openFileDialog()" class="area-left-up-img area-left-up-img-add"
                            style="position: relative;">
                            <img src="/assets/icons/imageIcon.png" />
                            <div class="area-left-up-img-text">
                                <span>Clique aqui para enviar uma foto</span>
                            </div>
                        </div>
                    @endif

                    @error('photos')
                        <div class="error">{{ $message }}</div>
                    @enderror

                    @error('photos.*')
                        <div class="error">{{ $message }}</div>
                    @enderror

                </div>
                <div class="area-left-bottom">

                    @foreach ($photos as $index => $photo)
                        <div class="smallpics {{ $index === $featuredPhotoIndex ? 'active' : '' }}"
                            wire:click="$set('featuredPhotoIndex', {{ $index }})" style="cursor:pointer;">
                            <img src="{{ $photo->temporaryUrl() }}" />
                            <button class="remove-btn" wire:click.stop="deletePhoto({{ $index }})"
                                alt="Remover Foto" title="Remover Foto">
                                <i class="fa-regular fa-circle-xmark fa-2xl"></i>
                            </button>

                            <div style="position: absolute; bottom: -15px; display: flex; gap: 5px;">
                                @if ($index > 0)
                                    <button class="movePhoto" wire:click.stop="movePhotoLeft({{ $index }})"><i
                                            class="fa-solid fa-circle-arrow-left fa-2xl"></i></button>
                                @endif
                                @if ($index < count($photos) - 1)
                                    <button class="movePhoto" wire:click.stop="movePhotoRight({{ $index }})"><i
                                            class="fa-solid fa-circle-arrow-right fa-2xl"></i></button>
                                @endif
                            </div>
                        </div>
                    @endforeach

                    @if (count($photos) < 10 and count($photos) > 0)
                        <div class="smallpics-add" onclick="openFileDialog()">
                            <img src="/assets/icons/plus-50.png" />
                            <div style="margin-top: 4px; font-size: 14px;">Adicionar Mais</div>
                        </div>
                    @endif

                </div>
            </div>
            <div class="newAd-area-right">
                <form class="newAd-form" wire:submit="save" enctype="multipart/form-data">

                    <input wire:model="photos" id="file-upload" type="file" multiple accept="image/jpeg, image/png"
                        hidden onchange="validatePhotos(this.files)" />


                    <div class="title-area">
                        @error('title')
                            <div class="error">{{ $message }}</div>
                        @enderror
                        <div class="title-label">Título do anúncio</div>
                        <input wire:model="title" type="text" placeholder="Digite o título do anúncio" required />

                    </div>
                    <div class="value-area">

                        <div class="value-label">

                            @error('price')
                                <div class="error">{{ $message }}</div>
                            @enderror
                            <div class="value-area-text">Valor (R$)</div>
                            <input wire:model="price" id="price-input" type="text" placeholder="Digite o valor" required />

                        </div>

                        <div class="negotiable-area">

                            <div class="negotiable-label">Negociável?</div>
                            <select wire:model="negotiable">
                                <option value="0">Não</option>
                                <option value="1">Sim</option>
                            </select>

                        </div>

                    </div>

                    <div class="newAd-states-area">
                        @error('state_id')
                            <div class="error">
                            {{ $message }}
                            </div>
                        @enderror
                        <div class="newAd-states-label">Estado</div>
                        <x-form.input-select-state :selectedState="Auth::user()->state_id" :allStates=false name="state_id" />
                    </div>

                    <div class="newAd-contact-area">
                        @error('user_contact_id')
                            <div class="error">
                            {{ $message }}
                            </div>
                        @enderror
                        <div class="newAd-contacts-label">Contato</div>
                        <x-form.input-select-contact />
                    </div>

                    <div class="newAd-categories-area">
                        @error('selectedCategory')
                            <div class="error">{{ $message }}</div>
                        @enderror
                        <div class="newAd-categories-label">Categoria</div>
                        <x-form.input-select-category :allCategories="false" required="true" name="category_id" />

                    </div>
                    <div class="description-area">
                        @error('description')
                            <div class="error">{{ $message }}</div>
                        @enderror
                        <div class="description-label">Descrição</div>
                        <textarea wire:model="description" class="description-text" placeholder="Digite a descrição do anúncio"></textarea>

                    </div>
                    <button class="newAd-button">Criar anúncio</button>
                </form>
            </div>
        </div>
    </div>

    <script>

        document.addEventListener('DOMContentLoaded', function () {
            const priceInput = document.getElementById('price-input');

            // Aplica a máscara no campo de preço
            $('#price-input').mask('#.##0,00', {
                reverse: true
            });

            // Remove a formatação antes de enviar o valor ao Livewire
            priceInput.addEventListener('input', function () {
                const rawValue = priceInput.value.replace(/[.,]/g, ''); // Remove '.' e ','
                priceInput.dispatchEvent(new CustomEvent('input', { bubbles: true })); // Atualiza o Livewire
            });
        });

        function openFileDialog() {
            document.getElementById('file-upload').click();
        }

        function validatePhotos(files) {
            const MAX_FILES = 10;
            const MAX_SIZE_MB = 2;
            const fileUpload = document.getElementById('file-upload');
            const totalExisting = document.querySelectorAll('.smallpics').length;

            const validFiles = [];
            const ignoredFiles = [];

            for (let file of files) {
                if (file.size > MAX_SIZE_MB * 1024 * 1024) {
                    ignoredFiles.push(`${file.name} (acima de 2MB)`);
                } else {
                    validFiles.push(file);
                }
            }

            const remainingSlots = MAX_FILES - totalExisting;

            if (remainingSlots <= 0) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Limite atingido',
                    text: `Você já atingiu o limite de ${MAX_FILES} fotos. Remova alguma para enviar mais.`,
                });
                fileUpload.value = '';
                return;
            }

            const filesToUpload = validFiles.slice(0, remainingSlots);

            if (validFiles.length > remainingSlots) {
                const extra = validFiles.slice(remainingSlots).map(f => `${f.name} (excedeu o limite de ${MAX_FILES})`);
                ignoredFiles.push(...extra);
            }

            if (ignoredFiles.length > 0) {
                Swal.fire({
                    icon: 'info',
                    title: 'Algumas fotos foram ignoradas',
                    html: `<ul style="text-align: left;">${ignoredFiles.map(f => `<li>${f}</li>`).join('')}</ul>`,
                });
            }

            if (filesToUpload.length > 0) {
                const dataTransfer = new DataTransfer();
                filesToUpload.forEach(file => dataTransfer.items.add(file));
                fileUpload.files = dataTransfer.files;
            } else {
                fileUpload.value = '';
            }
        }


        window.addEventListener('advertise-create', event => {
            Swal.fire({
                icon: 'success',
                title: 'Sucesso!',
                text: event.detail[0].message,
                confirmButtonText: 'OK'
            }).then(() => {
                window.location.href = event.detail[0].redirect;
            });
        });

        window.addEventListener('advertise-create-error', event => {
            Swal.fire({
                icon: 'error',
                title: 'Atenção!',
                text: event.detail[0].message,
                confirmButtonText: 'OK'
            }).then(() => {
                window.location.href = event.detail[0].redirect;
            });
        });

    </script>

</main>
