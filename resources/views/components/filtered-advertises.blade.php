<div class="ads">
    <div class="ads-title">Anúncios recentes</div>
    <div class="ads-area">

        @if ($advertises->isEmpty())
            <div class="no-ads-message">
                <p>Não há anúncios recentes para exibir.</p>
            </div>
        @else
            @foreach ($advertises as $advertise)
                <a href="{{ route('advertise.show', ['slug' => $advertise->slug]) }}" class="ad-item">
                    <x-basic-ad :advertise="$advertise" :canEdit="false"/>
                </a>
            @endforeach
        @endif
    
    </div>
</div>