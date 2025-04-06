<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/style.css" />
    <link rel="stylesheet" href="assets/loginSignUpStyle.css" />

    <title>LMC_Store - Selecione o seu estado</title>
  </head>

  <body>

    <div class="login-page">
      <div class="login-area">

        <h3 class="login-title">LMC_Store</h3>

        <div class="text-login">
          Selecione o seu estado
        </div>

        <form method="POST" action="{{ route('state_action') }}">
          @csrf

          <div class="state-area">

            <div class="state-label">Selecione o seu Estado</div>
            
            <x-form.input-select-state :allStates=false name="state_id" />

          </div>

          <button class="login-button">Selecionar</button>

        </form>

      </div>

    </div>

    <x-base.footer />

  </body>
</html>
