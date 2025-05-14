<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/assets/style.css" />
    <link rel="stylesheet" href="/assets/loginSignUpStyle.css" />

    <title>LMC_Store - Redefinir Senha</title>
</head>

<body>
    <div class="login-page">

        <div class="login-area">

            <h3 class="login-title">LMC_Store</h3>

            <div class="text-login" style="display: block;">
                Redefina sua senha.
            </div>

            <form action="{{ route('password.update') }}" method="POST" style="margin-top: 10px">
                @csrf

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                @error('token')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

                <input type="hidden" name="token" value="{{ $token }}">

                <input type="hidden" name="email" value="{{ $email ?? session('email', old('email')) }}">

                <div class="password-area">
                    <div class="password-label">Nova Senha</div>
                    <x-form.password-input name="password" placeholder="Digite a sua senha" id="password" />

                    @error('password')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="password-area">
                    <div class="password-label">Confirme a nova Senha</div>
                    <x-form.password-input name="password_confirmation" placeholder="Confirme a sua senha" id="password_confirmation" />
                
                    @error('password_confirmation')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <button class="login-button">Redefinir Senha</button>
            </form>
        </div>
    </div>

    <x-base.footer />

</body>
</html>