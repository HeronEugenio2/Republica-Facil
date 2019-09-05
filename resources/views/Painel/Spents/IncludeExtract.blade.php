@if(isset($extractSpents) && count($extractSpents)>0)
    <hr>
    <div class='table-responsive'>
        <table class="table table-bordered table-hover table-sm table-striped text-center">
            <thead>
            <tr>
                <th scope="col">Data</th>
                <th scope="col">Descrição</th>
                <th scope="col">Valor</th>
                <th scope="col">Membro</th>
                <th scope="col">Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach($extractSpents as $spent)
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
                        @if($spent->history->close == 1)
                            Mês Fechado <i class="fas fa-lock text-muted" style="float: right"></i>
                        @else
                            Em aberto <i class="fas fa-lock-open text-muted" style="float: right"></i>
                        @endif
                    </td>
                </tr>
            @endforeach
            <tr style="background-color: gainsboro;">
                <td colspan='4'><strong><h3 class="text-dark">Total</h3></strong></td>
                <td><strong><h3 class="text-dark">R$ {{number_format($spentsTotal,2,',', '.')}}</h3></strong></td>
            </tr>
            </tbody>
        </table>
    </div>
    <button class="btn btn-secondary btn-sm my-2"><i class="fas fa-file-download"></i> Exportar</button>
@else
    <div class="alert alert-primary">Não existem gastos nesse mês.</div>
@endif

