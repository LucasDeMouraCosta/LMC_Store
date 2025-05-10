<header>
    @livewireScripts
    @livewireStyles
    <script src="https://kit.fontawesome.com/33f54f3ac4.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    <div class="header-area">
        <a href="{{ route('home') }}" class="header-area-left">LMC_Store</a>
        <div class="header-area-right">

            <a href="{{ route('advertise.create') }}" class="announce-now">Anunciar agora →</a>  

            @if(Auth::check())
                <div class="dropdown">
                    <a class="my-account dropdown-toggle" onclick="toggleDropdown()">
                        <img src="/assets/icons/userIcon.png" />
                        {{ Auth::user()->name }} <i class="fa-solid fa-square-caret-down"></i>
                    </a>
                    <div class="dropdown-menu" id="dropdownMenu">
                        <a href="{{ route('my_account') }}"><i class="fa-solid fa-user"></i> <span>Meu Perfil</span></a>
                        <a href="{{ route('my_ads') }}"><i class="fa-solid fa-folder-open"></i> <span>Meus Anúncios</span></a>
                        <a href="{{ route('my_contacts') }}"><i class="fa-solid fa-square-phone" style="font-size: 20px"></i> <span>Meus Contatos</span></a>
                        <a href="{{ route('logout') }}"><i class="fa-solid fa-right-from-bracket"></i> <span>Sair</span></a>
                    </div>
            </div>
            @else
                <a href="{{ route('login') }}" class="my-account">
                    <img src="/assets/icons/userIcon.png" />
                    Login
                </a>
            @endif

            <img class="menu-icon" src="/assets/icons/menuIcon.png" alt="Menu" />
            
            <div class="menu-mobile">

                <a href="{{ route('my_account') }}" class="my-account-mobile">
                    <img src="/assets/icons/userIcon.png" alt="Ícone do usuário" />
                    Meu Perfil
                </a>

                <a class="my-account-mobile" href="{{ route('logout')}}">
                    <img src="/assets/icons/logoutIcon.png" />
                    Sair
                </a>

            </div>

        </div>
    </div>
</header>
<script>
    function toggleDropdown() {
        const dropdownMenu = document.getElementById('dropdownMenu');
        
        dropdownMenu.classList.toggle('show');
    }

    document.addEventListener('click', function (event) {
        const dropdownMenu = document.getElementById('dropdownMenu');
        const dropdownToggle = document.querySelector('.dropdown-toggle');
        

        if (!dropdownMenu.contains(event.target) && !dropdownToggle.contains(event.target)) {
            dropdownMenu.classList.remove('show');
        }
    });
</script>