@extends('Portal.TemplateLaravel')
@push('css')
    <style>
        body {
            background-color: ghostwhite !important;
        }
    </style>
@endpush

@section('content')


    <div class='container'>
        <section class='my-4'>
            <center>
                <div class='row'>
                    <div class='col-sm-12 col-lg-8 col-md-8'>
                        <section class='my-4'>
                            <center>
                                <span class='mx-1'><img src="{{$advertisement->image}}" class='rounded-circle shadow border' style='width: 150px; height: 150px;'></span>
                            </center>
                        </section>
                        <div class='text-lg-left'>
                            <h2>{{$advertisement->title}}</h2>
                            <h4>R$ {{money_format('%.2n', $advertisement->value)}}</h4>
                            <small>Publicado em: {{date_format($advertisement->created_at,'d/m')}} às {{date_format($advertisement->created_at,'h:m')}}</small>
                            <hr>
                            Descrição <br>
                            <p>{{$advertisement->description}}</p>
                            <a href='#'>Ver descrição completa</a>
                            <hr>
                            Localização <br>
                            <p>CEP: {{$advertisement->value}}<br> Município: {{$advertisement->value}}
                                <br> Bairro: {{$advertisement->value}}</p>
                        </div>
                        <hr>
                    </div>
                    <div class='col-sm-12 col-lg-4 col-md-4'>
                        Anunciante
                        <div class='card m-4'>
                            <div class='card-body'>
                                <h3>{{$advertisement->user->name}}</h3>
                                <div class='m-4'>
                                    <a href='#' class='btn  btn-success px-4'>
                                        <i class="fab fa-whatsapp text-white"></i> Contato
                                    </a>
                                </div>
                                <p>No República Fácil desde {{$advertisement->user->created_at}}<br>
                                    <a href='#'><i class="fab fa-buffer"></i> Ver todos anúncios</a>
                                </p>
                            </div>
                        </div>
                        Discas de segurança <br>
                        <div class='card m-4 p-2'>
                            <small>
                                Irregularidades no anúncio?
                                <a href='#'>Denunciar</a>
                            </small>
                        </div>
                    </div>
                </div>
            </center>
        </section>
    </div>
@endsection

