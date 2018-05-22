<!-- Dropdown login user Structure -->
<ul id="dropdown-login-desktop" class="dropdown-content ">
    <li>
        @guest
        @else
        <a class="blue-text text-darken-2" href="{{ route('user.perfil', Auth::user()->id)}}">Perfil</a>
        <a class="blue-text text-darken-2" href="{{ route('logout') }}"
           onclick="event.preventDefault();
       document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        @endguest

    </li>

</ul>
<!--Dropdown login user mobile Structure-->
<ul id="dropdown-login-mobile" class="dropdown-content ">
    <li>
        <a class="blue-text text-darken-2" href="{{ route('logout') }}"
           onclick="event.preventDefault();
       document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </li>

</ul>

<!-- Dropdown Turma DESKTOP  Structure -->
<ul id="dropdown-desktop-turma" class="dropdown-content ">
    <li>
        <a class="blue-text text-darken-2" href="{{ route('turma.create') }}">Cadastrar</a>
        <a class="blue-text text-darken-2" href="{{ route('turma.index') }}">Listar</a>
    </li>

</ul>
<!-- Dropdown Turma MOBILE  Structure -->
<ul id="dropdown-mobile-turma" class="dropdown-content ">
    <li>
        <a class="blue-text text-darken-2" href="{{ route('turma.create') }}">Cadastrar</a>
        <a class="blue-text text-darken-2" href="{{ route('turma.index') }}">Listar</a>
    </li>

</ul>

<!-- Dropdown Usuario DESKTOP  Structure -->
<ul id="dropdown-desktop-usuario" class="dropdown-content ">
    <li>
        <a class="blue-text text-darken-2" href="{{ route('register') }}">Cadastrar</a>
    </li>
</ul>

<!-- Dropdown Usuario MOBILE  Structure -->
<ul id="dropdown-mobile-usuario" class="dropdown-content ">
    <li>
        <a class="blue-text text-darken-2" href="#">Cadastrar</a>
    </li>
</ul>

<!--Nav bar Menu-->
<nav class="#1e88e5 blue darken-1">
    <div class="nav-wrapper container">

        <a href="{{route('home')}}" class="brand-logo yellow-text text-lighten-1"><img src="{{url('img/logo.png')}}" style="width:50px;height: 50px;"><span class="hide-on-med-and-down">School Manager</span></a>
        <!--Botão Menu mobile-->
        <a href="#" data-target="mobile-menu" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <!--Menu desktop-->
        <ul class="right hide-on-med-and-down">
            @guest
            <li><a href="{{ route('login') }}">Login</a></li>
                @else
                <li><a href="#">Link 1 </a></li>
                <li><a href="#">link 2</a></li>
            <!-- Dropdown Trigger -->                
                @if(Auth::user()->tipo != 'aluno')
                    <!--Turma-->
                    <li><a class="dropdown-trigger" href="#!" data-target="dropdown-desktop-turma">Turma<i class="material-icons right">arrow_drop_down</i></a></li>
                    <!--Usuários-->
                    <li><a class="dropdown-trigger" href="#!" data-target="dropdown-desktop-usuario">Usuario<i class="material-icons right">arrow_drop_down</i></a></li>
                @endif

                <!--Login-->
                <li><a class="dropdown-trigger" href="#!" data-target="dropdown-login-desktop">{{ Auth::user()->name }}<i class="material-icons right">arrow_drop_down</i></a></li>
            @endguest

        </ul>

    </div>

    <!-- Menu Mobile-->
    <ul class="sidenav" id="mobile-menu">
        @guest
        <li><a href="{{ route('login') }}">Login</a></li>
        <li><a href="{{ route('register') }}">Cadastre-se</a></li>
        @else
            <li><a href="sass.html">Sass</a></li>
            <li><a href="badges.html">Components</a></li>
            <!-- Dropdown Trigger -->
            <!--Turma-->
            @if(Auth::user()->tipo === 'administrador')
                <li><a class="dropdown-trigger" href="#!" data-target="dropdown-mobile-turma">Turma<i class="material-icons right">arrow_drop_down</i></a></li>
                <!--usuario-->
                <li><a class="dropdown-trigger" href="#!" data-target="dropdown-mobile-usuario">Usuario<i class="material-icons right">arrow_drop_down</i></a></li>
                @endif
            <!--Login-->
            <li><a class="dropdown-trigger" href="#!" data-target="dropdown-login-mobile">{{ Auth::user()->name }}<i class="material-icons right">arrow_drop_down</i></a></li>
            @endguest

    </ul>
</nav>

<!--java script do menu-->
<script>
    //js para ativar o menu dropDown
    $(document).ready(function(){
        //ativa o dropdown menu
        $(".dropdown-trigger").dropdown();
        //ativa o menu mobile
        $('.sidenav').sidenav();
         //ativa o dropdown menu
         $('.collapsible').collapsible();
    });

</script>


