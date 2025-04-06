<div>
    <form action="{{ route('advertise.search') }}" method="GET" class="search-form">
        <section class="hero-area">
            <h3 class="subtitle">Aqui você encontra o que tanto procura!</h3>
            <h1 class="title">O que você está procurando?</h1>

            <div class="search-area">

                <input class="search-text" name="t" type="text" placeholder="Estou procurando por..." />

                <x-form.input-select-category :allCategories="true" name="c" />

                <x-form.input-select-state :allStates="true" name="s" />

                <button type="submit" class="search-button">Procurar</button>

            </div>

        </section>
    </form>
</div>
