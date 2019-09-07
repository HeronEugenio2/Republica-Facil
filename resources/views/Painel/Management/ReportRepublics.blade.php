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
                                <th scope="col">Tipo</th>
                                <th scope="col">Ativar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($republics as $republic)
                                <tr class='text-center'>
                                    <td>{{$republic->name}}</td>
                                    <td>{{$republic->email}}</td>
                                    <td>{{$republic->type->title}}</td>
                                    <td>
                                        <input type='checkbox' id='active_flag' name='active_flag'>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-primary col-md-6 col-lg-4 col-sm-12">
            <h2><i class="fas fa-exclamation-triangle"></i> Olá usuário {{ Auth::user()->name }} !</h2>
            Ainda não existem epúblicas cadastradas na plataforma.
        </div>
    @endif
@endsection
