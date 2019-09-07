@extends('layouts.Painel.LayoutFull')

@section('content')
    <div class='card'>
        <div class='card-header bg-nav text-white'>Tarefas</div>
        <div class='card-body'>
            <a href="{{route('painel.assignment.create')}}" class="btn btn-success mb-2">
                <i class="fas fa-plus-circle"></i> Nova Tarefa
            </a>
            <hr>
            @if(isset($republicAssignmets))
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Início</th>
                        <th scope="col">Fim</th>
                        <th scope="col">Membro</th>
                        <th scope="col">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($republicAssignmets as $assignmet )
                        <tr>
                            <td>{{$assignmet->start}}</td>
                            <td>{{$assignmet->end}}</td>
                            <td>{{$assignmet->user->name}}</td>
                            @if($assignmet->situation == 1)
                                <td><span class="badge badge-warning">Pendente</span></td>
                            @else
                                <td><span class="badge badge-success">Concluída</span></td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <div class='alert alert-primary'>
                    Não possui tarefas!
                </div>
            @endif
        </div>
    </div>

@endsection
