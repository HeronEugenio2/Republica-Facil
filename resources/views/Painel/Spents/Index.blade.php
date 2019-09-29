@extends('layouts.Painel.LayoutFull')
@section('content')
    <div class='card-columns'>
        <div class="card text-dark bg-primary" id='managerSpent' style="height: auto;">
            <div class="card-header bg-nav text-white c-">Gerenciador de gastos</div>
            <div class="card-body">
                <h4 class="card-text text-center">ST = (ST/QT)-SI</h4>
                Débito República =
                <strong class='float-right text-danger'>R${{number_format($spentsTotal, 2, ',', ' ')}}</strong>
                <br> Crédito Individual =
                <strong class='float-right text-success'>R${{number_format($spentsIndividual, 2, ',', ' ')}}</strong>
                <br> $media = <strong class='float-right '>R${{number_format($media, 2, ',', ' ')}}</strong>
                <br> Valor dividído entre = <strong class='float-right '>{{$republic->qtdMembers}} membros</strong>
                @if($result>0)
                    <div class="w-100 bg-success mt-4 p-2">
                        <h2 class='text-white display-4 text-center'>CRÉDITO
                            R${{number_format($result, 2, ',', ' ')}}</h2>
                    </div>
                @else
                    <div class="w-100 bg-danger mt-4 p-2">
                        <h2 class='text-white display-4 text-center'>DÉBITO
                            R${{number_format($result, 2, ',', ' ')}}</h2>
                    </div>
                @endif
            </div>
        </div>
        <div class='card' id='spentFull'>
            <div id='headerFull' class='card-header bg-nav text-white'>Gastos</div>
            <div id='bodyFull' class='card-body '>
                <button type="button" class="btn btn-success my-2" data-toggle="modal"
                        data-target="#modalSpent"><i class="fas fa-plus-circle"></i> Novo Gasto
                </button>
                <button id="btnExtract" type="button" class="btn btn-primary my-2" data-toggle="modal"
                        data-target="#modalExtract"><i class="fas fa-history"></i> Extrato de contas
                </button>
                @if($republic != null)
                    @if(count($spents)>0)
                        <div class='table-responsive'>
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
                                        <td>{{date('d/m/Y', strtotime($spent->dateSpent))}}</td>
                                        <td>{{$spent->description}}</td>
                                        <td>R$ {{number_format($spent->value,2,',', '.')}}</td>
                                        <td>
                                            @if($spent->user_id!=null)
                                                {{$spent->user->name}}
                                            @else
                                                Todos
                                            @endif
                                        </td>
                                        <td>
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
                        <small class='text-muted'>Aqui estão listados todos os gastos da república.</small><br>
                        <!-- Botão para acionar modal -->
                        <button id="closeMonth" data-result="{{$result}}" data-republic="{{$republic->id}}"
                                data-user="{{auth()->user()->id}}" type="button" class="btn btn-secondary my-2"
                                data-toggle="modal" data-target="#modalSpentResult">
                            <i class="far fa-check-circle"></i> Fechar Mês
                        </button>
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
        <div class='card'>
            <div class='card-header bg-success'>Crédito</div>
            <div class='card-body' style="border-color: #20b790">
                <small class='text-muted'>Adicione compras feitas por você que devem ser divididas entre todos.</small>
                <br>
                @if(count($myDebits)>0)
                    <div class='table-responsive'>
                        <table class="table table-bordered table-hover table-sm table-striped text-center">
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
            <!-- Botão para acionar modal -->
                <button id="newDebit" data-user="{{auth()->user()->id}}" type="button"
                        class="btn btn-success btn-sm mt-2" data-toggle="modal" data-target="#modalDebit"> Adicionar
                </button>
            </div>
        </div>
        <div class='card'>
            <div class='card-body'>
                {{--<div id="chart_div" style="width: 100%; height: 300px;"></div>--}}
                <canvas id="myChart" width="100%" height='31px'></canvas>
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
                        {{$value3}},
                        {{$value4}},
                        {{$value5}},
                        {{$value6}},
                        {{$value7}},
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
