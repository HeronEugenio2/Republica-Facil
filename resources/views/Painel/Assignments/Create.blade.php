@extends('layouts.Painel.LayoutFull')

@section('content')
    <div class='card'>
        <div class='card-header bg-nav text-white'>Criar Tarefa</div>
        <div class='card-body'>
            <form id="logout-form" action="{{ route('painel.assignment.store') }}" method="POST">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-group">
                    <label>Título</label>
                    <input type="text" class="form-control" placeholder="Título da tarefa" name="name"
                           style='width: 100%' required>
                </div>
                <div class="form-group">
                    <label>Descrição</label>
                    <textarea id="inputDescription" name='description' type="text" class="form-control"
                              placeholder="Ex: Lavar banheiro e limpar janelas" rows='7' style='width: 100%'></textarea>
                </div>
                <div class='row'>
                    <div class="form-group col-md-4 col-lg-4 col-sm-12">
                        <label>Data Início</label>
                        <input type="text" class="form-control" name="date_start" id="date-start" style='width: 100%'
                               required>
                    </div>
                    <div class="form-group col-md-4 col-lg-4 col-sm-12">
                        <label>Data Fim</label>
                        <input type="text" class="form-control" id="date_end" name="date_end" style='width: 100%'>
                    </div>
                    <div class="form-group col-md-4 col-lg-4 col-sm-12">
                        <label>Membros</label>
                        <select name="user" class="form-control" style='width: 100%' required>
                            <option>Selecione</option>
                            @foreach($users as  $user)
                                <option value='{{\Vinkla\Hashids\Facades\Hashids::encode($user->id)}}'>{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-success"><i class="fas fa-save mr-2"></i>
                    Salvar
                </button>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{asset('js/global/jquery.maskinput.js')}}"></script>
    <script src="{{asset('js/Models/Assignments/assignments.js')}}"></script>
@endpush