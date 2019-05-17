@extends('layouts.Painel.LayoutFull')

@section('content')
    <div id='spentFix' class='card'>
        <div id='headerFix' class='card-header bg-nav text-white'>Gastos Fixos</div>
        <div id='bodyFix' class='card-body collapse'>
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
                        <div id='spentDataVencimento' class="form-group col-md-3 col-lg-3 col-sm-12">
                            <label for="inputSpent">Vencimento</label>
                            <input id="inputSpent" name='dateSpent' type="date" class="form-control" aria-describedby="spentHelp" placeholder="12/05/2019" style='width: 100%'>
                            <small id="spentHelp" class="form-text text-muted">Data de vencimento.
                            </small>
                        </div>
                        <div id='spentData' class="form-group col-md-3 col-lg-3 col-sm-12">
                            <label for="inputSpent">Pagamento</label>
                            <input id="inputSpent" name='dateSpent' type="date" class="form-control" aria-describedby="spentHelp" placeholder="12/05/2019" style='width: 100%'>
                            <small id="spentHelp" class="form-text text-muted">Data do débito.
                            </small>
                        </div>
                        <div id='spentValue' class="form-group col-md-3 col-lg-3 col-sm-12">
                            <label for="inputValue">Valor</label>
                            <input id="inputValue" name='value' type="number" step='0.01' class="form-control" aria-describedby="spentHelp" placeholder="" style='width: 100%'>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success"><i class="fas fa-save mr-2"></i>Salvar</button>
                </form>
            @else
                <div class='alert alert-primary'>
                    Você ainda não participa de nenhuma República!
                </div>
            @endif
        </div>
    </div>
    <div id='spentVariable' class='card'>
        <div id='headerVariable' class='card-header bg-nav text-white c-'>Gastos</div>
        <div id='bodyVariable' class='card-body collapse'>
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
                        @if($republic != null)
                            <div class="form-group col-md-4 col-lg-4 col-sm-12">
                                <label>Membro</label>
                                <select class="form-control" style='width: 100%' name='user_id'>
                                    @foreach($republic->user as $user)
                                        <option value='{{$user->id}}'>{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-success"><i class="fas fa-save mr-2"></i>Salvar</button>
                </form>
            @else
                <div class='alert alert-primary'>
                    Você ainda não participa de nenhuma República!
                </div>
            @endif
        </div>
    </div>
@endsection
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}
@push('scripts')
    <script>
        $(document).ready(function () {
            $("#headerFix").click(function () {
                $("#bodyFix").toggle();
            });
            $("#headerVariable").click(function () {
                $("#bodyVariable").toggle();
            });
        });
    </script>
@endpush
