<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700&family=Open+Sans:ital@0;1&family=Oswald:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="/assets/style.css" />
    <link rel="stylesheet" href="/assets/myAccountStyle.css" />
    <title>LMC_Store</title>
  </head>

  <body>

    <x-base.header/>

    <main>
        <div class="my-account-page">
          
          <x-dashboard.sidebar />
          
          <div class="profile-area">
            <h3 class="profile-title">Meu perfil</h3>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('my_account_action') }}">
              @csrf   
              <div class="name-area">
                <div class="name-label">Nome</div>
                <input
                  type="text"
                  name="name"
                  placeholder="Digite o seu nome"
                  value="{{ $user->name }}"
                />
                @error('name')
                    <div class="error">
                    {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="email-area">
                <div class="email-label">E-mail</div>
                <input
                  type="email"
                  name="email"
                  placeholder="Digite o seu e-mail"
                  value="{{ $user->email }}"
                />
                @error('email')
                    <div class="error">
                    {{ $message }}
                    </div>
                @enderror
              </div>
              {{-- <div class="password-area">
                <div class="password-label">Senha</div>
                <div class="password-input-area">
                  <input
                    type="password"
                    placeholder="Digite a sua senha"
                    value="123456789"
                  />
                  <img src="/assets/icons/eyeIcon.png" />
                </div>
              </div> --}}
              <div class="state-area">
                <div class="state-label">Estado</div>
                <x-form.input-select-state :selectedState="$user->state_id" :allStates=false name="state_id" />
                    @error('state_id')
                        <div class="error">
                        {{ $message }}
                        </div>
                    @enderror
              </div>
              <button type="submit" class="save-button">Salvar</button>
            </form>
          </div>
        </div>
      </main>

    <x-base.footer/>

  </body>
</html>
