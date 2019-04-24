@extends('layouts.Painel.LayoutFull')

@section('content')
    <div class='card'>
        <div class='card-header bg-nav text-white'>Tarefas</div>
        <div class='card-body'>
            <a href="{{route('painel.assignment.create')}}" class="btn btn-success mb-2">
                <i class="fas fa-plus-circle"></i> Nova Tarefa
            </a>
            <hr>
            @if(isset($Spents))

            @else
                <div class='alert alert-primary'>
                    Não possui tarefas!
                </div>
            @endif
        </div>
    </div>

@endsection
