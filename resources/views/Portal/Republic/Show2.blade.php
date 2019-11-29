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
            <div class="card shadow mt-4 mx-3 border" style='height: 542px;'>
                <div class='overflow-hidden'>
                    <div class="overflow-auto overflow-hidden" style="
                        background-image: url({{$republic->image}});
                        background-size: auto;
                        /* width: 100%; */
                        height: 300px;
                        background-position: center;
                        background-repeat: no-repeat;
                        background-size: cover;
                        ">
                    </div>
                </div>
                <div class="card-body text-center">
                    <h2>
                        {{$republic->name}}
                    </h2>
                    <hr>
                    <p>
                        <a class="btn btn-success btn-large my-1"
                           href="https://api.whatsapp.com/send?phone=55{{$republic->phone}}&text=Olá {{$republic->name}}! Tenho interesse em um quarto na república, gostaria de saber se ainda existem vagas disponíveis. Obrigado!&source=&data=sadasdsadsa"><i
                                class="fab fa-whatsapp text-white"></i>
                            Contato</a>
{{--                        <a class="btn btn-primary btn-large my-1"--}}
{{--                           href="www.republicafacil.com.br/portal/republicas/1"><i--}}
{{--                                class="fas fa-link"></i> Compartilhar</a>--}}
                        <a class="btn btn-warning text-white btn-large my-1" href="#" data-toggle="modal"
                           data-target="#modalExemplo"><i class="fas fa-star"></i> Avaliar</a>
                    </p>
                    <hr>
{{--                    <p class="text-center text-secondary mt-4">Irregularidades no anúncio? <a href="#">Denunciar</a></p>--}}
                    <div class="col-12 mt-2">
                        @if(count($errors) > 0)
                            <div class="row">
                                <div class="col-12 col-md-offset-4 error alert-danger p-4" style="max-width: 350px">
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
            <div class="col mt-4">
                <div class="card shadow">
                    <div class="card-body">
                        {{--                                                {!! $map['html'] !!}--}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 mt-4">
                <div class="card shadow">
                    <div class="card-body ">
                        <dl>
                            <dt>
                                <h4><i class="fas fa-home"></i> Descrição</h4>
                            </dt>
                            <hr>
                            <dd>
                                {{$republic->description}}
                            </dd>
                            <dt>
                                Mensalidade
                            </dt>
                            <dd>
                                O valor oferecido pela república é de R$ {{money_format('%.2n', $republic->value)}} por
                                quarto.
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
                            <address class="my-4 text-center">
                                <i class="fas fa-map-marked-alt fa-2x"></i>
                                <strong>{{$republic->city}} - {{$republic->state}} </strong>
                                <br> {{$republic->street}}, {{$republic->number}} <br> {{$republic->district}},
                                CEP {{$republic->cep}}<br>
                            </address>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 mt-4">
                <div class="card shadow">
                    <div class="card-body">
                        <dl>
                            <dt>
                                <h4><i class="fas fa-users"></i> Membros</h4>
                            </dt>
                            <hr>
                            <dd>
                                @foreach($republic->user as $user)
                                    <div class="media my-1">
                                        <img class="mr-3 img-thumbnail" alt="Bootstrap Media Preview"
                                             src="{{asset($user->image)}}"
                                             style="width: 90px;height:90px; border-radius: 50%">
                                        <div class="media-body">
                                            <h5 class="mt-0">
                                                {{$user->name}}
                                            </h5>
                                            {{$user->email}}
                                        </div>
                                    </div>
                                    <hr>
                                @endforeach
                            </dd>
                        </dl>
                    </div>
                </div>
                <div class="card shadow mt-4">
                    <div class="card-body">
                        <h3><i class="fas fa-star-half-alt"></i> Avaliação</h3>
                        <hr>
                        <div class="row justify-content-center">
                            <div class="col-2 text-center">
                                <h3>{{$republic->down}}</h3>
                                <i class="fas fa-thumbs-down text-secondary fa-2x"></i>
                            </div>
                            <div class="col-2 text-center">
                                <h3>{{$republic->up}}</h3>
                                <i class="fas fa-thumbs-up text-secondary fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id='footer' class="jumbotron jumbotron-fluid bg-dark mb-0 mt-4">
        <div class="container">
            <div class='row justify-content-md-center'>
                <a href='#' class='text-white mx-1'><i class="fas fa-id-badge"></i> Contato</a>
                <a href='#' class='text-white mx-1'><i class="fab fa-github-alt"></i> GitHub</a>
                <a href='#' class='text-white mx-1'><i class="fab fa-instagram"></i> Instagram</a>
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
            </div>
        </div>
    </div>
    @include('sweetalert::alert')

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

            $(document).on('click', '.btn-send-whatsapp', function (event) {
                event.preventDefault();
                let tel = $('#whatsapp-tel').val();
                let message = $($(this).data('textarea_id')).val().trim();
                let checkout_code = $('#whatsapp-checkout-code').val();
                window.open('https://api.whatsapp.com/send?phone=55' + tel + '&text=' + encodeURI(message));
            })


        });
    </script>
@endpush
