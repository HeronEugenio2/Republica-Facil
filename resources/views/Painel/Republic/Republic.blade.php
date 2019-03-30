{{--@extends('layouts.app')--}}
@extends('layouts.Painel.LayoutFull')

@section('content')
    @if(isset($republic))
        <div class="card">
            <div class="card-header">Sua República</div>
            <div class="card-body">
                <div class='row '>
                    <div class='mb-3 col-sm-12 col-md-6 col-lg-6'>
                        <h1>{{$republic->name}}</h1>
                        <div class='row'>
                            <div class='col-md-7 col-lg-4 col-sm-12'><strong>Email:</strong></div>
                            <div class='col-md-5 col-lg-8 col-sm-12'> {{$republic->email}}</div>
                            <div class='col-md-7 col-lg-4 col-sm-12'><strong>Description:</strong></div>
                            <div class='col-md-5 col-lg-8 col-sm-12'> {{$republic->description}}</div>
                            <div class='col-md-7 col-lg-4 col-sm-12'><strong>Membros:</strong></div>
                            <div class='col-md-5 col-lg-8 col-sm-12'> {{$republic->qtdMembers}}</div>
                            <div class='col-md-7 col-lg-4 col-sm-12'><strong>Vagas:</strong></div>
                            <div class='col-md-5 col-lg-8 col-sm-12'> {{$republic->qtdVacancies}}</div>
                            <div class='col-md-7 col-lg-4 col-sm-12'><strong>Tipo:</strong></div>
                            <div class='col-md-5 col-lg-8 col-sm-12'> {{$republic->type->title}}</div>
                        </div>
                    </div>
                    <div class='mb-3 col-sm-12 col-md-6 col-lg-6'>
                        <h1>Endereço</h1>
                        <div class='row'>
                            <div class='col-md-6 col-lg-3 col-sm-12'><strong>Rua:</strong></div>
                            <div class='col-md-6 col-lg-8 col-sm-12'>{{$republic->street}}</div>
                            <div class='col-md-6 col-lg-3 col-sm-12'><strong>Número:</strong></div>
                            <div class='col-md-6 col-lg-8 col-sm-12'>{{$republic->number}}</div>
                            <div class='col-md-6 col-lg-3 col-sm-12'><strong>Bairro:</strong></div>
                            <div class='col-md-6 col-lg-8 col-sm-12'>{{$republic->neighborhood}}</div>
                            <div class='col-md-6 col-lg-3 col-sm-12'><strong>Cidade:</strong></div>
                            <div class='col-md-6 col-lg-8 col-sm-12'>{{$republic->city}}</div>
                            <div class='col-md-6 col-lg-3 col-sm-12'><strong>Estado:</strong></div>
                            <div class='col-md-6 col-lg-8 col-sm-12'>{{$republic->state}}</div>
                            <div class='col-md-6 col-lg-3 col-sm-12'><strong>Cep:</strong></div>
                            <div class='col-md-6 col-lg-8 col-sm-12'>{{$republic->cep}}</div>
                            <br>
                        </div>
                    </div>
                    <a href="{{route('painel.republic.edit', ['id'=>$republic->id])}}" class="btn btn-primary col-sm-12 col-md-4 col-lg-2">Editar</a>
                    <form action="{{ route('painel.republic.destroy', ['id'=>$republic->id]) }}" method="post">
                        <input class="btn btn-danger" type="submit" value="Excluir República"/>
                        {!! method_field('delete') !!}
                        {!! csrf_field() !!}
                    </form>
                </div>
            </div>
        </div>
        <div class='card-deck'>
            <div class='card'>
                <div class='card-header'>teste</div>
                <div class='card-body'></div>
            </div>
            <div class='card '>
                <div class='card-header'>teste</div>
                <div class='card-body'></div>
            </div>
        </div>
    @else
        <div class="alert alert-primary">
            <h2><i class="fas fa-exclamation-triangle"></i> Olá {{ Auth::user()->name }} !</h2>
            Para cadastrar sua primeira república clique no botão abaixo.
            <hr>
            <a href="{{route('painel.republic.create')}}" class="btn btn-primary">Cadastrar República</a>
        </div>
    @endif
@endsection
