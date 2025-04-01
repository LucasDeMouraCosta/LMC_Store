<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/assets/style.css" />
    <link rel="stylesheet" href="/assets/myAccountStyle.css" />
    <link rel="stylesheet" href="/assets/myAdsStyle.css" />

    <title>B7Store - Meus anúncios</title>
  </head>

  <body>

    <x-base.header />
    
    <main>
      <div class="my-ads-page">
        <div class="sidebar">
          <div class="sidebar-top">
            <a href="{{ route('my_account') }}" class="config-myAds"
              ><img src="/assets/icons/configIconGray.png" /> Configurações</a
            >
            <a href="{{ route('my_ads')}}" class="myAds-button"
              ><img src="/assets/icons/layersIcon.png" /> Meus Anúncios</a
            >
          </div>
          <div class="sidebar-bottom">
            <a href="{{ route('logout') }}"
              ><img src="/assets/icons/logoutIcon.png" /> Sair</a
            >
          </div>
        </div>
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
