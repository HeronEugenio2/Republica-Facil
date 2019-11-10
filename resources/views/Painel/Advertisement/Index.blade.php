@extends('layouts.Painel.LayoutFull')

@section('content')
    <div id='advertList' class='card'>
        {{--        <div id='advertHeader' class='card-header text-white bg-nav'>Anúncios da República</div>--}}
        <div id='advertBody' class='card-body'>
            <div class="p-4 mb-2 alert alert-primary w-100">
                <h1>ANUNCIAR GRÁTIS</h1>
                <div class="row">
                    <div class="col-sm-12 col-lg-6 col-md-6">
                        <h3>você não precisa ser membro de repúblicas para fazer seus anúncios</h3>
                        <a href="{{route('painel.advertisement.create')}}" class="btn btn-primary mb-2">
                            Novo Anúncio <i class="fas fa-angle-double-right"></i>
                        </a>
                    </div>
                    <div class="col-sm-12 col-lg-6 col-md-6">
                        <img
                            src="https://www.vendotudo.net.br/wp-content/uploads/layerslider/opal/opal-layer-01-image.png"
                            class="img-fluid">
                    </div>
                </div>
            </div>
            <div class='filtro mt-4'>
                <form method="GET" action="{{ route('painel.advertisement.index')}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label class="form-control-label">Status</label>
                                <select class="form-control w-100" name="status">
                                    <option value="null">Todos</option>
                                    <option value="1">Ativo</option>
                                    <option value="0">Inativo</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12">
                            <label class="form-control-label">Nome do anúncio</label>
                            <div class="input-group mb-3">
                                <input type="text" id="name" name="name" class="form-control"
                                       placeholder="Palavra Chave"
                                       style='border-bottom-right-radius: unset;border-top-right-radius: unset;'>
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-search mr-2"></i>Buscar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            @if(isset($advertisements) && count($advertisements)>0 )
                <div class="row p-2 justify-content-center">
                    @foreach($advertisements as $advertisement)
                        <div class="card border border-light img-thumbnail m-2" style="width: 290px">
                            <div class='overflow-hidden'>
                                <div class="overflow-auto overflow-hidden" style="
                                    background-image: url({{asset($advertisement->image)}});
                                    background-size: auto;
                                    /* width: 100%; */
                                    height: 200px;
                                    background-position: center;
                                    background-repeat: no-repeat;
                                    background-size: cover;
                                    ">
                                </div>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title text-truncate">{{$advertisement->title}}</h3>
                                <p class="card-text text-truncate">{{$advertisement->street}}
                                    <br>{{$advertisement->city}} - {{$advertisement->state}}</p>
                                <p>
                                    R$ {{number_format($advertisement->value,2,",",".")}}
                                    <span class="float-right">
                                        @if($advertisement->active_flag==1)
                                            <span class="text-success"><i class="fas fa-check"></i> Anúncio Ativo</span>
                                        @else
                                            <span class="text-warning"><i class="far fa-clock"></i> Em Análise</span>
                                        @endif
                                    </span>
                                </p>
                                <form action="{{ route('painel.advertisement.destroy', $advertisement->id)}}"
                                      method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{route('painel.advertisement.show',$advertisement->id )}}"
                                       class="btn btn-primary w-100">Ver Detalhes
                                    </a>
                                    <button class="btn btn-light btn-sm w-100 mt-2" type="submit">
                                        Excluir Anúncio
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class='alert alert-primary'>
                    você ainda não possui anúncios.
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
