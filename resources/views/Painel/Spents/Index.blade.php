@extends('layouts.Painel.LayoutFull')

@section('content')
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
                        <table class="table table-bordered table-hover table-striped text-center">
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
                                            @if($spent->member!=null)
                                                {{$spent->member}}
                                            @else
                                                Todos
                                            @endif
                                        </td>
                                        <td>
                                            <button class='btn btn-danger'>Excluir</button>
                                            <button class='btn btn-primary'>Editar</button>
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
