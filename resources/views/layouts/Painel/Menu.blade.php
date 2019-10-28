<style>
    /* width */
    ::-webkit-scrollbar {
        width: 5px;
    }
    /* Track */
    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }
    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: #c1c1c1;
    }
    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #555;
    }
    .bg-nav {
        background: #414958 !important;
    }
    .bg-bdcolor {
        background-color: #e9ebee;
    }
    body {
        background-color: #d1d5dca1;
        /*background-image: url("/images/FotoJet3.png");*/
        background-position: top;
        background-repeat: no-repeat;
    }
</style>
<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-dark bg-dark" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand p-0" href="{{ route('home') }}">
            <img src="{{ asset('/images/favicon.png') }}" alt='PerfectPay'> República Fácil
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-bell"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <i class='fa fa-user'></i>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Bem vindo(a)!</h6>
                    </div>
                    <a href="./examples/profile.html" class="dropdown-item">
                        <i class="fa fa-user-cog"></i>
                        <span>Meu perfil</span>
                    </a>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-lock"></i> Logout
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="navbar-collapse collapse" id="sidenav-collapse-main" style="">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-10">
                        <img src="/images/favicon.png" style='width: 30px' alt='República Fácil'>
                        <strong>República Fácil</strong>
                    </div>
                    <div class="col-2 collapse-close">
                        <button type="button" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
        {{--<form class="mt-4 mb-3 d-md-none">--}}
        {{--<div class="input-group input-group-rounded input-group-merge">--}}
        {{--<input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">--}}
        {{--<div class="input-group-prepend">--}}
        {{--<div class="input-group-text">--}}
        {{--<span class="fa fa-search"></span>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</form>--}}
        <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-title"></li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="nav-icon fa fa-th-large text-gray"></i> Painel
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('painel.republic.index') }}">
                        <i class="nav-icon fas fa-home text-gray"></i> República
                    </a>
                </li>
                @if(auth()->user()->republic_id != null)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('painel.spent.index') }}">
                            <i class="fas fa-file-invoice-dollar text-gray"></i> Gastos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('painel.assignment.index') }}">
                            <i class="fas fa-book text-gray"></i> Tarefas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('painel.member.index') }}">
                            <i class="fas fa-users  text-gray"></i> Membros
                        </a>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('painel.advertisement.index') }}">
                        <i class="fas fa-cart-plus text-gray"></i> Anúncios
                    </a>
                </li>
                @if(auth()->user()->email == 'hrs.eugenio@gmail.com')
                    <li class="nav-item">
                        <hr>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user-shield"></i> Administração
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('administrative.republics.index')}}">Repúblicas</a>
                            <a class="dropdown-item" href="{{route('administrative.advertisements.index')}}">Anúncios</a>
                            {{--                            <a class="dropdown-item" href="{{route('painel.advertisement.index')}}">Comércio</a>--}}
                        </div>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
{{--<div class="sidebar">--}}
{{--<nav class="sidebar-nav">--}}
{{--</nav>--}}
{{--<button class="sidebar-minimizer brand-minimizer" type="button"></button>--}}
{{--</div>--}}
