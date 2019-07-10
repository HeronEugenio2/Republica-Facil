@extends('layouts.Painel.LayoutFull')

@section('content')
    <div id='advertList' class='card'>
        <div id='advertHeader' class='card-header text-white bg-nav'>Anúncios da República</div>
        <div id='advertBody' class='card-body '>
            <a href="{{route('painel.advertisement.create')}}" class="btn btn-success mb-2">
                <i class="fas fa-plus-circle"></i> Novo Anúncio
            </a>
            <hr>
            @if($republic != null)
                @if(isset($adverts))
                    <div class='table-responsive'>
                        <table class="table table-bordered table-hover table-striped text-center">
                            <thead>
                                <tr>
                                    {{--<th scope="col" class='bg-nav text-white' width='10%'>Imagem</th>--}}
                                    <th scope="col" class='bg-nav text-white'>Título</th>
                                    <th scope="col" class='bg-nav text-white'>Descrição</th>
                                    <th scope="col" class='bg-nav text-white'>Valor</th>
                                    <th scope="col" class='bg-nav text-white'>Ativo</th>
                                    <th scope="col" class='bg-nav text-white'>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($adverts as $advert)
                                    <tr class='text-center'>
                                        {{--<td class='align-middle'>--}}
                                            {{--<img src="{{$advert->image->url}}" height="42" width="42">--}}
                                        {{--</td>--}}
                                        <td class='align-middle'>{{$advert->title}}</td>
                                        <td class='align-middle'>{{$advert->description}}</td>
                                        <td class='align-middle'>R$ {{number_format($advert->value,2,',', '.')}}</td>
                                        <td class='align-middle'>
                                            @if($advert->active_enum==1)
                                                <i class="fas fa-thumbs-up fa-2x text-success"></i>
                                            @else
                                                <i class="fas fa-thumbs-down fa-2x text-danger"></i>
                                            @endif
                                        </td>
                                        <td class='align-middle'>
                                            <div class='btn-group'>
                                                <a href="{{route('painel.advertisement.show',$advert->id )}}" class="btn btn-sm text-gray mb-2 p-0 px-1">
                                                    <i class="fas fa-eye fa-2x"></i>
                                                </a>
                                                <a href="{{route('painel.advertisement.show',$advert->id )}}" class="btn btn-sm text-gray mb-2 p-0 px-1">
                                                    <i class="fas fa-eye fa-2x"></i>
                                                </a>
                                                <a href="{{route('painel.advertisement.show',$advert->id )}}" class="btn btn-sm text-gray mb-2 p-0 px-1">
                                                    <i class="fas fa-eye fa-2x"></i>
                                                </a>
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
