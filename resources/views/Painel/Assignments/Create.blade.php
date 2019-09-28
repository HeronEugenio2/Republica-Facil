@extends('layouts.Painel.LayoutFull')

@section('content')
    <div class='card'>
        <div class='card-header bg-nav text-white'>Criar Tarefa</div>
        <div class='card-body'>
            <form id="logout-form" method="POST"
                  action="{{ isset($assignment) ? route('painel.assignment.update', ['assignment'=>$assignment->id]) : route('painel.assignment.store') }}">
                @if(isset($assignment))
                    {{method_field('PUT')}}
                @endif
                @csrf
                <input type="hidden" value="0" name="situation">
                <input type="hidden" value="{{auth()->user()->republic->id}}" name="republic_id">
                <div class="form-group">
                    <label>Título</label>
                    <input type="text" name="title" class="form-control" placeholder="Título da tarefa"
                           style='width: 100%' required>
                </div>
                <div class="form-group">
                    <label>Descrição</label>
                    <textarea id="inputDescription" name='description'
                              value='{{isset($republic)?$republic->description:old('description')??''}}'
                              type="text" class="form-control"
                              placeholder="Ex: Lavar banheiro e limpar janelas"
                              rows='7' style='width: 100%'></textarea>
                </div>
                <div class='row'>
                    <div class="form-group col-md-4 col-lg-4 col-sm-12">
                        <label>Data Início</label>
                        <input type="date" name="start" class="form-control" style='width: 100%' required>
                    </div>
                    <div class="form-group col-md-4 col-lg-4 col-sm-12">
                        <label>Data Fim</label>
                        <input type="date" name="end" class="form-control" style='width: 100%' required>
                    </div>
                    <div class="form-group col-md-4 col-lg-4 col-sm-12">
                        <label>Membro</label>
                        <select class="form-control" name="user_id" style='width: 100%' required>
                            <option>Selelcione</option>
                            @foreach($users as $user)
                                <option value='{{$user->id}}'>{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-success"><i class="fas fa-save mr-2"></i>Salvar
                </button>
            </form>
        </div>
    </div>
@endsection
