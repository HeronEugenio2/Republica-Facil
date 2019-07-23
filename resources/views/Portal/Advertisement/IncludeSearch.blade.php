<div class="row justify-content-center mb-2">
    @if(isset($advertisementes))
        @foreach($advertisementes as $advertisement)
            <div class='card m-1 border shadow' style='width: 150px; '>
                <img class="card-img-top w-100" style='height: 120px' src="{{$advertisement->image}}" alt="Card image cap">
                <div class='card-body p-1 text-center w-100'>
                    <small>{{$advertisement->title}}</small>
                    <br>
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
