@extends('Portal.TemplateLaravel')
<style>
    .text-grey2 {
        color: #636b6f !important;
    }

    .text-grey3 {
        color: rgba(0, 123, 255, 0.52) !important;
    }

    h10 {
        color: #636b6f !important;
        font-family: unset;
        font-weight: 600;
        font-size: xx-large;
    }

    .bg-header {
        background-image: linear-gradient(0deg, rgb(248, 248, 255), rgba(35, 123, 249, 0.07)), url("/images/redeglobo.png");
        background-position: right;
        background-repeat: no-repeat;
    }

    .bg-anuncios {
        background-image: linear-gradient(0deg, rgba(239, 239, 246, 0), rgb(248, 248, 255)), url("/images/redepb.png");
        background-position: left;
    }

    .imgBanner {
        width: auto;
        height: 100%;
    }

    @media screen and (max-width: 600px) {
        .carrossel{
            display: none;
        }
    }
    @media screen and (min-width: 3000px) {
        .carrossel{
            display: none;
        }
    }

</style>
@section('content')
    <div class="jumbotron jumbotron-fluid m-0 bg-header">
        <div class="container">
            <div class='col-md-12 col-lg-12 col-sm-12 text-center align-content-center'>
                <div class=''>
                    <form id="logout-form" action="#" method="POST">
                        @csrf
                        <div class="input-group mb-3">
                            <input class='form-control' type='text' name='search' placeholder='Estou procurando por...'>
                            <div id='search' class="input-group-append">
                                <button type='submit' class='btn btn-primary'>Buscar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class='row justify-content-md-center'>
                {{--<h10>Categorias</h10>--}}
                <div class='w-100 mb-4'></div>
                @if(isset($categories) && count($categories)>0)
                    {{--<form action='{{route('portal.searchCategory')}}' method="POST">--}}
                    {{--@csrf--}}
                    <div class='row text-center justify-content-center'>
                        @foreach($categories as $category)
                            <a href='{{route('portal.searchCategory', $category->id)}}'>
                                <div class='col icone' data-id='{{$category->id}}'>
                                    <i class="fas fa-{{$category->icon}} text-grey3 fa-2x mx-4"></i><br>
                                    <span class='text-grey3'>{{$category->title}}</span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                    {{--</form>--}}
                @endif
            </div>
        </div>
    </div>


    <div id="carrossel" class="carrossel">
        <div class="w-100">
            <div class="row justify-content-center">
                <div id="demo" class="carousel slide w-100" style="background-color: white; " data-ride="carousel">
                    <!-- The slideshow -->
                    <div class="carousel-inner " style="max-height: 360px;min-height: 360px">
                        <div class="carousel-item active" href="#">
                            <img class="image d-block img-responsive w-100"
                                 src="https://www.casasbahia-imagens.com.br/HotSite/2019/loja-oficial-apple/imagens/2019-07-26/01-banner-tv-geral.png">
                        </div>
                        <div class="carousel-item">
                            <a href="#">
                                <img class="image d-block img-responsive  center-block w-100"
                                     src="https://www.casasbahia-imagens.com.br/HotSite/2019/loja-oficial-apple/imagens/v2/03-banner-tv-watch.png">
                            </a>
                        </div>
                    </div>
                    <!-- Left and right controls -->
                    <a class="carousel-control-prev bg-dark" style="width: 5%; background-color: #1b252f2e!important;"
                       href="#demo" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next bg-dark" style="width: 5%; background-color: #1b252f2e!important;"
                       href="#demo" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>

                </div>
            </div>
        </div>
    </div>




    <div class="jumbotron jumbotron-fluid p-4 mb-0 bg-anuncios" style="background-color: ghostwhite">
        @include('Portal.Advertisement.IncludeSearch')
        {{ $advertisementes->links() }}
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            $(".icone").hover(function () {
                $(this).children().toggleClass('text-grey3 text-dark ');
            });
        });
        // $(window).resize(function () {
        //     if ($(window).width() < 500) {
        //         $('.image').removeClass('w-100');
        //     }
        //     if ($(window).width() >= 500) {
        //         $('.image').addClass('w-100');
        //     }
        // });
    </script>
@endpush
