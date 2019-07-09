@extends('layouts.Painel.LayoutFull')

@section('content')
    <div id='advertList' class='card'>
        <div id='advertHeader' class='card-header text-white bg-nav'>Anúncios da República</div>
        <div id='advertBody' class='card-body '>
            <a href="{{route('painel.advertisement.create')}}" class="btn btn-success mb-2">
                <i class="fas fa-plus-circle"></i> Novo Anúncio
            </a>
            <hr>

            @if($user->republic != null)
                @if(isset($user->republic->advertisements))
                    <div class='table-responsive'>
                        <table class="table table-bordered table-hover table-striped  table-sm text-center">
                            <thead>
                                <tr>
                                    <th scope="col" class='bg-nav text-white' width='10%'>Imagem</th>
                                    <th scope="col" class='bg-nav text-white'>Título</th>
                                    <th scope="col" class='bg-nav text-white'>Descrição</th>
                                    <th scope="col" class='bg-nav text-white'>Valor</th>
                                    <th scope="col" class='bg-nav text-white'>Ativo</th>
                                    <th scope="col" class='bg-nav text-white'>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user->republic->advertisements as $advertisement)
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
                                            <div class='btn-group'>
                                                <form action="{{ route('painel.advertisement.destroy', $advertisement->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{route('painel.advertisement.show',$advertisement->id )}}" class="btn btn-sm text-gray mb-2 p-0 px-1">
                                                        <i class="fas fa-eye fa-2x"></i>
                                                    </a>
                                                    <button class="btn btn-danger btn-sm mb-2" type="submit"><i class="fas fa-trash"></i></button>
                                                </form>
                                            </div>
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
