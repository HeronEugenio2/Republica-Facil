@extends('Portal.TemplateLaravel')
<style>

    h10 {
        color: #636b6f !important;
        font-family: unset;
        font-weight: 600;
        font-size: xx-large;
    }

    @media only screen and (min-width: 600px) {

        .bg-header2 {
            background-image: url({{asset('/images/elementovetor2.png')}});
            /*background-size: 350px;*/
            /*background-image: linear-gradient(0deg, rgb(248, 248, 255), rgba(35, 123, 249, 0.07)), url("/images/mulher.png");*/
            background-position: left;
            background-repeat: no-repeat;
            /*height: 200px;*/
            padding: 110px;
        }
    }

    .image-anuncio {
        background-image: url({{asset('/images/estudantes.png')}});
        /*background-size: 350px;*/
        /*background-image: linear-gradient(0deg, rgb(248, 248, 255), rgba(35, 123, 249, 0.07)), url("/images/mulher.png");*/
        background-position: center;
        background-repeat: no-repeat;
        height: 500px;
        padding: 110px;
    }

    .h-footer {
        font-size: 6.5rem;
    !important;
        font-weight: bold;
        font-family: monospace;
    }

</style>
@section('content')
    {{--    HEADER BG IMAGE--}}
    <div class="bg-header2">
        <div class="container">
            <div class='row justify-content-md-center p-4'>
                <div class='col-12 text-center mt-4 mb-2'>
                    {{--                    <img src='/images/Google-Facebook-Instagram.png' style='height: 80px'>--}}
                    <img src='{{ asset('/images/favicon.png') }}' style='width: 115px'>

                </div>
                <div class='col-md-12 col-lg-12 col-sm-12 text-center align-content-center my-2'
                     style="max-width: 500px">
                    <form id="logout-form" action="{{route('portal.advertisement')}}" method="POST">
                        @csrf
                        <div class="input-group mb-3">
                            <input class='form-control' type='text' name='search'
                                   placeholder='Vagas em repúblicas, alugueis, mobília...'>
                            <div id='search' class="input-group-append">
                                <button type='submit' class='btn btn-outline-danger px-4'>Encontrar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <div>
        <div class="">
            @if(isset($categories) && count($categories)>0)
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class=" navbar-collapse justify-content-center" id="navbarNav">
                        <ul class="navbar-nav">
                            @foreach($categories as $category)
                                <li class="nav-item">
                                    <a class="nav-link btnSearchCategory" data-id="{{$category->id}}"
                                       href="#">{{$category->title}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </nav>
            @endif
        </div>
    </div>

    {{--    INCLUDE CARDS--}}
    <div id="response" class="p-4 mb-0 ">
        @include('Portal.Advertisement.IncludeSearch')
        {{ $advertisementes->links() }}
    </div>
    <div class='row justify-content-md-center'>
        <div class='col-12 text-center -20'>
            <h2>
                Anunciar
            </h2>
            <div class='row justify-content-center'>
                <div class='' style='max-width: 600px;'>
                    <p class='text-secondary'>
                        Crie seus próprios anúncios e conecte-se com estudantes em tempo real
                    </p>
                </div>
            </div>
        </div>
        <div class='col-md-4 col-lg-4 col-sm-12 text-center align-content-center'>
            <div class='form-group text-center'>
                <a href='{{route('home')}}' class='btn btn-outline-dark w-100 btn-lg px-5'
                   style="max-width: 300px;">Grátis</a>
            </div>
        </div>
    </div>
    <div id="anuncios" class=" mb-0 image-anuncio  mb-1">

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
    <script>
        $(document).ready(function () {
            $(".icone").hover(function () {
                $(this).children().toggleClass('text-grey3 text-grey3-hover ');
            });

            $(".btnSearchCategory").click(function () {
                let category = $(this).data('id');
                $.ajaxSetup({
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                    method: 'POST',
                    url: '{{ route("portal.advertisement") }}'
                });
                $.ajax({
                    data: {
                        category_id: category
                    },
                    success: function (response) {
                        $("#response").html(response);
                    },
                    error: function (data) {
                        alert('nao veio');
                    }
                });
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
