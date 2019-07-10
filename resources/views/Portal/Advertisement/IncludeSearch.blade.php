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
                    <a href='#' class='btn btn-sm btn-primary w-100'>Visualisar</a>
                    {{--<p class='text-muted text-left'>{!! \Illuminate\Support\Str::limit($advertisement->description, 90) !!}</p>--}}

                    {{--<small class='text-danger float-left font-weight-bold'>--}}
                    {{--<strong><i class="fas fa-money-bill"></i> R$ {{money_format('%.2n', $advertisement->value)}} por mês</strong>--}}
                    {{--</small>--}}
                    {{--<br>--}}
                    {{--<div class="col-12 text-truncate text-left p-0 mb-2">--}}
                    {{--<h5><strong>{{$advertisement->name}}</strong></h5>--}}
                    {{--</div>--}}
                    {{--<p class='text-muted text-left'>{!! \Illuminate\Support\Str::limit($advertisement->description, 90) !!}</p>--}}
                    {{--<div class='row justify-content-md-center text-center '>--}}
                    {{--<div class='col-4'>--}}
                    {{--@if($advertisement->type_id == 1)--}}
                    {{--<i class="fas fa-male"></i><br>--}}
                    {{--<small>Homens</small>--}}
                    {{--@elseif($advertisement->type_id == 2)--}}
                    {{--<i class="fas fa-female"></i><br>--}}
                    {{--<small>Mulheres</small>--}}
                    {{--@else--}}
                    {{--<i class="fas fa-male"></i><i class="fas fa-female"></i></i>--}}
                    {{--<br>--}}
                    {{--<small>Mista</small>--}}
                    {{--@endif--}}
                    {{--</div>--}}
                    {{--<div class='col-4'>--}}
                    {{--{{$advertisement->qtdVacancies}}<br>--}}
                    {{--<small>Vagas</small>--}}
                    {{--</div>--}}
                    {{--<div class='col-4'>--}}
                    {{--{{$advertisement->qtdMembers}}<br>--}}
                    {{--<small>Membros</small>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                </div>
                {{--                    <a href='{{route('portal.advertisements.show', $advertisement->id)}}' class='btn btn-sm btn-danger m-2'>Visualisar</a>--}}
            </div>
        @endforeach
    @endif
</div>
