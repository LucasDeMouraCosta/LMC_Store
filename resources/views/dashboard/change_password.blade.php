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
    <title>LMC_Store - Alterar Senha</title>
  </head>

  <body>

    <x-base.header/>

    <main>
        <div class="my-account-page">
          
          <x-dashboard.sidebar />
          
          <div class="profile-area">
            <h3 class="profile-title">Alterar Senha</h3>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <livewire:change-password />

          </div>
        </div>
      </main>

    <x-base.footer/>

  </body>
</html>
