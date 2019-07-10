    <div class="row justify-content-center mb-2">
        @heron_do_futuro: "criar seed de categorias pq o foreach ja ta funfando"
        @if(isset($advertisement))
            @foreach($advertisements as $advertisement)
                <div class='card m-1 border-danger'>
                    <img class="card-img-top" style='width: 260px; height: 180px' src="{{$advertisement->image}}" alt="Card image cap">
                    <div class='card-body p-2 text-center' style='width: 260px; '>
                        {{$advertisement->title}}
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
                    <a href='{{route('portal.advertisements.show', $advertisement->id)}}' class='btn btn-sm btn-danger m-2'>Visualisar</a>
                </div>
            @endforeach
        @endif
    </div>
{{--    {{ $advertisements->links() }}--}}
