<div class="my-ad-item">

    @if(empty($canEdit) AND Auth::check() AND $advertise->user->id == Auth::user()->id)
        <span class="pill my-ad-pill">Meu Anúncio</span>
    @endif

    <div class="ad-image-area">
        @if(!empty($canEdit))
            <div class="ad-buttons">
                <a href="{{ route('advertise.show', ['slug' => $advertise->slug])}}" title="Ver Anúncio" class="ad-button ad-show-button">
                    <i class="fa-solid fa-eye"></i>
                </a>
                <a href="{{ route('advertise.edit', ['slug' => $advertise->slug])}}" title="Editar Anúncio" class="ad-button ad-edit-button">
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>
                <a href="{{ route('advertise.delete', ['id' => $advertise->id])}}" title="Excluir Anúncio" class="ad-button ad-delete-button">
                    <i class="fa-solid fa-trash"></i>
                </a>
            </div>
        @endif
    <div
        class="ad-image"
        style="background-image: url('{{ $advertise->featured_image->url ?? '/assets/icons/imageIcon.png' }}')"
    ></div>
    </div>
    <div class="ad-title">{{ $advertise->title }}</div>
    <div class="ad-price">R$ {{ number_format($advertise->price, 2, ',', '.') }}</div>

</div>