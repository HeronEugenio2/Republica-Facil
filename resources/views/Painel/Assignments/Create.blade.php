@extends('layouts.Painel.LayoutFull')

@section('content')
    <div class='card'>
        <div class='card-header bg-nav text-white'>Criar Tarefa</div>
        <div class='card-body'>
            @if(isset($assignment))
                <form id="logout-form" method="POST" action="{{ route('painel.assignment.update', ['assignment'=>$assignment->id]) }}">
                    {{method_field('PUT')}}
                    @else
                        <form id="logout-form" action="{{ route('painel.assignment.store') }}" method="POST">
                            @endif
                            @csrf
                            <div class="form-group">
                                <label>Título</label>
                                <input type="text" class="form-control" placeholder="Título da tarefa" style='width: 100%' required>
                            </div>
                            <div class="form-group">
                                <label>Descrição</label>
                                <textarea id="inputDescription" name='description' value='{{isset($republic)?$republic->description:old('description')??''}}' type="text" class="form-control"
                                          placeholder="Ex: Lavar banheiro e limpar janelas"
                                          rows='7' style='width: 100%'></textarea>
                                {{--<input type="text" class="form-control" placeholder="Ex: Lavar banheiro e limpar janelas" style='width: 100%' required>--}}
                            </div>
                            <div class='row'>
                                <div class="form-group col-md-4 col-lg-4 col-sm-12">
                                    <label>Data Início</label>
                                    <input type="date" class="form-control" style='width: 100%' required>
                                </div>
                                <div class="form-group col-md-4 col-lg-4 col-sm-12">
                                    <label>Data Fim</label>
                                    <input type="date" class="form-control" style='width: 100%' required>
                                </div>
                                <div class="form-group col-md-4 col-lg-4 col-sm-12">
                                    <label>Membro</label>
                                    <select class="form-control" style='width: 100%' required>
                                        <option>Selelcione</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success"><i class="fas fa-save mr-2"></i>Salvar
                            </button>
                        </form>
        </div>
    </div>
@endsection
