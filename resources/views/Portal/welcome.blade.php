@extends('Portal.TemplateLaravel')
@section('content')
    <div class="jumbotron jumbotron-fluid m-0 bg-dark">
        <div class="container text-white">
            <div class='row justify-content-md-center'>
                <div class='col-12 text-center'>
                    <img src='{{ asset('/images/favicon.png') }}' style='width: 70px'>
                    <h1>Encontre Repúblicas em todo Brasil !</h1>
                    <p>Encontre quartos para alugar em repúblicas ou cadastre a sua.</p>
                </div>
                <div class='col-md-4 col-lg-4 col-sm-12 text-center align-content-center'>
                    <div class='form-group'>
                        <div class="input-group mb-3">
                            <input class='form-control' type='text' name='search' placeholder='Preencha o nome da cidade'>
                            <div class="input-group-append">
                                <button type='submit' class='btn btn-danger'>Buscar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="jumbotron jumbotron-fluid bg-light m-0">
        <div class="container">
            <div class='row justify-content-md-center m-4'>
                <div class='col-12 text-center'>
                    <h4>
                        Tem vagas na sua república e deseja que as pessoas saibam ?
                    </h4>
                    <p class='text-secondary'>
                        Anuncie gratuitamente agora. Iremos encontrar pessoas confiáveis que estejam interessadas em alugar seu quarto para morar com você.
                    </p>
                </div>
                <div class='col-md-4 col-lg-4 col-sm-12 text-center align-content-center'>
                    <div class='form-group text-center'>
                        <button type='submit' class='btn btn-danger px-5'>Anunciar Agora</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="jumbotron jumbotron-fluid text-white bg-dark mb-0">
        <div class="container">
            <div class='row justify-content-md-center'>
                <div class='col-12 text-center'>
                    {{--<h1>Como Funciona</h1>--}}
                    {{--<hr class='bg-danger'>--}}
                    <div class="row">
                        <div class="col-md-4">
                            <i class="text-danger fas fa-search-location fa-3x mb-2"></i>
                            <h5 class='text-danger'>Encontre lugares para morar</h5>
                            <p class='text-muted' >
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
    <div class="album py-5 bg-light">
        <div class="container">
            <h1 class='text-center mb-2'>Anúncios em Destaque</h1>
            <div class="row">
                @foreach($republics as $republic)
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Miniatura [100% x225]" style="height: 225px; width: 100%; display: block;" src="{{$republic->image}}" data-holder-rendered="true">
                            <div class="card-body">
                                <p class="card-text">
                                <h4>{!! \Illuminate\Support\Str::limit($republic->name, 20) !!}</h4>
                                <p>{!! \Illuminate\Support\Str::limit($republic->description, 80) !!}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">
                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Visão</font></font>
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
    <div class="jumbotron jumbotron-fluid bg-dark mb-0">
        <div class="container">
            <div class='row justify-content-md-center'>
                <a href='#' class='text-white mx-1'><i class="fas fa-id-badge"></i> Contato</a>
                <a href='#' class='text-white mx-1'><i class="fab fa-github-alt"></i> GitHub</a>
                <a href='#' class='text-white mx-1'><i class="fab fa-instagram"></i> Instagram</a>
            </div>
        </div>
    </div>
@endsection
