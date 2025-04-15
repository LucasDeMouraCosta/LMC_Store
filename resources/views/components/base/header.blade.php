<header>
    
    <script src="https://kit.fontawesome.com/33f54f3ac4.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>


    <div class="header-area">
        <a href="{{ route('home') }}" class="header-area-left">LMC_Store</a>
        <div class="header-area-right">

        @if(Auth::check())
            <a href="{{ route('my_account') }}" class="my-account">
                <img src="/assets/icons/userIcon.png" />
                {{ Auth::user()->name }}
            </a>
        @else
            <a href="{{ route('login') }}" class="my-account">
                <img src="/assets/icons/userIcon.png" />
                Login
            </a>
        @endif

        <a href="{{ route('advertise.create') }}" class="announce-now">Anunciar agora →</a>
        <img class="menu-icon" src="assets/icons/menuIcon.png" alt="Menu" />
        <div class="menu-mobile">
            <a href="myAccount.html" class="my-account-mobile">
            <img src="/assets/icons/userIcon.png" alt="Ícone do usuário" />
            Minha Conta
            </a>
            <a class="my-account-mobile" href="/index.html"
            ><img src="/assets/icons/logoutIcon.png" /> Sair</a
            >
        </div>
        </div>
    </div>
</header>