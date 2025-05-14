<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/style.css" />
    <link rel="stylesheet" href="assets/loginSignUpStyle.css" />

    <title>LMC_Store - Esqueci minha senha</title>
</head>

<body>
    <div class="login-page">

        <div class="login-area">

            <h3 class="login-title">LMC_Store</h3>

            <div class="text-login" style="display: block;">
                Preencha os campos abaixo para recuperar sua senha.
            </div>

            <form action="{{ route('forgot_password_action') }}" method="POST" style="margin-top: 10px">
                @csrf

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="email-area">
                    <div class="email-label">E-mail</div>
                    <input type="email" name="email" placeholder="Digite o seu e-mail" value="{{ session('email', old('email')) }}" required />
                    @error('email')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button class="login-button">Recuperar Senha</button>
            </form>

            <div class="register-area">
                Não esqueceu sua senha? <a href="{{ route('login') }}">Login</a>
            </div>
            
            <div class="register-area">
                Ainda não tem cadastro? <a href="{{ route('register') }}">Cadastre-se</a>
            </div>

        </div>
        
        <div class="terms">
            Ao continuar, você concorda com os <a href="">Termos de Uso</a> e a
            <a href="">Política de Privacidade</a>, e também, em receber
            comunicações via e-mail e push de todos os nossos parceiros.
        </div>

    </div>

    <x-base.footer />

</body>

</html>
