{{--@extends('layouts.app')--}}
@extends('layouts.Painel.LayoutFull')

@section('content')
    @if(isset($user->republic))
        <div class='card-deck'>
            <div class="card">
                <div class="card-header bg-nav text-white">Sua República</div>
                <div class="card-body">
                    {{$republic->name}}<br>
                    {{$republic->email}}<br>
                    {{$republic->description}}<br>
                    {{$republic->qtdMembers}}<br>
                    {{$republic->qtdVacancies}}<br>
                    {{$republic->street}}<br>
                    {{$republic->neighborhood}}<br>
                    {{$republic->cep}}<br>
                    {{$republic->city}}<br>
                    {{$republic->state}}<br>
                    {{$republic->number}}<br>
                    {{$republic->type->title}}<br>
                    <div class='mt-4'>
                        <a href="{{route('painel.republic.edit', $user->republic->id )}}" class="btn btn-primary">Editar</a>
                    </div>
                </div>
            </div>
            <div class='card'>
                <div class='card-header bg-nav text-white'>Membros
                </div>
                <div class='card-body'>
                    <div id='email' class="form-group col-12 p-0">
                        <div class="form-group">
                            <label for="inputEmail">E-mail</label>
                            <input id="inputEmail" name='email' type="email" class="form-control"
                                   aria-describedby="emailHelp" placeholder="Ex: member@gmail.com" style='width: 100%'
                                   required>
                            <small id="emailHelp" class="form-text text-muted">Envie uma confirmação para o email de seu membro.
                            </small>
                        </div>
                    </div>
                    <a href="#" class="btn btn-primary">Enviar Convite</a>
                </div>
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
