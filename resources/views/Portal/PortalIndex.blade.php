@extends('layouts.Portal.LayoutFull')
@push('css')

@endpush
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Repúblicas</div>
            <div class="card-body">
                <div class='table-responsive'>
                    <table class="table table-bordered table-hover table-striped text-center">
                        <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Email</th>
                                <th scope="col">Vagas</th>
                                <th scope="col">Membros</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($republics as $republic)
                                <tr class='text-center'>
                                    <td>{{$republic->name}}</td>
                                    <td>{{$republic->email}}</td>
                                    <td>{{$republic->qtdVacancies}}</td>
                                    <td>{{$republic->qtdMembers}}</td>
                                    <td>{{$republic->type->title}}</td>
                                    <td>
                                        <a href='#' class='btn btn-primary'>
                                            <small>Entrar em Contato</small>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
