@extends('layouts.Painel.LayoutFull')

@section('content')
    <div class='card'>
        <div class='card-header bg-nav text-white'>Criar Anúncio</div>
        <div class='card-body'>
            <form id="logout-form" method="POST" action="{{ route('painel.advertisement.store', ['republic'=>$republic->id, 'user'=>$user->id]) }}">
                @csrf
                <input type='hidden' name='republic_id' value='{{$republic->id}}'>
                <input type='hidden' name='republic_id' value='{{$user->id}}'>
                <div id='spent' class="form-group col-12 p-0">
                    <label >Título</label>
                    <input id="inputDescription" name='description' type="text" class="form-control"
                           aria-describedby="descriptionHelp" placeholder="Ex: Produtos de limpeza" style='width: 100%'
                           required>
                    <small id="descriptionHelp" class="form-text text-muted">Insira descrição do gasto.
                    </small>
                </div>
                <div id='spent' class="form-group col-12 p-0">
                    <label>Descrição</label>
                    <input id="inputDescription" name='description' type="text" class="form-control"
                           aria-describedby="descriptionHelp" placeholder="Ex: Produtos de limpeza" style='width: 100%'
                           required>
                    <small id="descriptionHelp" class="form-text text-muted">Insira descrição do gasto.
                    </small>
                </div>
                <div class='row'>
                    <div id='type' class="form-group col-md-4 col-lg-4 col-sm-12">
                        <label for="inputType">Categoria:</label>
                        @if(isset($advCategories))
                            <select name='type_id' class='form-control col' id="inputCategory" required>
                                @foreach($advCategories as $advCategory)
                                    <option value='{{$advCategory->id}}'>{{$advCategory->title}}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                    <div id='adValue' class="form-group col-md-3 col-lg-3 col-sm-12">
                        <label for="inputValue">Valor</label>
                        <input id="inputValue" name='value' type="number" step='0.01' class="form-control" aria-describedby="spentHelp" placeholder="" style='width: 100%'>
                    </div>
                </div>
                <button type="submit" class="btn btn-success"><i class="fas fa-save mr-2"></i>Salvar</button>
            </form>
        </div>
    </div>
@endsection
