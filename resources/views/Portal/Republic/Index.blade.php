@extends('Portal.TemplateLaravel')
@push('css')

@endpush
@section('content')
    <div class="jumbotron jumbotron-fluid p-4 mb-0">
        <div class='row'>
            <div class='col-sm-12 col-md-3 col-lg-3'>
                <div class='card mb-2 bg-light'>
                    <div class='card-body'>
                        <h3>Moradia para</h3>
                        <form>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                                <label class="form-check-label" for="exampleCheck1">Homens</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                                <label class="form-check-label" for="exampleCheck1">Mulheres</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                                <label class="form-check-label" for="exampleCheck1">Mista</label>
                            </div>
                        </form>
                    </div>
                </div>
                <div class='card mb-2 bg-light'>
                    <div class='card-body '>
                        <h3>Faixa de preço</h3>
                        <form>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                <label class="form-check-label" for="exampleCheck1">R$100,00 - R$200,00</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                <label class="form-check-label" for="exampleCheck1">R$200,00 - R$300,00</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                <label class="form-check-label" for="exampleCheck1">R$300,00 - R$400,00</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                <label class="form-check-label" for="exampleCheck1">R$400,00 - R$500,00</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                <label class="form-check-label" for="exampleCheck1">Acima de R$500,00</label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class='col-sm-12 col-md-9 col-lg-9'>
                <div class="card">
                    <div class="card-body bg-light pb-0">
                        <div class='form-group'>
                            <div class="input-group mb-2">
                                <input class='form-control' type='text' name='search' placeholder='Digite o nome da cidade onde você procura um lugar para alugar'>
                                <div class="input-group-append">
                                    <button type='submit' class='btn btn-danger'>Buscar</button>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <a href='' class='btn-sm btn btn-danger right mr-1'>
                                    <i class="fas fa-sort-amount-up"></i></a>
                                <a href='' class='btn-sm btn btn-danger right'><i class="fas fa-sort-amount-down"></i>
                                </a>
                            </div>
                        </div>
                        <div class="album py-2">
                            <div class="row justify-content-center mb-2">
                                @if(isset($republics))
                                    @foreach($republics as $republic)
                                        <div class='card m-1 border-danger'>
                                            <img class="card-img-top" style='width: 260px; height: 180px' src="{{$republic->image}}" alt="Card image cap">
                                            <div class='card-body p-2 text-center' style='width: 260px; '>
                                                <small class='text-danger float-left font-weight-bold'>
                                                    <strong><i class="fas fa-money-bill"></i> R$ 350,00 por mês</strong>
                                                </small>
                                                <br>
                                                <div class="col-12 text-truncate text-left p-0 mb-2">
                                                   <h5><strong>{{$republic->name}}</strong></h5>
                                                </div>
                                                <p class='text-muted text-left'>{!! \Illuminate\Support\Str::limit($republic->description, 90) !!}</p>
                                                <div class='row justify-content-md-center text-center '>
                                                    <div class='col-4'>
                                                        @if($republic->type_id == 1)
                                                            <i class="fas fa-male"></i><br>
                                                            <small>Homens</small>
                                                        @elseif($republic->type_id == 2)
                                                            <i class="fas fa-female"></i><br>
                                                            <small>Mulheres</small>
                                                        @else
                                                            <i class="fas fa-male"></i><i class="fas fa-female"></i></i>
                                                            <br>
                                                            <small>Mista</small>
                                                        @endif
                                                    </div>
                                                    <div class='col-4'>
                                                        {{$republic->qtdVacancies}}<br>
                                                        <small>Vagas</small>
                                                    </div>
                                                    <div class='col-4'>
                                                        {{$republic->qtdMembers}}<br>
                                                        <small>Membros</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href='#' class='btn btn-sm btn-danger m-2'>Visualizar</a>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            {{--{{$republics->render()}}--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

