<div class="sidebar">
    <div class="sidebar-top">

        <a href="{{ route('my_account') }}" class="{{ request()->routeIs('my_account') ? 'sidebar-item-active' : 'sidebar-item' }}">
            <i class="fa-solid fa-gear"></i> 
            Meu Perfil
        </a>

        <a href="{{ route('my_ads') }}" class="{{ request()->routeIs('my_ads') ? 'sidebar-item-active' : 'sidebar-item' }}">
            <i class="fa-solid fa-folder-open"></i>
            Meus Anúncios
        </a>

        <a href="{{ route('my_contacts') }}" class="{{ request()->routeIs('my_contacts') ? 'sidebar-item-active' : 'sidebar-item' }}">
            <i class="fa-solid fa-square-phone" style="font-size: 26px"></i>
            Meus Contatos
        </a>
    </div>
    {{-- <div class="sidebar-bottom">
        <a href="{{ route('logout') }}"><img src="/assets/icons/logoutIcon.png" /> Sair</a>
    </div> --}}
</div>
