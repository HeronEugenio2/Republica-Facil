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
                <div class='card-header'>Membros
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
                    <hr>
                    @if(isset($members))
                    @else
                        <div class='alert alert-primary'>
                            Sua república ainda não possui membros !
                        </div>
                    @endif
                </div>
            </div>
            <div class='card '>
                <div class='card-header'>Gastos</div>
                <div class='card-body'>
                    <div id='spent' class="form-group col-12 p-0">
                        <label for="inputSpent">Descrição</label>
                        <input id="inputSpent" name='spent' type="text" class="form-control"
                               aria-describedby="spentHelp" placeholder="Ex: member@gmail.com" style='width: 100%'
                               required>
                        <small id="spentHelp" class="form-text text-muted">Insira descrição do gasto.
                        </small>
                    </div>
                    <div class='row'>
                        <div id='spentData' class="form-group col-6">
                            <label for="inputSpent">Data</label>
                            <input id="inputSpent" name='spentData' type="data" class="form-control" aria-describedby="spentHelp" placeholder="12/05/2019" style='width: 100%' required>
                            <small id="spentHelp" class="form-text text-muted">Data do débito.
                            </small>
                        </div>
                        <div id='spentValue' class="form-group col-6">
                            <label for="inputValue">Valor</label>
                            <input id="inputValue" name='spentValue' type="float" class="form-control" aria-describedby="spentHelp" placeholder="" style='width: 100%' required>
                        </div>
                    </div>
                    <a href="#" class="btn btn-primary">Novo Gasto</a>
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
