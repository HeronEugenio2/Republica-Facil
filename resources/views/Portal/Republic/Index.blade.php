@extends('Portal.TemplateLaravel')
@push('css')

@endpush
@section('content')
    <div class="jumbotron jumbotron-fluid p-4 mb-0">
        <div class='row'>
            <div class='col-sm-12 col-md-3 col-lg-3'>
                {{--<form action='{{route('portal.republicSearch')}}' method='POST'>--}}
                <form action=''>
                    <div class='card mb-2 bg-light'>
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
                                <input class="form-check-input chkType" type="radio" name="exampleRadios" value="3" checked>
                                <label class="form-check-label" for="exampleCheck1">Mista</label>
                            </div>
                        </div>
                    </div>
                </form>
                <form action=''>
                    <div class='card mb-2 bg-light'>
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
                                <input class="form-check-input chkValue" type="radio" name="exampleRadios " value="400" checked>
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
                    <a href='#' id='btnFiltro' class='btn btn-danger w-100'>Filtrar</a>
                </form>
            </div>
            <div class='col-sm-12 col-md-9 col-lg-9'>
                <div class="card">
                    <div class="card-body bg-light pb-0">
                        <div class='form-group'>
                            <form id="logout-form" action="{{ route('portal.republicSearch') }}" method="POST">
                                @csrf
                                <div class="input-group mb-2">
                                    <input class='form-control' id='valueSearch' value='{{$value}}' type='text' name='search' placeholder='Digite o nome da cidade onde você procura um lugar para alugar'>
                                    <div class="input-group-append">
                                        <button type='submit' class='btn btn-danger'>Buscar</button>
                                    </div>
                                </div>
                            </form>
                            <div class="d-flex justify-content-end">
                                <a href='' class='btn-sm btn btn-danger right mr-1'>
                                    <i class="fas fa-sort-amount-up"></i></a>
                                <a href='' class='btn-sm btn btn-danger right'><i class="fas fa-sort-amount-down"></i>
                                </a>
                            </div>
                        </div>
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
            $("#btnFiltro").click(function () {
                let type = $('.chkType:checked').val();
                let value = $('.chkValue:checked').val();
                let valueSearch = $('#valueSearch').val();

                console.log(type);
                console.log(value);
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
                        // alert(valueSearch);
                        $('.album').html(response);
                    },
                    error: function (response) {

                    }
                });

            });
        });
    </script>
@endpush
