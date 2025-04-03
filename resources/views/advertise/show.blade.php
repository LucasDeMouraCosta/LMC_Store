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
    <link rel="stylesheet" href="/assets/adPageStyle.css" />
    <link rel="stylesheet" href="/assets/adsListStyle.css" />
    @livewireStyles()
    <title>LMC_Store</title>
  </head>

  <body>
    
    <x-base.header />

    <main>
      <div class="ad-area">
        <div class="ad-area-left">

          <livewire:gallery :images="$advertise->images"/>

        </div>

        <div class="ad-area-right">
          <div class="categories-state">{{ $advertise->state->name }} / {{ $advertise->category->name }}</div>
          <div class="ad-page-title">{{ $advertise->title }} </div>
          <div class="ad-page-date">Publicado em {{ date_format($advertise->created_at, 'd/m/Y' ) }} às {{ date_format($advertise->created_at, 'H:i' ) }}</div>
          <div class="ad-page-price">R$ {{ number_format($advertise->price, 2, ',', '.') }}</div>
            
          @if($advertise->negotiable)
            <div class="contact">
                <img src="/assets/icons/wppIcon.png" />
                <div class="contact-text">Negociável</div>
            </div>
            <div class="negociable">*Esse valor poderá ser negociado.</div>
          @endif
          
          <div class="ad-page-text">
            {{ $advertise->description }}
          </div>

          <button onclick="contactButton('{{ $advertise->contact }}', '{{ $advertise->title }}')" class="get-touch">Entrar em contato</button>

          <div class="views">
            <img src="/assets/icons/eyeGrayIcon.png" />
            <div class="views-text">{{ $advertise->views }} visualizações neste Anúncio</div>
          </div>
        </div>
      </div>
      <div class="ads">
        <div class="ads-title">Anúncios relacionados</div>
        <div class="ads-area">
          @if ($relatedAdvertises->isEmpty())
              <div class="no-ads-message">
                  <p>Não há anúncios relacionados para exibir.</p>
              </div>
          @else
              @foreach ($relatedAdvertises as $related_advertise)
                  <a href="{{ route('advertise.show', ['slug' => $related_advertise->slug]) }}" class="ad-item">
                      <x-basic-ad :advertise="$related_advertise" :canEdit="false"/>
                  </a>
              @endforeach
          @endif
        </div>
      </div>
    </main>
    
    <x-base.footer />

    @livewireScripts()
  </body>
</html>

<script>
    function contactButton(number, title) {
        let url = new URL(window.location.href);
        let message = 'Olá, vi seu anúncio '+title+' na LMC_Store e gostaria de mais informações. Segue o link do anúncio: '+url;
        
        window.open('https://wa.me/'+number+'?text='+message, '_blank');
    }
</script>
