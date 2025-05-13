<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/style.css" />
    <link rel="stylesheet" href="assets/loginSignUpStyle.css" />

    <title>LMC_Store - Cadastre-se</title>
  </head>

  <body>

    <a href="index.html" class="back-button">← Voltar</a>

    <div class="login-page">
      <div class="login-area">

        <a href="{{ route('home') }}" class="login-logo">
          <h3 class="login-title">LMC_Store</h3>
        </a>

        <div class="text-login">
          Preencha os campos abaixo e realize seu cadastro.
        </div>

        <form method="POST" action="{{ route('register_action') }}">
          @csrf

          <div class="name-area">

            <div class="name-label">Nome</div>
            <input class="@error('name') is-invalid @enderror" type="text" name="name" placeholder="Digite o seu nome"  value="{{ @old('name') }}" />

            @error('name')
              <div class="error">
                {{ $message }}
              </div>
            @enderror

          </div>

          <div class="email-area">

            <div class="email-label">E-mail</div>
            <input class="@error('email') is-invalid @enderror" type="email" name="email" placeholder="Digite o seu e-mail" value="{{ @old('email') }}" />
            
            @error('email')
              <div class="error">
                {{ $message }}
              </div>
            @enderror
          
          </div>

          <div class="password-area">

            <div class="password-label">Senha</div>
            <x-form.password-input name="password" placeholder="Digite a sua senha" id="password" />

            @error('password')
              <div class="error">
                {{ $message }}
              </div>
            @enderror

          </div>

          <div class="password-area">

            <div class="password-label">Confirme sua Senha</div>
            <x-form.password-input name="password_confirmation" placeholder="Confirme a sua senha" id="password_confirmation" />

          </div>

          <button class="login-button">Cadastrar</button>

        </form>

        <div class="register-area">
          Já tem cadastro? <a href="{{ route('login') }}">Fazer Login</a>
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
