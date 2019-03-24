{{--@extends('layouts.app')--}}
@extends('layouts.Painel.LayoutFull')

@section('content')
    @if(count($republics)>0)
        <div class="card">
            <div class="card-header">Sua República</div>
            <div class="card-body">
                <div class='table-responsive'>
                    <table class="table table-bordered table-hover table-striped text-center">
                        <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Email</th>
                                <th scope="col">Vagas</th>
                                <th scope="col">Tipo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($republics as $republic)
                                <tr class='text-center'>
                                    <td>{{$republic->name}}</td>
                                    <td>{{$republic->email}}</td>
                                    <td>{{$republic->qtdVacancies}}</td>
                                    <td>{{$republic->type->title}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-primary col-md-6 col-lg-4 col-sm-12">
            <h2><i class="fas fa-exclamation-triangle"></i> Olá usuário !</h2>
            Para cadastrar sua primeira república clique no botão abaixo.
            <hr>
            <a href="{{route('painel.republic.create')}}" class="btn btn-primary">Cadastrar República</a>
        </div>
    @endif
@endsection
