@extends('Portal.TemplateLaravel')
@section('content')
    <div id='busca' class="jumbotron jumbotron-fluid m-0 bg-dark">
        <div class="container text-white">
            <div class='row justify-content-md-center'>
                <div class='col-12 text-center'>
                    <img src='{{ asset('/images/favicon.png') }}' style='width: 120px'>
                    <h1>Encontre Repúblicas em todo Brasil !</h1>
                    <p>Encontre quartos para alugar em repúblicas ou cadastre a sua.</p>
                </div>
                <div class='col-md-4 col-lg-4 col-sm-12 text-center align-content-center'>
                    <div class=''>
                        <form id="logout-form" action="{{ route('portal.republicSearch') }}" method="POST">
                            @csrf
                            <div class="input-group mb-3">
                                <input class='form-control' type='text' name='search' placeholder='Preencha o nome da cidade'>
                                <div id='search' class="input-group-append">
                                    <button type='submit' class='btn btn-danger'>Buscar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id='fazerAnuncio' class="jumbotron jumbotron-fluid m-0">
        <div class="container">
            <div class='row justify-content-md-center m-1'>
                <div class='col-12 text-center -20'>
                    <h2>
                        Anúncio
                    </h2>
                    <p class='text-secondary'>
                        Anuncie gratuitamente agora. Iremos encontrar pessoas confiáveis que estejam interessadas em alugar seu quarto para morar com você.
                    </p>
                </div>
                <div class='col-md-4 col-lg-4 col-sm-12 text-center align-content-center'>
                    <div class='form-group text-center'>
                        <div class='col-sm-12'></div>
                        <a type='btn btn-danger' href='{{route('home')}}' class='btn btn-danger w-100 btn-lg px-5'>Grátis</a>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row justify-content-center mb-2">
                    @if(isset($republics))
                        @foreach($republics as $republic)
                            <div class='card m-1 border shadow' style='width: 150px; '>
                                <img class="card-img-top w-100" style='height: 120px' src="{{$republic->image}}" alt="Card image cap">
                                <div class='card-body p-1 text-center w-100'>
                                    <small>{{$republic->title}}</small>
                                    <br>
                                    <small>
                                        <strong><i class="fas fa-money-bill"></i> R$ {{money_format('%.2n', $republic->value)}}
                                        </strong>
                                    </small>
                                    <a href='#' href='#' class='btn btn-sm btn-danger w-100'>Visualisar</a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    @if(isset($advertisements))
                        @foreach($advertisements as $advertisement)
                            <div class='card m-1 border shadow' style='width: 150px; '>
                                <img class="card-img-top w-100" style='height: 120px' src="{{$advertisement->image}}" alt="Card image cap">
                                <div class='card-body p-1 text-center w-100 text-truncate'>
                                    <small>{{$advertisement->title}}</small>
                                    <br>
                                    <small>
                                        <strong><i class="fas fa-money-bill"></i> R$ {{money_format('%.2n', $advertisement->value)}}
                                        </strong>
                                    </small>
                                    <div class='w-100'></div>
                                    <a href='{{route('portal.showAdvertisement', $advertisement->id)}}' href='#' class='btn btn-sm btn-primary w-100'>Visualisar</a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div id='informacaoAleatoria' class="jumbotron jumbotron-fluid text-white bg-dark mb-0">
        <div class="container">
            <div class='row justify-content-md-center'>
                <div class='col-12 text-center'>
                    {{--<h1>Como Funciona</h1>--}}
                    {{--<hr class='bg-danger'>--}}
                    <div class="row">
                        <div class="col-md-4">
                            <i class="text-danger fas fa-search-location fa-3x mb-2"></i>
                            <h5 class='text-danger'>Encontre lugares para morar</h5>
                            <p class='text-muted'>
                                Use nossa busca para encontrar excelentes apartamentos para dividir aluguel e quartos para alugar em todas as regiões do Brasil
                            </p>
                        </div>
                        <div class="col-md-4">
                            <i class="text-danger fas fa-mobile-alt fa-3x mb-2"></i>
                            <h5 class='text-danger'>
                                Negocie diretamente com o anunciante
                            </h5>
                            <p class='text-muted'>
                                Utilize nossa plataforma para trocar mensagens e conhecer melhor a pessoa que irá dividir moradia com você.
                            </p>
                        </div>
                        <div class="col-md-4">
                            <i class="text-danger fas fa-key fa-3x mb-2"></i>
                            <h5 class='text-danger'>
                                Mude-se para um novo lar
                            </h5>
                            <p class='text-muted'>
                                Faça sua mudança com a tranquilidade de ter escolhido um bom lugar para morar, dividindo o aluguel com pessoas que combinam com você.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id='anuncioDestaque' class="jumbotron jumbotron-fluid mb-0">
        <div class="album">
            <div class="container">
                <h2 class='text-center mb-2'><strong>Anúncios em Destaque</strong></h2>
                <hr class='bg-danger'>
                <div class="row">
                    @foreach($republics as $republic)
                        <div class="col-md-4">
                            <div class="card mb-4 box-shadow shadow">
                                <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Miniatura [100% x225]" style="height: 225px; width: 100%; display: block;" src="{{$republic->image}}" data-holder-rendered="true">
                                <div class="card-body">
                                    <p class="card-text m-0">
                                    <div class="col-12 text-truncate p-0 mb-2">
                                        <h4>{{$republic->name}}</h4>
                                    </div>
                                    <div class="col-12 text-truncate p-0 mb-2">
                                        <small>
                                            <i class="fas fa-map-marker-alt text-danger"></i> {{$republic->district}}, {{$republic->city}} - {{$republic->state}}
                                        </small>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">
                                                VIsualizar
                                            </button>
                                            <button type="button" class="btn btn-sm btn-outline-success">Contato</button>
                                        </div>
                                        <small class="text-muted">
                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">9 min</font></font>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div id='footer' class="jumbotron jumbotron-fluid bg-dark mb-0">
        <div class="container">
            <div class='row justify-content-md-center'>
                <a href='#' class='text-white mx-1'><i class="fas fa-id-badge"></i> Contato</a>
                <a href='#' class='text-white mx-1'><i class="fab fa-github-alt"></i> GitHub</a>
                <a href='#' class='text-white mx-1'><i class="fab fa-instagram"></i> Instagram</a>
            </div>
        </div>
    </div>
@endsection

