<div class="my-ad-item">
    
    @if(empty($canEdit) AND $advertise->user->id == Auth::user()->id)
        <span class="pill my-ad-pill">Meu Anúncio</span>
    @endif

    <div class="ad-image-area">
        @if(!empty($canEdit))
            <div class="ad-buttons">
                <div class="ad-button">
                <img src="/assets/icons/deleteIcon.png" />
                </div>
                <div class="ad-button">
                <img src="/assets/icons/editIcon.png" />
                </div>
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