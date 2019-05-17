@extends('layouts.Painel.LayoutFull')

@section('content')
    <div class="card text-dark bg-primary mb-3" style="max-width: 18rem;">
        <div class="card-header bg-nav text-white c-">Gerenciador de gastos</div>
        <div class="card-body">
            <h4 class="card-text text-center">ST = (ST/QT)-SI</h4>
            Débito República =
            <strong class='float-right text-danger'>R${{number_format($spentsTotal, 2, ',', ' ')}}</strong>
            <br> Crédito Individual =
            <strong class='float-right text-success'>R${{number_format($spentsIndividual, 2, ',', ' ')}}</strong>
            <br> $media  = <strong class='float-right '>R${{number_format($media, 2, ',', ' ')}}</strong>
        </div>
        <div class='card-footer text-center'>
            @if($result>0)
                <h2 class='text-success display-4'>CRÉDITO R${{number_format($result, 2, ',', ' ')}}</h2>
            @else
                <h2 class='text-danger display-4'>DÉBITO R${{number_format($result, 2, ',', ' ')}}</h2>
            @endif
        </div>
    </div>
    <div id='spentFull' class='card'>
        <div id='headerFull' class='card-header bg-nav text-white c-'>Gastos</div>
        <div id='bodyFull' class='card-body '>
            <a href="{{route('painel.spent.create')}}" class="btn btn-success mb-2">
                <i class="fas fa-plus-circle"></i> Novo Gasto
            </a>
            <hr>
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
                                            <form method="POST" action="{{route('painel.spent.destroy',$spent->id) }}">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <div class="btn-group-horizontal">
                                                    <button class='btn btn-danger btn-sm' type="submit">Excluir</button>
                                                    <button class='btn btn-primary btn-sm'>Editar</button>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                <td colspan='4'><strong>Total</strong></td>
                                <td><strong>R$ {{number_format($spentsTotal,2,',', '.')}}</strong></td>
                            </tbody>
                        </table>
                    </div>
                    <a href="#" class="btn btn-primary mt-2">
                        <i class="far fa-check-circle"></i> Fechar Mês
                    </a>
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
@push('scripts')
    <script>
        $(document).ready(function () {
            $("#headerFull").click(function () {
                $("#bodyFull").toggle();
            });
        });
    </script>
@endpush
