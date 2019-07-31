@extends('Portal.TemplateLaravel')
<style type='text/css'>
    body {
        background-color: ghostwhite !important;
    }
    body {font-family: Arial, Helvetica, sans-serif;}
    #myImg {
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
    }
    #myImg:hover {opacity: 0.7;}
    /* The Modal (background) */
    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0, 0, 0); /* Fallback color */
        background-color: rgba(0, 0, 0, 0.9); /* Black w/ opacity */
    }
    /* Modal Content (image) */
    .modal-content {
        margin: auto;
        display: block;
        width: 100%;
        max-width: 800px;
        max-height: 600px;
        /*max-width: 600px;*/
    }
    /* Caption of Modal Image */
    #caption {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
        text-align: center;
        color: #ccc;
        padding: 10px 0;
        height: 150px;
    }
    /* Add Animation */
    .modal-content, #caption {
        -webkit-animation-name: zoom;
        -webkit-animation-duration: 0.6s;
        animation-name: zoom;
        animation-duration: 0.6s;
    }
    @-webkit-keyframes zoom {
        from {-webkit-transform: scale(0)}
        to {-webkit-transform: scale(1)}
    }
    @keyframes zoom {
        from {transform: scale(0)}
        to {transform: scale(1)}
    }
    /* The Close Button */
    .close {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #f1f1f1;
        /*font-size: 40px;*/
        font-weight: bold;
        transition: 0.3s;
    }
    .close:hover,
    .close:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
    }
    /* 100% Image Width on Smaller Screens */
    @media only screen and (max-width: 700px) {
        .modal-content {
            width: 100%;
        }
    }
</style>

@section('content')


    <div class='container'>
        <section class='my-4'>
            <center>
                <div class='row'>
                    <div class='col-sm-12 col-lg-8 col-md-8'>
                        <section class='my-4'>
                            <center>
                                <div id="myModal" class="modal">
                                    <span class="close text-white" style='font-size: xx-large'>&times;</span>
                                    <img class="modal-content" id="img01">
                                    <div id="caption"></div>
                                </div>
                                <img id="myImg" src="{{$advertisement->image}}" class='rounded-circle shadow border photo' alt="{{$advertisement->title}}" style='width: 200px; height: 200px;'>
                                {{--<span class='mx-1'><img src="{{$advertisement->image}}" class='rounded-circle shadow border photo' style='width: 150px; height: 150px;'></span>--}}
                            </center>
                        </section>
                        <div class='text-lg-left'>
                            <h1>{{$advertisement->title}}</h1>
                            <h4 class='visible-sm'>R$ {{money_format('%.2n', $advertisement->value)}}</h4>
                            @if(isset($advertisement->created_at))
                                <small>Publicado em: {{date_format($advertisement->created_at,'d/m')}} às {{date_format($advertisement->created_at,'h:m')}}</small>
                            @endif
                            <hr>
                            <h2>Descrição</h2> <br>
                            <p>{{$advertisement->description}}</p>
                            <a href='#'>Ver descrição completa</a>
                            <hr>
                            <h2>Localização</h2> <br>
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
@push('scripts')
    <script>
        $(document).ready(function () {
            // Get the modal
            var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
            var img = document.getElementById("myImg");
            var modalImg = document.getElementById("img01");
            var captionText = document.getElementById("caption");
            img.onclick = function () {
                modal.style.display = "block";
                modalImg.src = this.src;
                captionText.innerHTML = this.alt;
            }

// Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
            span.onclick = function () {
                modal.style.display = "none";
            }
        });
    </script>
@endpush

