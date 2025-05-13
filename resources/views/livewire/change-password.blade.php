<form id="form_password" method="POST" wire:submit.prevent="changePassword" class="password-form">
    @csrf
    <div class="password-area">

        <div class="password-label" style="margin-top: 0;">Senha Atual</div>
        <x-form.password-input placeholder="Digite a sua Senha Atual" name="current_password" id="current_password" />

        @error('current_password')
            <div class="error">
                {{ $message }}
            </div>
        @enderror

    </div>

    <br><br>

    <div class="password-area">

        <div class="password-label">Nova Senha</div>
        <x-form.password-input placeholder="Digite a Nova Senha" name="new_password" id="new_password" />

        @error('new_password')
            <div class="error">
                {{ $message }}
            </div>
        @enderror

    </div>

    <div class="password-area">

        <div class="password-label">Confirme a Nova Senha</div>
        <x-form.password-input placeholder="Confirme a Nova Senha" name="new_password_confirmation" id="new_password_confirmation" />

        @error('new_password_confirmation')
            <div class="error">
                {{ $message }}
            </div>
        @enderror

    </div>

    <button type="submit" class="save-button">Salvar</button>
</form>

<script>
    Livewire.on('passwordChanged', () => {
        Swal.fire({
            icon: 'success',
            title: 'Sucesso!',
            text: 'Senha alterada com sucesso!',
            confirmButtonText: 'OK'
        });
    });
</script>
