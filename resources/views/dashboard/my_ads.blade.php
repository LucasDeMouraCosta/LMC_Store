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
    <link rel="stylesheet" href="/assets/myAdsStyle.css" />

    <title>LMC_Store - Meus anúncios</title>
  </head>

  <body>

    <x-base.header />
    
    <main>
      <div class="my-ads-page">
        
        <x-dashboard.sidebar />

        <div class="myAds-area">
          <h3 class="myAds-title">Meus Anúncios</h3>
          <div class="myAds-ads-area">

            @if ($advertises->isEmpty())
                <div class="no-ads-message">
                    <p>Você ainda não tem anúncios cadastrados.</p>
                </div>
            @else
                @foreach ($advertises as $advertise)
                    <x-basic-ad :advertise="$advertise" :canEdit="true"/>
                @endforeach
            @endif
    
          </div>
        </div>
      </div>
    </main>

    <x-base.footer />

  </body>
</html>
