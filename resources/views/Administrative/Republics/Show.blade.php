{{--@extends('layouts.app')--}}
@extends('layouts.Painel.LayoutFull')

@section('content')
    <div class="card">
        <div class="card-header bg-nav text-white">Sua República</div>
        <div class="card-body">
            <div class='mb-4'>
                @if($republic->active_flag == 0)
                    <h2>
                        <span class="badge badge-warning px-4" value='{{$republic->active_flag}}'>Em Análise</span>
                    </h2>
                @else
                    <h2>
                        <span class="text-success" value='{{$republic->active_flag}}'>Ativa <i class="fas fa-check"></i></span>
                    </h2>
                @endif
            </div>
            <strong>Nome: </strong> {{$republic->name}}<br> <strong>Email:</strong> {{$republic->email}}<br>
            <strong>Descrição:</strong> {{$republic->description}}<br>
            <strong>Quantidade Membros:</strong> {{$republic->qtdMembers}}<br>
            <strong>Quantidade de Vagas:</strong> {{$republic->qtdVacancies}}<br>
            <strong>Endereço:</strong> {{$republic->street}}, {{$republic->number}}<br>
            <strong>Bairro:</strong> {{$republic->neighborhood}}<br> <strong>Cep:</strong> {{$republic->cep}}
            <br> <strong>Cidade:</strong> {{$republic->city}}<br> <strong>Estado: </strong>{{$republic->state}}
            <br> <strong>Gênero:</strong> {{$republic->type->title}}<br> <br>
            <strong>Preço:</strong> R$ {{money_format('%.2n' ,$republic->value)}}<br>
        </div>
    </div>

@endsection
