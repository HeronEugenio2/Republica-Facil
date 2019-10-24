@extends('Portal.TemplateLaravel')
<style>
    .text-grey2 {
        color: #636b6f !important;
    }
    .text-grey3 {
        color: rgba(48, 106, 198, 0.96) !important;
    }
    .text-grey3-hover {
        color: rgba(48, 106, 198, 0.38) !important;
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
    .bg-header2 {
        background-image: url("/images/mulher.png");
        background-size: 350px;
        /*background-image: linear-gradient(0deg, rgb(248, 248, 255), rgba(35, 123, 249, 0.07)), url("/images/mulher.png");*/
        background-position: left;
        background-repeat: no-repeat;
        /*height: 200px;*/
    }
    .bg-anuncios {
        background-image: linear-gradient(0deg, #dededebd, #f8f9fa), url(/images/FotoJet2.png);
        background-position: center;
    }
    .imgBanner {
        width: auto;
        height: 100%;
    }
    @media screen and (max-width: 600px) {
        .carrossel {
            display: none;
        }
    }
    @media screen and (min-width: 3000px) {
        .carrossel {
            display: none;
        }
    }
</style>
@section('content')
    {{--    HEADER BG IMAGE--}}
    <div class="jumbotron jumbotron-fluid m-0 bg-header2">
        <div class="container">
            <div class='row justify-content-md-center'>
                <div class='col-12 text-center mt-4 mb-2'>
                    <img src='/images/Google-Facebook-Instagram.png' style='height: 80px'>
                </div>
                <div class='col-md-12 col-lg-12 col-sm-12 text-center align-content-center'
                     style="max-width: 500px">
                    <div style="">
                        <form id="logout-form" action="#" method="POST">
                            @csrf
                            <div class="input-group mb-3">
                                <input class='form-control' type='text' name='search'
                                       placeholder='Estou procurando por...'>
                                <div id='search' class="input-group-append">
                                    <button type='submit' class='btn btn-primary'>Buscar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class='col-md-12 col-lg-12 col-sm-12 text-center align-content-center'>
                <div class='row justify-content-md-center'>
                    {{--<h10>Categorias</h10>--}}
                    <div class='w-100 mb-4'></div>
                    @if(isset($categories) && count($categories)>0)
                        {{--<form action='{{route('portal.searchCategory')}}' method="POST">--}}
                        {{--@csrf--}}
                        <div class='row text-center justify-content-center p-0'>
                            @foreach($categories as $category)
                                <a href='{{route('portal.searchCategory', $category->id)}}'>
                                    <div class='icone m-2' data-id='{{$category->id}}'>
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
    </div>
    {{--    INCLUDE CARDS--}}
    <div class="jumbotron jumbotron-fluid p-4 mb-0 bg-anuncios">
        @include('Portal.Advertisement.IncludeSearch')
        {{ $advertisementes->links() }}
    </div>
    {{--    CAROUSEL--}}
    {{--    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">--}}
    {{--        <div class="carousel-inner" style="max-height: 330px">--}}
    {{--            <div class="carousel-item active">--}}
    {{--                <a href="#">--}}
    {{--                    <img class="d-block w-100 image" src="/images/2.png" alt="Primeiro Slide" style="max-height: 330px">--}}
    {{--                </a>--}}
    {{--            </div>--}}
    {{--            <div class="carousel-item">--}}
    {{--                <a href="#">--}}
    {{--                    <img class="d-block w-100 image" src="/images/3.png" alt="Segundo Slide" style="max-height: 330px">--}}
    {{--                </a>--}}
    {{--            </div>--}}
    {{--            <div class="carousel-item">--}}
    {{--                <img class="d-block w-100"--}}
    {{--                     src="https://www.incimages.com/uploaded_files/image/970x450/products_364475.jpg"--}}
    {{--                     alt="Terceiro Slide">--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--        <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">--}}
    {{--            <span class="carousel-control-prev-icon" aria-hidden="true"></span>--}}
    {{--            <span class="sr-only">Anterior</span>--}}
    {{--        </a>--}}
    {{--        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">--}}
    {{--            <span class="carousel-control-next-icon" aria-hidden="true"></span>--}}
    {{--            <span class="sr-only">Próximo</span>--}}
    {{--        </a>--}}
    {{--    </div>--}}
    {{--    FOOTER--}}
    {{--    <div id='footer' class="jumbotron jumbotron-fluid bg-dark mb-0">--}}
    {{--        <div class="container">--}}
    {{--            <div class='row justify-content-md-center'>--}}
    {{--                <a href='#' class='text-white mx-1'><i class="fas fa-id-badge"></i> Contato</a>--}}
    {{--                <a href='#' class='text-white mx-1'><i class="fab fa-github-alt"></i> GitHub</a>--}}
    {{--                <a href='#' class='text-white mx-1'><i class="fab fa-instagram"></i> Instagram</a>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            $(".icone").hover(function () {
                $(this).children().toggleClass('text-grey3 text-grey3-hover ');
            });
        });
        // $(window).resize(function () {
        //     if ($(window).width() < 500) {
        //         // $('.image').removeClass('w-100');
        //         $('.carousel-inner').css('min-height','350px');
        //         $('.image').css('min-height','350px');
        //         $('.image').css('min-width','850px');
        //
        //     }
        //     if ($(window).width() >= 500) {
        //         // $('.image').addClass('w-100');
        //     }
        // });
    </script>
@endpush
