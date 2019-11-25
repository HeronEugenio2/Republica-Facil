
<div class="row p-2 justify-content-center">
    @if(isset($advertisementes) && count($advertisementes)>0)
        @foreach($advertisementes as $advertisement)
            <div class="card border border-dark shadow img-thumbnail m-2" style="width: 290px">
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
                                    <span>
                                        R$ {{number_format($advertisement->value,2,",",".")}}
                                    </span>
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
                        <a href='{{route('portal.showAdvertisement', $advertisement->id)}}'
                           class="btn btn-primary w-100">Ver Detalhes
                        </a>
                    </form>
                </div>
            </div>
        @endforeach
    @else
        <div class="text-center text-monospace text-muted">
            <h4>Desculpa não encontramos nenhum anúncio nessa categoria!</h4>
        </div>
        <div class="w-100"></div>
        <div class="">
            <img src="{{asset('images/dogs.png')}}"
                 alt="">
        </div>
        <div class="w-100"></div>
        <div class=" mt-4 text-center text-monospace text-muted">
            <h4>Seja o primeiro a anunciar</h4>
        </div>
    @endif
</div>
