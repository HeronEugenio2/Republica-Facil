@extends('layouts.Painel.LayoutFull')

@section('content')
    <div class='card'>
        <div class='card-header'>Tarefas</div>
        <div class='card-body'>

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
