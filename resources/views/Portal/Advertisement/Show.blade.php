@extends('Portal.TemplateLaravel')

@section('content')

    <div class="container">
        {{--        <div class="row my-4">--}}
        {{--            <div class="col-md-12">--}}
        {{--                <div class="carousel slide" id="carousel-437692">--}}
        {{--                    <ol class="carousel-indicators">--}}
        {{--                        <li data-slide-to="0" data-target="#carousel-437692" class="active">--}}
        {{--                        </li>--}}
        {{--                        <li data-slide-to="1" data-target="#carousel-437692">--}}
        {{--                        </li>--}}
        {{--                        <li data-slide-to="2" data-target="#carousel-437692">--}}
        {{--                        </li>--}}
        {{--                    </ol>--}}
        {{--                    <div class="carousel-inner">--}}
        {{--                        <div class="carousel-item active">--}}
        {{--                            <img class="d-block w-100" alt="Carousel Bootstrap First"--}}
        {{--                                 src="https://www.layoutit.com/img/sports-q-c-1600-500-1.jpg">--}}
        {{--                            <div class="carousel-caption">--}}
        {{--                                <h4>--}}
        {{--                                    First Thumbnail label--}}
        {{--                                </h4>--}}
        {{--                                <p>--}}
        {{--                                    Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi--}}
        {{--                                    porta--}}
        {{--                                    gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.--}}
        {{--                                </p>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                        <div class="carousel-item">--}}
        {{--                            <img class="d-block w-100" alt="Carousel Bootstrap Second"--}}
        {{--                                 src="https://www.layoutit.com/img/sports-q-c-1600-500-2.jpg">--}}
        {{--                            <div class="carousel-caption">--}}
        {{--                                <h4>--}}
        {{--                                    Second Thumbnail label--}}
        {{--                                </h4>--}}
        {{--                                <p>--}}
        {{--                                    Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi--}}
        {{--                                    porta--}}
        {{--                                    gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.--}}
        {{--                                </p>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                        <div class="carousel-item">--}}
        {{--                            <img class="d-block w-100" alt="Carousel Bootstrap Third"--}}
        {{--                                 src="https://www.layoutit.com/img/sports-q-c-1600-500-3.jpg">--}}
        {{--                            <div class="carousel-caption">--}}
        {{--                                <h4>--}}
        {{--                                    Third Thumbnail label--}}
        {{--                                </h4>--}}
        {{--                                <p>--}}
        {{--                                    Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi--}}
        {{--                                    porta--}}
        {{--                                    gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.--}}
        {{--                                </p>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                    <a class="carousel-control-prev" href="#carousel-437692" data-slide="prev"><span--}}
        {{--                            class="carousel-control-prev-icon"></span> <span class="sr-only">Previous</span></a>--}}
        {{--                    <a class="carousel-control-next" href="#carousel-437692" data-slide="next"><span--}}
        {{--                            class="carousel-control-next-icon"></span> <span class="sr-only">Next</span></a>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        <div class="row">
            <div class="col-md-6">
                <dl>
                    <dt>
                        Descrição
                    </dt>
                    <dd>
                        {{$advertisement->description}}
                    </dd>
                    <dt>
                        Categoria
                    </dt>
                    <dd>
                        {{$advertisement->category->title}}
                    </dd>
                    <hr>
                    <dt>
                        Anunciante
                    </dt>
                    <dd>
                        {{$advertisement->user->name}} <br>
                        ({{$advertisement->user->email}})
                    </dd>
                    <a class="btn btn-success btn-large" href="#"><i class="fab fa-whatsapp"></i> Contato</a>
                </dl>
            </div>
            <div class="col-md-6">
                <div class="jumbotron">
                    <h1>
                        {{$advertisement->title}}
                    </h1>
                    <p>
                        {{$advertisement->description}}
                    </p>
                    <div class="badge badge-primary w-100" style="border-radius: 8px;">
                        <h3 class="text-white"><i class="fas fa-money-bill"></i>
                            R$ {{(money_format('%.2n', $advertisement->value))}}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12  my-2">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" alt="Bootstrap Thumbnail First"
                             src="https://www.layoutit.com/img/people-q-c-600-200-1.jpg">
                        <div class="card-block">
                            <h5 class="card-title">
                                Card title
                            </h5>
                            <p class="card-text">
                                Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta
                                gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                            </p>
                            <p>
                                <a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" alt="Bootstrap Thumbnail Second"
                             src="https://www.layoutit.com/img/city-q-c-600-200-1.jpg">
                        <div class="card-block">
                            <h5 class="card-title">
                                Card title
                            </h5>
                            <p class="card-text">
                                Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta
                                gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                            </p>
                            <p>
                                <a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" alt="Bootstrap Thumbnail Third"
                             src="https://www.layoutit.com/img/sports-q-c-600-200-1.jpg">
                        <div class="card-block">
                            <h5 class="card-title">
                                Card title
                            </h5>
                            <p class="card-text">
                                Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta
                                gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                            </p>
                            <p>
                                <a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--    FOOTER--}}
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
