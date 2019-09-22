@extends('Portal.TemplateLaravel')
@push('css')
    <style type="text/css">
        img {
            display: block;
            position: relative;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
@endpush

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="carousel slide" id="carousel-602221">
                    <ol class="carousel-indicators">
                        <li data-slide-to="0" data-target="#carousel-602221">
                        </li>
                        <li data-slide-to="1" data-target="#carousel-602221" class="active">
                        </li>
                        <li data-slide-to="2" data-target="#carousel-602221">
                        </li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item">
                            <img class="d-block w-100" alt="Carousel Bootstrap First"
                                 style="height: 200px;"
                                 src="https://www.wildlifetrusts.org/sites/default/files/styles/node_hero_default/public/2018-01/Grey%20heron%20%282%29%20credit%20Neil%20Aldridge.jpg?h=860fe8e1&itok=LzKGIkQR">
                            <div class="carousel-caption">
                                <h4>
                                    First Thumbnail label
                                </h4>
                                <p>
                                    Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi
                                    porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                                </p>
                            </div>
                        </div>
                        <div class="carousel-item active">
                            <img class="d-block w-100" alt="Carousel Bootstrap Second"
                                 src="https://www.layoutit.com/img/sports-q-c-1600-500-2.jpg">
                            <div class="carousel-caption">
                                <h4>
                                    Second Thumbnail label
                                </h4>
                                <p>
                                    Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi
                                    porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                                </p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" alt="Carousel Bootstrap Third"
                                 src="https://www.layoutit.com/img/sports-q-c-1600-500-3.jpg">
                            <div class="carousel-caption">
                                <h4>
                                    Third Thumbnail label
                                </h4>
                                <p>
                                    Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi
                                    porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                                </p>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carousel-602221" data-slide="prev"><span
                            class="carousel-control-prev-icon"></span> <span class="sr-only">Previous</span></a> <a
                        class="carousel-control-next" href="#carousel-602221" data-slide="next"><span
                            class="carousel-control-next-icon"></span> <span class="sr-only">Next</span></a>
                </div>
            </div>
            <div class="col-md-6 my-2">
                <address class="my-4">
                    <i class="fas fa-map-marked-alt fa-2x"></i>
                    <strong>{{$republic->city}} - {{$republic->state}} </strong>
                    <br> {{$republic->street}}, {{$republic->number}} <br> {{$republic->district}},
                    CEP {{$republic->cep}}<br>
                </address>
                <hr>
                <dl>
                    <dt>
                        Descrição
                    </dt>
                    <dd>
                        {{$republic->description}}
                    </dd>
                    <dt>
                        Mensalidade
                    </dt>
                    <dd>
                        O valor oferecido pela república é de R$ {{money_format('%.2n', $republic->value)}} por quarto.
                    </dd>
                    <dt>
                        Tipo de moradia
                    </dt>
                    <dd>
                        A república oferece {{$republic->qtdVacancies}}
                        @if($republic->qtdVacancies == 1)
                            vaga
                        @else
                            vagas
                        @endif do tipo {{$republic->type->title}}.
                    </dd>
                    <hr>
                    <dt>
                        Membros
                    </dt>
                    <dd>
                        @foreach($republic->user as $user)
                            <div class="media my-1">
                                <img class="mr-3" alt="Bootstrap Media Preview"
                                     src="{{$user->image}}" style="width: 90px;height:auto">
                                <div class="media-body">
                                    <h5 class="mt-0">
                                        {{$user->name}}
                                    </h5>
                                    {{$user->email}}
                                </div>
                            </div>
                        @endforeach
                    </dd>
                </dl>
            </div>
            <div class="col-md-6 my-4">
                <div class="jumbotron card card-block py-4 text-center justify-content-center"
                     style="align-items: center;">
                    <img class=" mb-4" src="{{$republic->image}}" style="width: 150px;height: 120px;">
                    <h2>
                        {{$republic->name}}
                    </h2>
                    <p class="text-center">
                        <a class="btn btn-success btn-large" href="#"><i class="fab fa-whatsapp text-white"></i> Contato</a>
                        <a class="btn btn-secondary btn-large" href="#" data-toggle="modal" data-target="#modalExemplo"><i
                                class="far fa-star"></i> Avaliar</a>
                    </p>
                    <hr>
                    <div class="row">
                        <div class="col-6">
                            <h3>{{$republic->down}}</h3>
                            <i class="fas fa-thumbs-down text-danger fa-2x"></i>
                        </div>
                        <div class="col-6">
                            <h3>{{$republic->up}}</h3>
                            <i class="fas fa-thumbs-up text-success fa-2x"></i>
                        </div>
                    </div>
                    <hr>
                    <p class="text-center text-secondary mt-4">Irregularidades no anúncio? <a href="#">Denunciar</a></p>
                    <div class="col-12 mt-2">
                        @if(count($errors) > 0)
                            <div class="row">
                                <div class="col-12 col-md-offset-4 error alert-danger p-4">
                                    @foreach($errors->all() as $error)
                                        {{$error}}<br>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        @if(Session::has('message'))
                            <div class="row">
                                <div class="col-md-4 col-md--offset-4 success">
                                    {{Session::get('message')}}
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Avaliar República</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('portal.vote', $republic->id)}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Cpf</label>
                            <input type="text" id="cpf" class="form-control" name="cpf"
                                   placeholder="Digite apenas números" maxlength="14" required>
                            <small id="emailHelp" class="form-text text-muted">Seus dados não serão divulgados.</small>
                            <label class="mt-4">Sua avaliação sobre a república é positiva?</label>
                            <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="optionVote" id="inlineRadio1"
                                       value="up">
                                <label class="form-check-label" for="inlineRadio1"><i
                                        class="fas fa-thumbs-up text-success"></i> Sim</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="optionVote" id="inlineRadio2"
                                       value="down">
                                <label class="form-check-label" for="inlineRadio2"><i
                                        class="fas fa-thumbs-up text-danger"></i> Não</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Enviar</button>
                    </form>
                </div>
                {{--                <div class="modal-footer">--}}
                {{--                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>--}}
                {{--                    <button type="button" class="btn btn-primary">Salvar mudanças</button>--}}
                {{--                </div>--}}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
    <script>
        $(document).ready(function () {

            $(".vote").on('click', (function (e) {
                    let vote = $(this).data('value');
                    let republic_id = $('#btnView{{$republic->id}}').data('republic');
                    alert(republic_id);
                    e.preventDefault();
                    $.ajax({
                        headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                        method: 'POST',
                        url: 'https://support.perfectpay.com.br/vote/faq',
                        data: {
                            vote: vote,
                            slug_id: republic_id,
                        },
                        success: function (response) {
                            // $('.answer').replaceWith('<h5 class="py-4 text-muted">' + response.message + '</h5>');
                        },
                        error: function (response) {
                            // $('.answer').replaceWith('<h5 class="py-4 text-muted">' + response.message + '</h5>');

                        }
                    });
                })
            );

            $('#cpf').mask('###.###.###-##', {reverse: true});

        });
    </script>
@endpush
