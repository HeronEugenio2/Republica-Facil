@extends('layouts.Painel.LayoutFull')

@section('content')
    <div id='advertList' class='card'>
        <div id='advertHeader' class='card-header text-white bg-nav'>Anúncios da República</div>
        <div id='advertBody' class='card-body '>
            <a href="{{route('painel.advertisement.create')}}" class="btn btn-success mb-2">
                <i class="fas fa-plus-circle"></i> Novo Anúncio
            </a>
            <div class='filtro'>
                <form>
                    <div class="input-group mb-3  w-50">
                        <input type="text" class="form-control" placeholder="Palavra Chave"
                               style='border-bottom-right-radius: unset;border-top-right-radius: unset;'>
                        <div class="input-group-append">
                            <span class="input-group-text btn-secondary">Buscar</span>
                        </div>
                    </div>
                </form>
            </div>
            <hr>
            @if(count($advertisements)>0)
                @if(isset($advertisements))
                    <div class='table-responsive'>
                        <table class="table table-bordered table-hover table-striped  table-sm text-center">
                            <thead>
                                <tr>
                                    <th scope="col" class='bg-nav text-white' width='10%'>Imagem</th>
                                    <th scope="col" class='bg-nav text-white'>Título</th>
                                    <th scope="col" class='bg-nav text-white'>Descrição</th>
                                    <th scope="col" class='bg-nav text-white'>Valor</th>
                                    <th scope="col" class='bg-nav text-white'>Ativo</th>
                                    <th scope="col" class='bg-nav text-white'>Detalhes</th>
                                    <th scope="col" class='bg-nav text-white'>Deletar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($advertisements as $advertisement)
                                    <tr class='text-center'>
                                        <td class='align-middle'>
                                            <img src="{{$advertisement->image}}" height="42" width="42">
                                        </td>
                                        <td class='align-middle'>{{$advertisement->title}}</td>
                                        <td class='align-middle'>{{$advertisement->description}}</td>
                                        <td class='align-middle'>R$ {{number_format($advertisement->value,2,',', '.')}}</td>
                                        <td class='align-middle'>
                                            @if($advertisement->active_flag==1)
                                                <i class="fas fa-thumbs-up fa-2x text-success"></i>
                                            @else
                                                <i class="fas fa-thumbs-down fa-2x text-danger"></i>
                                            @endif
                                        </td>
                                        <td class='align-middle'>
                                            <a href="{{route('painel.advertisement.show',$advertisement->id )}}" class="btn btn-sm text-gray mb-2 p-0 px-1">
                                                <i class="fas fa-eye fa-2x"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{ route('painel.advertisement.destroy', $advertisement->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm mb-2" type="submit">
                                                    <i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class='alert alert-primary'>
                        Não possui anúncios!
                    </div>
                @endif
            @else
                <div class='alert alert-primary'>
                    Não possui anúncios!
                </div>
            @endif
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        // $(document).ready(function () {
        //     $("#advertHeader").click(function () {
        //         $("#advertBody").toggle();
        //     });
        // });
    </script>
@endpush
