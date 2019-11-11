@extends('layouts.Painel.LayoutFull')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="p-4 mb-2 alert alert-primary w-100">
                <h1>CONTROLE DE DESPESAS</h1>
                <div class="row">
                    <div class="col-sm-12 col-lg-6 col-md-6 mb-4">
                        <h3>gaste de forma mais consciente, investindo menos em trivialidades e mais no que realmente
                            importa para você.</h3>
                        <button type="button" class="btn btn-primary mb-2" data-toggle="modal"
                                data-target="#modalSpent">Adicionar Gasto <i class="fas fa-angle-double-right"></i>
                        </button>
                        <button id="btnExtract" type="button" class="btn btn-primary mb-2" data-toggle="modal"
                                data-target="#modalExtract"><i class="fas fa-history"></i> Extrato de contas
                        </button>
                        <!-- Botão para acionar modal -->
                        <button id="closeMonth" data-result="{{$result}}" data-republic="{{$republic->id}}"
                                data-user="{{auth()->user()->id}}" type="button" class="btn btn-primary mb-2"
                                data-toggle="modal" data-target="#modalSpentResult">
                            <i class="far fa-check-circle"></i> Fechar Mês
                        </button>
                        @if($result>0)
                            <div class="w-100 bg-success mt-4 p-2 rounded ">
                                <h2 class='text-white display-4 text-center mb-0'>À Receber
                                    R${{number_format($result, 2, ',', ' ')}}</h2>
                            </div>
                        @else
                            <div class="w-100 bg-danger mt-4 rounded p-2">
                                <h2 class='text-white display-4 text-center  mb-0'>À Pagar
                                    R${{number_format($result, 2, ',', ' ')}}</h2>
                            </div>
                        @endif
                        <div class="mt-4 mb-4">
                            <strong class='float-right display-3 '>Despesa total:
                                R${{number_format($spentsTotal, 2, ',', ' ')}}</strong>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-6 col-md-6 text-center">
                        <img
                            src="https://cloud.google.com/images/pricing/calculator.png?hl=pt-br"
                            class="img-fluid">
                    </div>


                    <div class="col-sm-12 col-lg-12 col-md-12 text-center">

                        <div class="my-2">
                            <canvas id="myChart" width="100%" height='31px'></canvas>
                        </div>
                    </div>
                </div>
            </div>
            @if($republic != null)
                @if(count($spents)>0)
                    <div class='table-responsive my-2 rounded'>
                        <table class="table table-bordered table-hover table-sm table-striped text-center">
                            <thead>
                            <tr>
                                <th scope="col">Data</th>
                                <th scope="col">Descrição</th>
                                <th scope="col">Valor</th>
                                <th scope="col">Membro</th>
                                <th scope="col">Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($spents as $spent)
                                <tr class='text-center'>
                                    <td class="align-middle">{{date('d/m/Y', strtotime($spent->dateSpent))}}</td>
                                    <td class="align-middle">{{$spent->description}}</td>
                                    <td class="align-middle">R$ {{number_format($spent->value,2,',', '.')}}</td>
                                    <td class="align-middle">
                                        @if($spent->user_id!=null)
                                            <img class="mr-2" src="{{$spent->user->image}}"
                                                 style="width: 32px; height: 32px; border-radius: 50%">
                                        @else
                                            Todos
                                        @endif
                                    </td>
                                    <td class="align-middle">
                                        <form method="POST"
                                              action="{{route('painel.spent.destroy',$spent->id) }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <div class="btn-group-vertical">
                                                @if($spent->user_id == auth()->user()->id || $spent->user_id == null)
                                                    <button class='btn btn-danger btn-sm' type="submit"><i
                                                            class="fas fa-trash-alt"></i></button>
                                                @else
                                                    <button class='btn btn-danger btn-sm' type="submit" disabled><i
                                                            class="fas fa-trash-alt"></i></button>
                                                @endif
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            <td colspan='3'><strong>Total</strong></td>
                            <td colspan='2'><strong>R$ {{number_format($spentsTotal,2,',', '.')}}</strong></td>
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
    <div class="card">
        <div class="card-body">
            <div class="p-4 mb-2 alert bg-green w-100">
                <h1 class="text-white">CRÉDITO PESSOAL NA REPÚBLICA</h1>
                <div class="row mb-4">
                    <div class="col-sm-12 col-lg-6 col-md-6 mb-4">
                        <h3 class="text-white">Adicione compras feitas por você que devem ser divididas entre
                            todos.</h3>

                        <!-- Botão para acionar modal -->
                        <button id="newDebit" data-user="{{auth()->user()->id}}" type="button"
                                class="btn btn-outline-white btn-lg mt-2" data-toggle="modal" data-target="#modalDebit">
                            Adicionar Crédito <i class="fas fa-angle-double-right"></i>
                        </button>
                        <div class="text-white">
                            <h2 class='float-right text-white display-3'>
                                R$ {{number_format($spentsIndividual, 2, ',', ' ')}}</h2>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-6 col-md-6 text-center">
                        <img
                            src="https://cdn.pixabay.com/photo/2016/09/16/09/21/money-1673582_960_720.png"
                            class="img-fluid"
                            style="width: 200px;">
                    </div>
                </div>
                <div class="my-2">
                    @if(count($myDebits)>0)
                        <div class='table-responsive rounded'>
                            <table class="table table-bordered bg-gradient-white table-hover table-sm text-center">
                                <thead>
                                <tr>
                                    <th scope="col">Data</th>
                                    <th scope="col">Descrição</th>
                                    <th scope="col">Valor</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($myDebits as $myDebit)
                                    <tr class='text-center'>
                                        <td>{{$myDebit->month}}/{{$myDebit->year}}</td>
                                        <td>{{$myDebit->description}}</td>
                                        <td>R$ {{number_format($myDebit->value,2,',', '.')}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="modalDebit" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="TituloModalCentralizado">Adicionar Débito</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="teste">
                        <form id="logout-form" method="POST"
                              action="{{ route('painel.spent.store', ['republic'=>$republic->id]) }}">
                            @csrf
                            <input type='hidden' name='republic_id' value='{{$republic->id}}'>
                            <div id='spent' class="form-group col-12 p-0">
                                <label for="inputDescription">Descrição</label>
                                <input id="inputDescription" name='description' type="text" class="form-control"
                                       aria-describedby="descriptionHelp" placeholder="Ex: Produtos de limpeza"
                                       style='width: 100%'
                                       required>
                                <small id="descriptionHelp" class="form-text text-muted">Insira descrição do gasto.
                                </small>
                            </div>
                            <div class='row'>
                                <div id='spentData' class="form-group col-md-4 col-lg-4 col-sm-12">
                                    <label for="inputSpent">Dia</label>
                                    <input id="inputSpent" name='dateSpent' type="date" class="form-control"
                                           aria-describedby="spentHelp" placeholder="12/05/2019" style='width: 100%'
                                           required>
                                    <small id="spentHelp" class="form-text text-muted">Data do débito.
                                    </small>
                                </div>
                                <div id='spentValue' class="form-group col-md-4 col-lg-4 col-sm-12">
                                    <label for="inputValue">Valor</label>
                                    <input name='value' type='text' class="form-control" id='valueVirgula'
                                           style='width: 100%' required>
                                </div>
                                @if(auth()->user()->republic != null)
                                    <div class="form-group col-md-4 col-lg-4 col-sm-12">
                                        <label>Membro</label>
                                        <select class="form-control" style='width: 100%' name='user_id'>
                                            @foreach(auth()->user()->republic->user as $user)
                                                <option value='{{$user->id}}'>{{$user->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                            </div>
                            <input type="hidden" value="1" name="buy">
                            <button id='save' type="submit" class="btn btn-success"><i class="fas fa-save mr-2"></i>Salvar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalExtract" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="TituloModalCentralizado">Extrato de Contas</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="year col">
                            <label for="">Ano:</label>
                            <select name="selectYear" id="selectYear" data-year="valueYear" class="form-control"
                                    style='width: 100%' required>
                                <option value="0">Selecione</option>
                                <option value="2019">2019</option>
                                <option value="2018">2018</option>
                                <option value="2017">2017</option>
                            </select>
                        </div>
                        <div class="month col">
                            <label for="">Mês:</label>
                            <select name="selectMonth" id="selectMonth" data-month="valueMonth" class="form-control"
                                    style='width: 100%'>
                                <option value="0">Selecione</option>
                                <option value="1">Janeiro</option>
                                <option value="2">Fevereiro</option>
                                <option value="3">Março</option>
                                <option value="4">Abril</option>
                                <option value="5">Maio</option>
                                <option value="6">Junho</option>
                                <option value="7">Julho</option>
                                <option value="8">Agosto</option>
                                <option value="9">Setembro</option>
                                <option value="10">Outubro</option>
                                <option value="11">Novembro</option>
                                <option value="12">Dezembro</option>
                            </select>
                        </div>
                    </div>
                    <button id="btnSearch" class="btn btn-success my-2" data-user="{{auth()->user()->id}}"
                            data-republic="{{$republic->id}}">Buscar
                    </button>
                    <div class="listSpentsHtml my-2"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalSpent" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="TituloModalCentralizado">Novo Gasto</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="logout-form" method="POST"
                          action="{{ route('painel.spent.store', ['republic'=>$republic->id]) }}">
                        @csrf
                        <input type='hidden' id="republic_id" name='republic_id' value='{{$republic->id}}'>
                        <div id='spent' class="form-group col-12 p-0">
                            <label for="inputDescription">Descrição</label>
                            <input id="inputDescription" name='description' type="text" class="form-control"
                                   aria-describedby="descriptionHelp" placeholder="Ex: Produtos de limpeza"
                                   style='width: 100%'
                                   required>
                            <small id="descriptionHelp" class="form-text text-muted">Insira descrição do gasto.
                            </small>
                        </div>
                        <div class='row'>
                            <div id='spentDataVencimento' class="form-group col-md-6 col-lg-6 col-sm-12">
                                <label for="inputSpent">Vencimento</label>
                                <input id="inputSpent" name='dateSpent' type="date" class="form-control"
                                       aria-describedby="spentHelp" placeholder="12/05/2019" style='width: 100%'>
                                <small id="spentHelp" class="form-text text-muted">Data de vencimento.
                                </small>
                            </div>
                            <div id='spentValue' class="form-group col-md-6 col-lg-6 col-sm-12">
                                <label for="inputValue">Valor</label>
                                <input name='value' type='text' class="form-control" id='valueVirgula1'
                                       style='width: 100%'>
                            </div>
                        </div>
                        <button id='save1' type="submit" class="btn btn-success"><i class="fas fa-save mr-2"></i>Salvar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modalSpentResult" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="    border: outset;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Fechar mês</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <h3>Seu saldo:</h3>
                    <h1 class="{{($result > 0) ? 'text-success' : 'text-danger'}}">
                        R${{number_format($result, 2, ',', ' ')}}</h1>
                    <div class="mt-2" id="contentClose"></div>
                </div>
                <div class="modal-footer">
                    <button id="btnConfirm" type="button" class="btn btn-success" data-dismiss="modal">Confirmar
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js'></script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
                datasets: [{
                    label: 'Gastos (R$)',
                    data: [
                        {{$value1}},
                        {{$value2}},
                        520,
                        320,
                        {{$value5}},
                        {{$value6}},
                        233,
                        {{$value8}},
                        {{$value9}},
                        {{$value10}},
                        {{$value11}},
                        {{$value12}},
                    ],
                    backgroundColor: [
                        'rgba(20, 86, 193, 0.2)',
                    ],
                    borderColor: [
                        'rgba(20, 86, 193, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
        $(document).ready(function () {
            $("#headerFull").click(function () {
                $("#bodyFull").toggle();
            });
            $("#newDebit").click(function () {
                let user = $('#newDebit').data('user');
                $.ajaxSetup({
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                    method: 'POST',
                    url: '{{ route("painel.debitStore") }}'
                });
                $.ajax({
                    data: {
                        user: user
                    },
                    success: function (data) {
                        // $("#teste").html(data);
                    },
                    error: function (data) {
                        alert('nao veio');
                    }
                });
            });
            $("#closeMonth").click(function () {
                let result = $('#closeMonth').data('result');
                let republic_id = $('#closeMonth').data('republic');
                let user_id = $('#closeMonth').data('user');
                $.ajaxSetup({
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                    method: 'POST',
                    url: '{{ route("painel.spendingResult") }}'
                });
                $.ajax({
                    data: {
                        result: result,
                        republic_id: republic_id,
                        user_id: user_id,
                    },
                    success: function (data) {
                        // $("#teste").html(data);
                        $("#contentClose").html(data);
                    },
                    error: function (data) {
                        alert('nao veio');
                    }
                });
            });
            $("#btnConfirm").click(function () {
                let result = $('#closeMonth').data('result');
                let republic_id = $('#closeMonth').data('republic');
                let user_id = $('#closeMonth').data('user');
                $.ajaxSetup({
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                    method: 'POST',
                    url: '{{ route("painel.spentHistoryStore") }}'
                });
                $.ajax({
                    data: {
                        result: result,
                        republic_id: republic_id,
                        user_id: user_id,
                    },
                    success: function (data) {
                        location.reload();
                    },
                    error: function (data) {
                        alert('nao veio');
                    }
                });
            });
            $("#btnSearch").click(function () {
                let year = $("#selectYear").val();
                let month = $("#selectMonth").val();
                let republic_id = $('#btnSearch').data('republic');
                let user_id = $('#btnSearch').data('user');
                $.ajaxSetup({
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                    method: 'POST',
                    url: '{{ route("painel.extractList") }}'
                });
                $.ajax({
                    data: {
                        year: year,
                        month: month,
                        republic_id: republic_id,
                        user_id: user_id,
                    },
                    success: function (data) {
                        $(".listSpentsHtml").html(data);
                    },
                    error: function (data) {
                        alert('Selecione Ano e Mês');
                    }
                });
            });
            $('#valueVirgula').mask('#.##0,00', {reverse: true});
            $('#valueVirgula1').mask('#.##0,00', {reverse: true});
        });
    </script>
@endpush
