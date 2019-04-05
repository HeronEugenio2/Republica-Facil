@extends('layouts.Painel.LayoutFull')

@section('content')
    <div class='card'>
        <div class='card-header'>Gastos</div>
        <div class='card-body'>
            @if($republic != null)
                <form id="logout-form" method="POST" action="{{ route('painel.spent.store', ['republic'=>$republic->id]) }}">
                    @csrf
                    <input type='hidden' name='republic_id' value='{{$republic->id}}'>
                    <div id='spent' class="form-group col-12 p-0">
                        <label for="inputDescription">Descrição</label>
                        <input id="inputDescription" name='description' type="text" class="form-control"
                               aria-describedby="descriptionHelp" placeholder="Ex: Produtos de limpeza" style='width: 100%'
                               required>
                        <small id="descriptionHelp" class="form-text text-muted">Insira descrição do gasto.
                        </small>
                    </div>
                    <div class='row'>
                        <div id='spentData' class="form-group col-md-4 col-lg-4 col-sm-12">
                            <label for="inputSpent">Dia</label>
                            <input id="inputSpent" name='dateSpent' type="date" class="form-control" aria-describedby="spentHelp" placeholder="12/05/2019" style='width: 100%'>
                            <small id="spentHelp" class="form-text text-muted">Data do débito.
                            </small>
                        </div>
                        <div id='spentValue' class="form-group col-md-4 col-lg-4 col-sm-12">
                            <label for="inputValue">Valor</label>
                            <input id="inputValue" name='value' type="number" class="form-control" aria-describedby="spentHelp" placeholder="" style='width: 100%'>
                        </div>
                        <div id='spentMember' class="form-group col-md-4 col-lg-4 col-sm-12">
                            <label for="inputMember">Membro</label>
                            <input id="inputMember" name='member' type="text" class="form-control" aria-describedby="spentHelp" placeholder="" style='width: 100%'>
                            <small id="spentHelp" class="form-text text-muted">Membro que fez a compra.</small>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success"><i class="fas fa-save mr-2"></i>Novo Gasto</button>
                </form>
                <hr>
                @if(isset($spents))
                    <div class='table-responsive'>
                        <table class="table table-bordered table-hover table-striped text-center">
                            <thead>
                                <tr>
                                    <th scope="col">Data</th>
                                    <th scope="col">Descrição</th>
                                    <th scope="col">Valor</th>
                                    <th scope="col">Membro</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($spents as $spent)
                                    <tr class='text-center'>
                                        <td>{{$spent->dateSpent}}</td>
                                        <td>{{$spent->description}}</td>
                                        <td>{{$spent->value}}</td>
                                        <td>{{$spent->member}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class='alert alert-primary'>
                        Não possui gastos!
                    </div>
                @endif
            @else
                <div class='alert alert-primary'>
                    Você ainda não participa de nenhuma República!
                </div>
            @endif
        </div>
    </div>
@endsection
