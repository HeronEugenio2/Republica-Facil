{{--@extends('layouts.app')--}}
@extends('layouts.Painel.LayoutFull')

@section('content')
    <div class="card">
        <div class="card-header bg-nav text-white">Dados da República</div>
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <img src="{{$republic->image}}" style="width: 350px; height: auto" alt="" class="mb-4"><br>
                </div>
                <div class="col-6">
                    <strong>Nome: </strong> {{$republic->name}}<br> <strong>Email:</strong> {{$republic->email}}<br>
                    <strong>Descrição:</strong> {{$republic->description}}<br>
                    <strong>Quantidade Membros:</strong> {{$republic->qtdMembers}}<br>
                    <strong>Quantidade de Vagas:</strong> {{$republic->qtdVacancies}}<br>
                    <strong>Endereço:</strong> {{$republic->street}}, {{$republic->number}}<br>
                    <strong>Bairro:</strong> {{$republic->neighborhood}}<br> <strong>Cep:</strong> {{$republic->cep}}
                    <br> <strong>Cidade:</strong> {{$republic->city}}<br> <strong>Estado: </strong>{{$republic->state}}
                    <br> <strong>Gênero:</strong> {{$republic->type->title}}<br> <br>
                    <strong>Preço:</strong> R$ {{money_format('%.2n' ,$republic->value)}}<br>
                    <div class='mt-4'>
                        @if($republic->active_flag == 0)
                            <h2>
                                <span class="badge badge-warning px-4"
                                      value='{{$republic->active_flag}}'>Em Análise</span>
                            </h2>
                        @else
                            <h2>
                                <span class="text-success" value='{{$republic->active_flag}}'>Ativa <i
                                        class="fas fa-check"></i></span>
                            </h2>
                        @endif
                    </div>
                </div>
            </div>
            <hr>
            <h2>Anúncios</h2>
            <div class="d-flex justify-content-around">
                @foreach($republic->user as $user)
                    @foreach($user->advertisements as $advertisement)
                        <div class="w3-border-dark-gray border p-2 m-2">
                            <div class="">
                                <h4>{{$advertisement->title}}</h4>
                            </div>
                            <div class="">
                                <img src="{{$advertisement->image}}" alt="" style="width: 80px; height: 80px">
                            </div>
                            <div class=""><small>{{$user->name}}</small></div>
                        </div>
                    @endforeach
                @endforeach
            </div>

        </div>
    </div>

@endsection
