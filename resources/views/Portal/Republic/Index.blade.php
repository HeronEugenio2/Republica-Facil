@extends('Portal.TemplateLaravel')
<style>
    .img-house {
        background-image: url("https://images.vexels.com/media/users/3/137219/isolated/preview/c7957303cdaa0425052932035df8b1f1-casa-da-cidade-de-constru----o-by-vexels.png");
        /* background-size: 350px; */
        /* background-image: linear-gradient(0deg, rgb(248, 248, 255), rgba(35, 123, 249, 0.07)), url(/images/mulher.png); */
        background-position: top;
        background-repeat: no-repeat;
        /* height: 200px; */
        padding: 153px;
    }

    .img-house {
        background-image: url({{asset('/images/index-republic-portal.png')}});
        /* background-size: 350px; */
        /* background-image: linear-gradient(0deg, rgb(248, 248, 255), rgba(35, 123, 249, 0.07)), url(/images/mulher.png); */
        background-position: top;
        background-repeat: no-repeat;
        /* height: 200px; */
        padding: 153px;
    }
</style>
@section('content')
    <div class="img-house">

    </div>
    <div class="container-fluid" style="max-width: 800px">
        <div class='form-group'>
            <form id="logout-form" action="{{ route('portal.republicSearch') }}" method="POST">
                @csrf
                <div class="input-group mb-2">
                    <input class='form-control' id='valueSearch' value='{{$value}}' type='text'
                           name='search'
                           placeholder='Digite o nome da cidade onde você procura um lugar para alugar'>
                    <div class="input-group-append">
                        <button type='submit' class='btn btn-danger'>Buscar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="jumbotron jumbotron-fluid p-4 mb-0">
        <div class='row'>
            {{--    filtros--}}
            <div class='col-sm-12 col-md-3 col-lg-3'>
                {{--<form action='{{route('portal.republicSearch')}}' method='POST'>--}}
                <form action=''>
                    <div class='card mb-2 bg-light shadow'>
                        <div class='card-body'>
                            <h3>Moradia para</h3>
                            <div class="form-check">
                                <input class="form-check-input chkType" type="radio" name="exampleRadios" value="1">
                                <label class="form-check-label" for="exampleCheck1">Homens</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input chkType" type="radio" name="exampleRadios" value="2">
                                <label class="form-check-label" for="exampleCheck1">Mulheres</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input chkType" type="radio" name="exampleRadios" value="3"
                                       checked>
                                <label class="form-check-label" for="exampleCheck1">Mista</label>
                            </div>
                        </div>
                    </div>
                </form>
                <form action=''>
                    <div class='card mb-2 bg-light shadow'>
                        <div class='card-body '>
                            <h3>Faixa de preço</h3>
                            <div class="form-check">
                                <input class="form-check-input chkValue" type="radio" name="exampleRadios " value="200">
                                <label class="form-check-label" for="exampleCheck1">R$100,00 - R$200,00</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input chkValue" type="radio" name="exampleRadios " value="300">
                                <label class="form-check-label" for="exampleCheck1">R$200,00 - R$300,00</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input chkValue" type="radio" name="exampleRadios " value="400"
                                       checked>
                                <label class="form-check-label" for="exampleCheck1">R$300,00 - R$400,00</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input chkValue" type="radio" name="exampleRadios " value="500">
                                <label class="form-check-label" for="exampleCheck1">R$400,00 - R$500,00</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input chkValue" type="radio" name="exampleRadios " value="all">
                                <label class="form-check-label" for="exampleCheck1">Acima de R$500,00</label>
                            </div>
                        </div>
                    </div>
                    <a href='#' id='btnFiltro' class='btn btn-danger w-100 mb-2 shadow'>Filtrar</a>
                </form>
            </div>

            <div class='col-sm-12 col-md-9 col-lg-9'>
                <div class="card shadow">
                    <div class="card-body bg-light pb-0">

                        <div class="album py-2">
                            @include('Portal.Republic.IncludeSearch')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            $("#btnFiltro").click(function (e) {
                e.preventDefault();
                let type = $('.chkType:checked').val();
                let value = $('.chkValue:checked').val();
                let valueSearch = $('#valueSearch').val();

                $.ajax({
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                    method: 'POST',
                    url: '{{route('portal.ajaxSearch')}}',
                    data: {
                        value: value,
                        type: type,
                        valueSearch: valueSearch,
                    },
                    success: function (response) {
                        $('.album').html(response);
                    },
                    error: function (response) {

                    }
                });

            });
        });
    </script>
@endpush
