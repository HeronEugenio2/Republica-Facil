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
        .img-thumbnail {
            background-color: rgba(0, 0, 0, 0.5);
            background-color: #000;
        }
    </style>
@endpush

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-5 mt-4">
                <div class="badge badge-primary w-100 mb-2">
                    <h2 class="m-0">
                        <i class="fas fa-money-bill-wave"></i> R$ {{money_format('%.2n', $advertisement->value)}}
                    </h2>
                </div>
                <div class="card shadow" style='height: calc(100% - 53px);'>
                    <div class='overflow-hidden'>
                        <div class="overflow-auto overflow-hidden" style="
                            background-image: url({{asset($advertisement->image)}});
                            background-size: auto;
                            /* width: 100%; */
                            height: 300px;
                            background-position: center;
                            background-repeat: no-repeat;
                            ">
                        </div>
                        {{--                        <img src="{{asset($advertisement->image)}}" class=" w-100">--}}
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-truncate">{{$advertisement->title}}</h5>
                        <p class="card-text text-truncate">{{$advertisement->street}}
                            <br>{{$advertisement->city}} - {{$advertisement->state}}</p>
                    </div>
                </div>
            </div>
            <div class="col mt-4">
                <div class="card shadow">
                    <div class="card-body">
                        {!! $map['html'] !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-4 ">
            <div class="card shadow">
                <div class="card-body">
                    <div class="jumbotron pb-1">
                        <div class="media">
                            <img class="mr-3 mt-2 img-thumbnail rounded-circle"
                                 src="{{$advertisement->user->image}}"
                                 style="width: 80px;height:80px">
                            <div class="media-body text-left">
                                <h5 class="mt-0">{{$advertisement->user->name}}</h5>
                                {{$advertisement->user->email}}<br> <strong>{{$republic->name ??''}}</strong>
                            </div>
                        </div>
                        <hr>
                        <p class="text-center mt-2">
                            <a class="btn btn-success btn-large" href="#">
                                <i class="fab fa-whatsapp text-white"></i> Contato
                            </a>
                            <a class="btn btn-primary btn-large" href="#"><i class="fas fa-link"></i> Compartilhar
                            </a>
                        </p>
                    </div>
                    <h4>Descrição</h4>
                    <hr>
                    {{$advertisement->description}}<br>
                </div>
            </div>
        </div>
        <div class="my-4">
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
                                            <strong><i class="fas fa-money-bill"></i> R$ {{money_format('%.2n', $advertisement->value)}}
                                            </strong>
                                        </small>
                                        <div class='w-100'></div>
                                        <a href='{{route('portal.showAdvertisement', $advertisement->id)}}' href='#'
                                           class='btn btn-sm btn-primary w-100'>Visualisar
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id='footer' class="jumbotron jumbotron-fluid bg-dark mb-0 col">
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
