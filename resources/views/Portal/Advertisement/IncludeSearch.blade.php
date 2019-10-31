<div class="row justify-content-center my-4">
    @if(isset($advertisementes) && count($advertisementes)>0)
        @foreach($advertisementes as $advertisement)
            <div class='card m-1 shadow' style='width: 150px; border-color: rgba(14,160,255,0.47) '>
                <img class="card-img-top w-100" style='height: 120px' src="{{$advertisement->image}}" alt="Card image cap">
                <div class='card-body p-1 text-center w-100'>
                    <div class="col-12 text-truncate p-0 mb-2">
                        <small>{{$advertisement->title}}</small>
                    </div>
                    <small>
                        <strong><i class="fas fa-money-bill"></i> R$ {{money_format('%.2n', $advertisement->value)}}
                        </strong>
                    </small>
                    <a href='{{route('portal.showAdvertisement', $advertisement->id)}}' href='#' class='btn btn-sm btn-primary w-100'>Visualisar</a>
                </div>
            </div>
        @endforeach
    @else
        <div class="badge badge-primary p-4">
            <h2><i class="fas fa-exclamation-triangle"></i> Oops!</h2><strong>Não existem itens pra esse tipo de
                busca.</strong>
        </div>
    @endif
</div>
