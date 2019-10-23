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
            <div class="col-md-5 my-4">
                <div class="jumbotron card card-block py-4 text-center shadow justify-content-center"
                     style="align-items: center;">
                    <img class=" mb-4" src="{{asset($advertisement->image)}}"
                         style="width: 330px;height: auto;">
                    <h2>
                        {{$advertisement->title}}
                    </h2>
                    <h2>
                        <i class="fas fa-money-bill"></i> R$ {{money_format('%.2n', $advertisement->value)}}
                    </h2>
                    <hr>
                    <div class="media">
                        <img class="mr-3" src="{{asset('images/'.$advertisement->user->image)}}"
                             style="width: 80px;height:80px">
                        <div class="media-body">
                            <h5 class="mt-0">{{$advertisement->user->name}}</h5>
                            {{$advertisement->user->email}}<br>
                            <strong>{{$republic->name ??''}}</strong>
                        </div>
                    </div>
                    <hr>
                    <p class="text-center">
                        <a class="btn btn-success btn-large" href="#"><i class="fab fa-whatsapp text-white"></i> Contato</a>
                        <a class="btn btn-primary btn-large" href="#"><i class="fas fa-link"></i> Compartilhar</a>
                    </p>
                    <hr>
                    <p class="text-center text-secondary mt-4">Irregularidades no anúncio? <a href="#">Denunciar</a></p>
                </div>
            </div>
            <div class="col my-4">
                <div class="card shadow">
                    <div class="card-body">
                        {!! $map['html'] !!}
                    </div>
                </div>
            </div>
            <div class="col-12 my-4">
                <div class="card shadow">
                    <div class="card-body">
                        <h4>Descrição</h4>
                        <hr>
                        {{$advertisement->description}}<br>
                    </div>
                </div>
            </div>
            <div class="col-12 my-4">
                <div class="card shadow">
                    <div class="card-body">
                        <h4>Anúncios Semelhantes:</h4>
                        <hr>
                        <div class="row justify-content-center mb-2">
                            @if(isset($advertisements))
                                @foreach($advertisements as $advertisement)
                                    <div class='card m-1 shadow' style='width: 150px;     border-color: #2881da5c;'>
                                        <img class="card-img-top w-100" style='height: 120px'
                                             src="{{$advertisement->image}}"
                                             alt="Card image cap">
                                        <div class='card-body p-1 text-center w-100 text-truncate'>
                                            <small>{{$advertisement->title}}</small>
                                            <br>
                                            <small>
                                                <strong><i class="fas fa-money-bill"></i>
                                                    R$ {{money_format('%.2n', $advertisement->value)}}
                                                </strong>
                                            </small>
                                            <div class='w-100'></div>
                                            <a href='{{route('portal.showAdvertisement', $advertisement->id)}}' href='#'
                                               class='btn btn-sm btn-primary w-100'>Visualisar</a>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
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

@push('scripts')

    <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
    <script>
        $(window).ready(function () {
            navigator.geolocation.getCurrentPosition(success => {
                /* Do some magic. */
            }, failure => {
                if (failure.message.startsWith("Only secure origins are allowed")) {
                    // Secure Origin issue.
                }
            });
            $("#directionsDiv").hide();
        });


    </script>


@endpush
