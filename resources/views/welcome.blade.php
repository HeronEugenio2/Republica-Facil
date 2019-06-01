@extends('TemplateLaravel')
@section('content')
    <div class="jumbotron jumbotron-fluid m-0 bg-dark">
        <div class="container text-white">
            <div class='row justify-content-md-center'>
                <div class='col-12 text-center'>
                    <img src='{{ asset('/images/favicon.png') }}' style='width: 70px'>
                    <h1>Repúblicas para dividir em todo o Brasil !</h1>
                    <p>Encontre quartos para alugar em repúblicas ou cadastre a sua.</p>
                </div>
                <div class='col-4 text-center align-content-center'>
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
                        Anuncie gratuitamente quartos para alugar. Iremos encontrar pessoas confiáveis que estejam interessadas em alugar seu quarto para morar com você.
                    </p>
                </div>
                <div class='col-4 text-center align-content-center'>
                    <div class='form-group text-center'>
                            <button type='submit' class='btn btn-danger'>Anunciar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="jumbotron jumbotron-fluid bg-light mb-0">
        <div class="container">
            <div class='row justify-content-md-center'>
                <div class='col-12 text-center'>
                    <h1 class='mb-2'>Como Funciona</h1>
                    <div class="row">
                        <div class="col-md-4">
                            <h5 class='text-dark'>Título</h5>
                            <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Donec id elit non mi porta gravida at eget metus. </font><font style="vertical-align: inherit;">Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. </font><font style="vertical-align: inherit;">Etiam porta sem machosuada magna mollis euismod. </font><font style="vertical-align: inherit;">Donec sed odio dui.</font></font></p>
                        </div>
                        <div class="col-md-4">
                            <h5 class='text-dark'><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Título</font></font></h5>
                            <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Donec id elit non mi porta gravida at eget metus. </font><font style="vertical-align: inherit;">Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. </font><font style="vertical-align: inherit;">Etiam porta sem machosuada magna mollis euismod. </font><font style="vertical-align: inherit;">Donec sed odio dui.</font></font></p>
                        </div>
                        <div class="col-md-4">
                            <h5 class='text-dark'><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Título</font></font></h5>
                            <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Donec sed odio dui. </font><font style="vertical-align: inherit;">Cras justo odio, dapibus ac facilisis, egestas eget quam. </font><font style="vertical-align: inherit;">Vestíbulo id ligula porta felis euismod sempre. </font><font style="vertical-align: inherit;">Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</font></font></p>
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
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Miniatura [100% x225]" style="height: 225px; width: 100%; display: block;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22208%22%20height%3D%22225%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20208%20225%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_16b13abfbbb%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A11pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_16b13abfbbb%22%3E%3Crect%20width%3D%22208%22%20height%3D%22225%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2266.9375%22%20y%3D%22117.45%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
                        <div class="card-body">
                            <p class="card-text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Este é um cartão mais amplo com o texto de suporte abaixo como uma introdução natural ao conteúdo adicional. </font><font style="vertical-align: inherit;">Este conteúdo é um pouco mais longo.</font></font></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Visão</font></font></button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Editar</font></font></button>
                                </div>
                                <small class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">9 min</font></font></small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Miniatura [100% x225]" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22208%22%20height%3D%22225%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20208%20225%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_16b13abfbbc%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A11pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_16b13abfbbc%22%3E%3Crect%20width%3D%22208%22%20height%3D%22225%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2266.9375%22%20y%3D%22117.45%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true" style="height: 225px; width: 100%; display: block;">
                        <div class="card-body">
                            <p class="card-text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Este é um cartão mais amplo com o texto de suporte abaixo como uma introdução natural ao conteúdo adicional. </font><font style="vertical-align: inherit;">Este conteúdo é um pouco mais longo.</font></font></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Visão</font></font></button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Editar</font></font></button>
                                </div>
                                <small class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">9 min</font></font></small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Miniatura [100% x225]" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22208%22%20height%3D%22225%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20208%20225%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_16b13abfbbd%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A11pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_16b13abfbbd%22%3E%3Crect%20width%3D%22208%22%20height%3D%22225%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2266.9375%22%20y%3D%22117.45%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true" style="height: 225px; width: 100%; display: block;">
                        <div class="card-body">
                            <p class="card-text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Este é um cartão mais amplo com o texto de suporte abaixo como uma introdução natural ao conteúdo adicional. </font><font style="vertical-align: inherit;">Este conteúdo é um pouco mais longo.</font></font></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Visão</font></font></button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Editar</font></font></button>
                                </div>
                                <small class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">9 min</font></font></small>
                            </div>
                        </div>
                    </div>
                </div>
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
