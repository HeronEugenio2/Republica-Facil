@extends('layouts.Painel.LayoutFull')

@section('content')
    <div class='card'>
        <div class='card-header'>Gastos</div>
        <div class='card-body'>
            <div id='spent' class="form-group col-12 p-0">
                <label for="inputSpent">Descrição</label>
                <input id="inputSpent" name='spent' type="text" class="form-control"
                       aria-describedby="spentHelp" placeholder="Ex: member@gmail.com" style='width: 100%'
                       required>
                <small id="spentHelp" class="form-text text-muted">Insira descrição do gasto.
                </small>
            </div>
            <div class='row'>
                <div id='spentData' class="form-group col-md-4 col-lg-4 col-sm-12">
                    <label for="inputSpent">Dia</label>
                    <input id="inputSpent" name='spentData' type="date" class="form-control" aria-describedby="spentHelp" placeholder="12/05/2019" style='width: 100%' required>
                    <small id="spentHelp" class="form-text text-muted">Data do débito.
                    </small>
                </div>
                <div id='spentValue' class="form-group col-md-4 col-lg-4 col-sm-12">
                    <label for="inputValue">Valor</label>
                    <input id="inputValue" name='spentValue' type="number" class="form-control" aria-describedby="spentHelp" placeholder="" style='width: 100%' required>
                </div>
                <div id='spentMember' class="form-group col-md-4 col-lg-4 col-sm-12">
                    <label for="inputMember">Membro</label>
                    <input id="inputMember" name='spentMember' type="number" class="form-control" aria-describedby="spentHelp" placeholder="" style='width: 100%' required>
                    <small id="spentHelp" class="form-text text-muted">Membro que fez a compra.</small>
                </div>
            </div>
            <a href="#" class="btn btn-primary">Novo Gasto</a>
            <hr>
            @if(isset($Spents))

            @else
                <div class='alert alert-primary'>
                    Não possui gastos!
                </div>
            @endif
        </div>
    </div>
@endsection
