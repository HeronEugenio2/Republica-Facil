@extends('Portal.TemplateLaravel')
@push('css')

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
                                 src="https://www.layoutit.com/img/sports-q-c-1600-500-1.jpg">
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
                    <dt>
                        Membros
                    </dt>
                    <dd>
                        @foreach($republic->user as $user)
                            <div class="media my-1">
                                <img class="mr-3" alt="Bootstrap Media Preview"
                                     src="https://www.layoutit.com/img/sports-q-c-64-64-8.jpg">
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
                <div class="jumbotron card card-block">
                    <img class="mr-3 mb-4" src="{{$republic->image}}" style="width: 150px;height: 120px;">
                    <h2>
                        {{$republic->name}}
                    </h2>
                    <p>
                        This is a template for a simple marketing or informational website. It includes a large callout
                        called the hero unit and three supporting pieces of content. Use it as a starting point to
                        create something more unique.
                    </p>
                    <p>
                        <a class="btn btn-success btn-large" href="#"><i class="fab fa-whatsapp text-white"></i> Contato</a>
                        <a class="btn btn-secondary btn-large" href="#"><i class="far fa-star"></i> Avaliar</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
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
                            $('.answer').replaceWith('<h5 class="py-4 text-muted">' + response.message + '</h5>');
                        },
                        error: function (response) {
                            $('.answer').replaceWith('<h5 class="py-4 text-muted">' + response.message + '</h5>');

                        }
                    });
                })
            );
        });
    </script>
@endpush
