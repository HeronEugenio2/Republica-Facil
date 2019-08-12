<div class="row justify-content-center mb-2">
    @if(isset($advertisementes))
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
    @endif
</div>
