<div class="password-input-area">
    <input class="@error($name) is-invalid @enderror" type="password" name="{{ $name }}" placeholder="{{ $placeholder }}" id="{{ $id }}" tabindex="{{ isset($tabindex)? $tabindex : '' }}" required/>
    <img src="/assets/icons/eyeIcon.png" alt="Ícone mostrar/ocultar senha" onclick="tooglePasswordVisibility('{{ $id }}')"/>
</div>

<script>

    if(typeof tooglePasswordVisibility !== 'function') {
        function tooglePasswordVisibility(inputId) {
            const input = document.getElementById(inputId);
            const img = input.nextElementSibling;

            if (input.type === 'password') {
                input.type = 'text';
            } else {
                input.type = 'password';
            }
        }
    }

</script>