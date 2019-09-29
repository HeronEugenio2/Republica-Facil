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
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Início</th>
                            <th scope="col">Fim</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Membro</th>
                            <th class="text-center" scope="col">Status</th>
                            <th class="text-center" scope="col">Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($republicAssignmets as $assignmet )
                            <tr>
                                <td>{{$assignmet->start}}</td>
                                <td>{{$assignmet->end}}</td>
                                <td>{{$assignmet->description}}</td>
                                <td>{{$assignmet->user->name}}</td>
                                <td width="1%">
                                    <form action="{{route('painel.conclude')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="assignmet_id" value="{{$assignmet->id}}">
                                        @if($assignmet->situation == 0)
                                            <button type='submit' class='btn btn-sm btn-warning text-white'
                                                    name='situationFlag'
                                                    value='1'>Pendente
                                            </button>
                                        @else
                                            <button type='submit' class='btn btn-sm btn-success text-white'
                                                    name='situationFlag'
                                                    value='0'>Concluída
                                            </button>
                                        @endif
                                    </form>
                                </td>
                                <td width="1%">
                                    <form class="mr-2" method="POST"
                                          action="{{route('painel.assignment.destroy',$assignmet->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <div class="btn-group-vertical">
                                            <button class='btn btn-danger btn-sm' type="submit"><i
                                                    class="fas fa-trash-alt"></i> Excluir
                                            </button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class='alert alert-primary'>
                    Não possui tarefas!
                </div>
            @endif
        </div>
    </div>
@endsection
