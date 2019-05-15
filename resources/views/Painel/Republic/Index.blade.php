{{--@extends('layouts.app')--}}
@extends('layouts.Painel.LayoutFull')

@section('content')
    @if(isset($user->republic))
        <div class='card-deck'>
            <div class="card">
                <div class="card-header bg-nav text-white">Sua República</div>
                <div class="card-body">
                    <strong>Nome: </strong> {{$republic->name}}<br>
                    <strong>Email:</strong> {{$republic->email}}<br>
                    <strong>Descrição:</strong> {{$republic->description}}<br>
                    <strong>Quantidade Membros:</strong> {{$republic->qtdMembers}}<br>
                    <strong>Quantidade de Vagas:</strong> {{$republic->qtdVacancies}}<br>
                    <strong>Endereço:</strong> {{$republic->street}}, {{$republic->number}}<br>
                    <strong>Bairro:</strong> {{$republic->neighborhood}}<br>
                    <strong>Cep:</strong> {{$republic->cep}}<br>
                    <strong>Cidade:</strong> {{$republic->city}}<br>
                    <strong>Estado: </strong>{{$republic->state}}<br>
                    <strong>Gênero:</strong> {{$republic->type->title}}<br>
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
            <div class='card'>
                <div class='card-header bg-nav text-white'>Membros
                </div>
                <div class='card-body'>
                    <div class='table-responsive'>
                        <table class="table table-bordered table-hover table-striped text-center">
                            <thead>
                                <tr>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($republic->user as $user)
                                    <tr class='text-center'>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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
