@extends('layouts.Painel.LayoutFull')

@section('content')
    <div class='card'>
        <div class='card-body'>
            <div class="p-4 mb-2 alert alert-primary w-100">
                <h1>ORGANIZE SUA REPÚBLICA</h1>
                <div class="row">
                    <div class="col-sm-12 col-lg-6 col-md-6">
                        <h3>Dividir os papéis e alocar as tarefas é importante para uma boa convivência!</h3>
                        <a href="{{route('painel.assignment.create')}}" class="btn btn-primary mb-2" data-toggle="modal"
                           data-target="#ModalLongoExemplo">
                            Adicionar nova tarefa ao quadro <i class="fas fa-angle-double-right"></i>
                        </a>
                    </div>
                    <div class="col-sm-12 col-lg-6 col-md-6">
                        <img
                            src="https://vereadoraluciananovaes.com.br/wp-content/uploads/2017/11/eixo-trabalho.png"
                            class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class='card'>
        <div class='card-body'>
            <div class="row m-2 justify-content-center">
                @foreach($republicAssignmets as $assignmet )
                    <div class="card shadow border-light border m-2" style="width: 290px">
                        <div class="card-body">
                            <div class="text-center">
                                {{$assignmet->description}}
                            </div>
                            <div class="mt-3">
                                <div class="text-muted mb-2">
                                    <span>{{$assignmet->start}}</span>
                                    <span> até </span>
                                    <span>{{$assignmet->end}}</span>
                                </div>

                            </div>
                        </div>
                        <div class="card-footer">
                            <span class="">
                                @if($assignmet->situation == 0)
                                    <span class="text-warning"><i class="far fa-clock"></i> Pendente</span>
                                @else
                                    <span class="text-success"><i class="fas fa-check"></i> Concluída</span>
                                @endif
                            </span>
                            <div class="mt-2">
                                <div class="mb-2">
                                    <img class="mr-2" src="{{$assignmet->user->image}}"
                                         style="width: 32px; height: 32px; border-radius: 50%">
                                    <span class="text-truncate">
                                        {{$assignmet->user->name}}
                                    </span>
                                </div>
                                <form action="{{route('painel.conclude')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="assignmet_id" value="{{$assignmet->id}}">
                                    @if($assignmet->situation == 0)
                                        <button type='submit' class='btn btn-sm btn-primary w-100 text-white'
                                                name='situationFlag'
                                                value='1'>Alterar Status
                                        </button>
                                    @else
                                        <button type='submit' class='btn btn-sm btn-primary w-100 text-white'
                                                name='situationFlag'
                                                value='0'>Alterar Status
                                        </button>
                                    @endif
                                </form>

                                <div class="mt-2">
                                    @if(auth()->user()->id == $republic->user_id)
                                        <form class="" method="POST"
                                              action="{{route('painel.assignment.destroy',$assignmet->id) }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button class='btn btn-light w-100 btn-sm' type="submit"><i
                                                    class="fas fa-trash-alt"></i> Excluir
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="ModalLongoExemplo" tabindex="-1" role="dialog" aria-labelledby="TituloModalLongoExemplo"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    @include('Painel.Assignments.IncludeCreate')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary">Salvar mudanças</button>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')

@endsection
