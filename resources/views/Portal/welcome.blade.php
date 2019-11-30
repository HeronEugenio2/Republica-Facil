@extends('Portal.TemplateLaravel')
<style>
    .bg-danger2 {
        background-image: linear-gradient(0deg, #a90516, transparent);
    }

    .bg-danger3 {
        background-image: linear-gradient(0deg, #a90516, transparent);
    }

    .bg-anuncio {
        background-image: linear-gradient(0deg, #dddddde8, #f8f9faf0)
        /*url(https://image.freepik.com/vetores-gratis/pessoas-a-fazer-compras-com-cartao-de-credito_53876-43130.jpg);*/
    }

    .parallax {
        /* The image used */
        /*background-image: url("images/casa.jpg");*/
        /*background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.49), #000000), url("images/chave_casa.jpg");*/
        background-image: linear-gradient(0deg, rgba(255, 255, 255, 0.22), rgba(0, 0, 0, 0.96)), url("/images/GetImage.jpeg");
        /* Set a specific height */
        /*max-height: 320px;*/
        height: 100%;
        /* Create the parallax scrolling effect */
        background-attachment: fixed;
        background-position: center;
        /*background-repeat: no-repeat;*/
        background-size: cover;
    }

    .anunciobg {
        background-image: linear-gradient(0deg, rgba(174, 174, 174, 0.28), rgba(160, 160, 160, 0.22)), url("/images/avaliacao_casa.jpg");
        /* Set a specific height */
        min-height: 280px;
        /* Create the parallax scrolling effect */
        background-attachment: fixed;
        background-position: center;
        /*background-repeat: no-repeat;*/
        background-size: cover;
    }

    .outer {
        align-items: center;
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;
    }

    .inner {
        width: 200px; /* Ou a que você quiser. */
    }

    /*a90516cc a90516*
    style='background-image: linear-gradient(0deg, #a90516db, #000000), url("images/casa.jpg");'
    /
     */
</style>
@section('content')
    <div id="parallax" class="parallax justify-content-center align-middle outer">
        <div id='busca' class="p-4">
            <div class="container text-white inner">
                <div class='row justify-content-md-center'>
                    <div class='col-12 text-center'>
                        <img src='{{ asset('/images/favicon.png') }}' style='width: 115px'>
                        <h1 class="font-weight-bold">Bem-vindo ao mundo das Repúblicas!</h1>
                        <p class="font-italic">"Encontre quartos para alugar em repúblicas ou cadastre a sua."</p>
                    </div>
                    <div class='col-md-12 col-lg-12 col-sm-12 text-center align-content-center'
                         style="max-width: 500px">
                        <form id="logout-form" action="{{ route('portal.republicSearch') }}" method="POST">
                            @csrf
                            <div class="input-group mb-3">
                                <input class='form-control' type='text' name='search'
                                       placeholder='Preencha o nome da cidade'>
                                <div id='search' class="input-group-append">
                                    <button type='submit' class='btn btn-danger'>Buscar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
{{--                <div class='row justify-content-md-center'>--}}
{{--                    <a href="#" class="btn btn-light text-secondary btn-lg">Estado</a>--}}
{{--                    <a href="#" class="btn btn-light text-secondary btn-lg mx-2">Cidade</a>--}}
{{--                    <a href="#" class="btn btn-light text-secondary btn-lg">Bairro</a>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
    <div id='informacaoAleatoria' class="jumbotron jumbotron-fluid mb-0" style="background-color: #e2e3e5">
        <div class="container">
            <div class='row justify-content-md-center'>
                <div class='col-12 text-center'>
                    {{--<h1>Como Funciona</h1>--}}
                    {{--<hr class='bg-danger'>--}}
                    <div class="row">
                        <div class="col-12">
                            <h2 class="text-secondary">Como funciona ?</h2>
                            <hr>
                        </div>
                        <div class="col-md-4">
                            <i class="text-danger fas fa-search-location fa-3x mb-2"></i>
                            <h5 class='text-danger'>Encontre lugares para morar</h5>
                            <p class='text-muted'>
                                Use nossa busca para encontrar excelentes apartamentos para dividir aluguel e quartos
                                para alugar em todas as regiões do Brasil
                            </p>
                        </div>
                        <div class="col-md-4">
                            <i class="text-danger fas fa-mobile-alt fa-3x mb-2"></i>
                            <h5 class='text-danger'>
                                Negocie diretamente com o anunciante
                            </h5>
                            <p class='text-muted'>
                                Utilize nossa plataforma para trocar mensagens e conhecer melhor a pessoa que irá
                                dividir moradia com você.
                            </p>
                        </div>
                        <div class="col-md-4">
                            <i class="text-danger fas fa-key fa-3x mb-2"></i>
                            <h5 class='text-danger'>
                                Mude-se para um novo lar
                            </h5>
                            <p class='text-muted'>
                                Faça sua mudança com a tranquilidade de ter escolhido um bom lugar para morar, dividindo
                                o aluguel com pessoas que combinam com você.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id='republicas' class="jumbotron jumbotron-fluid m-0 "
         style="background-image: linear-gradient(0deg, #dededebd, #f8f9fa) ,url(/images/FotoJet2.png);background-position: center;">
        <div class="container">
            <div class='text-center'>
                <h1 class='text-danger my-2'>REPÚBLICAS</h1>
                <hr>
            </div>

            <div class="row justify-content-center mb-2">
                @if(isset($republics))
                    @foreach($republics as $republic)
                        <div class="card border border-dark img-thumbnail m-2 shadow " style="width: 290px">
                            <div class='overflow-hidden'>
                                <div class="overflow-auto overflow-hidden" style="
                                    background-image: url({{asset($republic->image)}});
                                    background-size: auto;
                                    /* width: 100%; */
                                    height: 200px;
                                    background-position: center;
                                    background-repeat: no-repeat;
                                    background-size: cover;
                                    ">
                                </div>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title text-truncate">{{$republic->title}}</h3>
                                <p class="card-text text-truncate">{{$republic->street}}
                                    <br>{{$republic->city}} - {{$republic->state}}</p>
                                <p>
                                    <span>
                                       <i class="fas fa-money-bill"></i> R$ {{number_format($republic->value,2,",",".")}}
                                    </span>
                                </p>
                                <form class="mb-0" action="{{ route('painel.advertisement.destroy', $republic->id)}}"
                                      method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{route('portal.republics.show', $republic->id)}}"
                                       class="btn btn-danger w-100">Ver Detalhes
                                    </a>
                                </form>
                            </div>
                        </div>
                    @endforeach
                @endif
                <div class="w-100"></div>
                <div class='col-md-4 col-lg-4 col-sm-12 text-center align-content-center mt-4'>
                    <div class='form-group text-center'>
                        <div class='w-100'></div>
                        <form id="logout-form" action="{{ route('portal.republicSearch') }}" method="POST">
                            @csrf
                            <button type='submit' href='{{ route('portal.republicSearch') }}'
                                    class='btn btn-outline-danger w-100 btn-lg px-5'
                                    style="border-radius: 50px;">Todas
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="anuncios" class="jumbotron jumbotron-fluid mb-0 bg-anuncio">
        <div class='row justify-content-md-center m-1'>
            <div class='col-12 text-center -20'>
                <img src='/images/Google-Facebook-Instagram.png' style='height: 60px'>
                <h2>
                    Anúncios Diversos
                </h2>
                <div class='row justify-content-center'>
                    <div class='' style='max-width: 600px;'>
                        <p class='text-secondary'>
                            Anuncie gratuitamente agora e deixe o resto com a gente!
                            Vamos encontrar pessoas confiáveis que estejam interessadas em seus anúncios.
                        </p>
                    </div>
                </div>
            </div>
            <div class='col-md-4 col-lg-4 col-sm-12 text-center align-content-center  mb-4'>
                <div class='form-group text-center'>
                    <a type='btn btn-danger' href='{{route('home')}}' class='btn btn-primary w-100 btn-lg px-5'
                       style="max-width: 300px;">Grátis</a>
                </div>
            </div>
            <div class="w-100"></div>
            <div class="container">
                <div class="row justify-content-center mb-2">
                    @if(isset($advertisements))
                        @foreach($advertisements as $advertisement)
                            <div class="card border border-light img-thumbnail m-2 shadow" style="width: 290px">
                                <div class='overflow-hidden'>
                                    <div class="overflow-auto overflow-hidden" style="
                                        background-image: url({{asset($advertisement->image)}});
                                        background-size: auto;
                                        /* width: 100%; */
                                        height: 200px;
                                        background-position: center;
                                        background-repeat: no-repeat;
                                        background-size: cover;
                                        ">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h3 class="card-title text-truncate">{{$advertisement->title}}</h3>
                                    <p class="card-text text-truncate">{{$advertisement->street}}
                                        <br>{{$advertisement->city}} - {{$advertisement->state}}</p>
                                    <p>
                                    <span>
                                       <i class="fas fa-money-bill"></i> R$ {{number_format($advertisement->value,2,",",".")}}
                                    </span>
                                        <span class="float-right">
                                       {{$advertisement->user->name}}
                                    </span>
                                    </p>
                                    <form class="mb-0"
                                          action="{{ route('painel.advertisement.destroy', $advertisement->id)}}"
                                          method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{route('portal.showAdvertisement', $advertisement->id)}}"
                                           class="btn btn-primary w-100">Ver Detalhes
                                        </a>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="w-100"></div>
            <div class='col-md-4 col-lg-4 col-sm-12 text-center align-content-center mt-4'>
                <div class='form-group text-center'>
                    <a type='btn' href="{{ route('portal.advertisement') }}"
                       class='btn btn-outline-primary btn-lg px-5 w-100'
                       style="border-radius: 50px;">Todos</a>
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

