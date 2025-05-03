<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/assets/style.css" />
    <link rel="stylesheet" href="/assets/myAccountStyle.css" />
    <link rel="stylesheet" href="/assets/myAdsStyle.css" />
    <link rel="stylesheet" href="/assets/newAdStyle.css" />

    <title>LMC_Store - Editar Anúncio</title>
  </head>

  <body>
    {{-- <header>
      <div class="header-area">
        <div class="newAd-back-button">← Voltar</div>
      </div>
    </header> --}}

    <x-base.header />

    <livewire:advertise-edit :advertise=$advertise />

    <x-base.footer />

  </body>
</html>
