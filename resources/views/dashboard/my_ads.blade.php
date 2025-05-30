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

  <script>
      function confirmDelete(deleteUrl, adTitle) {
          Swal.fire({
              title: 'Tem certeza?',
              html: `Deseja realmente excluir o anúncio <b>"${adTitle}"</b>? <b>Você não poderá desfazer essa ação!</b>!`,
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#dc3545',
              confirmButtonText: 'DELETAR',
              cancelButtonText: 'CANCELAR'
          }).then((result) => {
              if (result.isConfirmed) {
                  
                  fetch(deleteUrl, {
                      method: 'POST', 
                      headers: {
                          'X-CSRF-TOKEN': '{{ csrf_token() }}'
                      }
                  })
                  .then(response => response.json())
                  .then(data => {
                      if (data.success) {
                          Swal.fire(
                              'Excluído!',
                              data.message,
                              'success'
                          ).then(() => {
                              location.reload();
                          });
                      } else {
                          Swal.fire(
                              'Erro!',
                              data.message,
                              'error'
                          );
                      }
                  })
                  .catch(error => {
                      Swal.fire(
                          'Erro!',
                          'Ocorreu um erro ao tentar excluir o anúncio.',
                          'error'
                      );
                  });
              }
          });
      }
  </script>
</html>
