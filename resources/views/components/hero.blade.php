<div>
    <section class="hero-area">
        <h3 class="subtitle">Aqui você encontra o que tanto procura!</h3>
        <h1 class="title">O que você está procurando?</h1>
        <div class="search-area">
          <input
            class="search-text"
            type="text"
            placeholder="Estou procurando por..."
          />

          <x-form.input-select-category :allCategories=true />

          <x-form.input-select-state :allStates=true />

          <button class="search-button">Procurar</button>
        </div>
      </section>
</div>