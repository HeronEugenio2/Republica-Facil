@extends('layouts.Painel.LayoutFull')

@section('content')
    <div class='card'>
        <div class='card-header bg-nav text-white'>Tarefas</div>
        <div class='card-body'>
            <a href="{{route('painel.assignment.create')}}" class="btn btn-success mb-2">
                <i class="fas fa-plus-circle"></i> Nova Tarefa
            </a>
            <hr>
            @if(!empty($assignments))

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Titulo</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Status</th>
                        <th scope="col">Data Inicio</th>
                        <th scope="col">Data Fim</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($assignments as $assignment)
                        <tr>
                            <th>{{$assignment->name}}</th>
                            <td>{{$assignment->description}}</td>
                            @if($assignment->status_flag)
                                <td>Finalizada</td>
                            @else
                                <td>Em Andamento</td>
                            @endif
                            <td>{{date('d/m/Y', strtotime($assignment->date_start))}}</td>
                            @if($assignment->date_end)
                                <td>{{date('d/m/Y', strtotime($assignment->date_end))}}</td>
                            @else
                                <td>Indefinido</td>
                            @endif
                            <td>

                                <a class="btn btn-primary"
                                        href="{{route('painel.assignment.edit', Hashids::encode($assignment->id))}}">
                                    Editar
                                </a>
                                <form method="POST"
                                      action="{{route('painel.assignment.destroy', Hashids::encode($assignment->id))}}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Excluir</button>
                                </form>

                            </td>
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
