@extends('layouts.Painel.LayoutFull')

@section('content')
    <div class='card'>
        <div class='card-header bg-nav text-white'>Criar Tarefa</div>
        <div class='card-body'>
            <form id="logout-form" method="POST"
                  action="{{ route('painel.assignment.update', ['assignment'=>$assignment->id]) }}">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label>Título</label>
                    <input type="text" class="form-control" placeholder="Título da tarefa"
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
                        <input type="text" class="form-control" id="date-start" style='width: 100%'
                               required>
                    </div>
                    <div class="form-group col-md-4 col-lg-4 col-sm-12">
                        <label>Data Fim</label>
                        <input type="text" class="form-control" id="date-end" style='width: 100%' required>
                    </div>
                    <div class="form-group col-md-4 col-lg-4 col-sm-12">
                        <label>Membro</label>
                        <select class="form-control" style='width: 100%' required>
                            <option>Selelcione</option>
                            @foreach($users as $id => $user)
                                <option value='{{$id}}'>{{$user->name}}</option>
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

@push('scripts')
    <script src="{{asset('js/global/jquery.maskinput.js')}}"></script>
    <script src="{{asset('js/Models/Assignments/assignments.js')}}"></script>
@endpush