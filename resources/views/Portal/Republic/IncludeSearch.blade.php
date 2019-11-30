<div class="row justify-content-center mb-2">
    @if(isset($republics) && count($republics)>0)
        @foreach($republics as $republic)
            <div class='card m-1 border-danger'>
                <img class="card-img-top" style='width: 260px; height: 180px' src="{{$republic->image}}"
                     alt="Card image cap">
                <div class='card-body p-2 text-center' style='width: 260px; '>
                    <div class="col-12 text-truncate text-left p-0 mb-2">
                        <h5><strong>{{$republic->name}}</strong></h5>
                    </div>
                    <small class='text-danger float-left font-weight-bold'>
                        <strong><i class="fas fa-money-bill"></i> R$ {{money_format('%.2n', $republic->value)}} por mês</strong>
                    </small>
                    <br>
                    <p class='text-muted text-left'>{!! \Illuminate\Support\Str::limit($republic->description, 90) !!}</p>
                    <div class='row justify-content-md-center text-center '>
                        <div class='col-4'>
                            @if($republic->type_id == 1)
                                <i class="fas fa-male mb-2"></i><br>
                                <small>Homens</small>
                            @elseif($republic->type_id == 2)
                                <i class="fas fa-female mb-2"></i><br>
                                <small>Mulheres</small>
                            @else
                                <i class="fas fa-male mb-2"></i><i class="fas fa-female mb-2"></i>
                                <br>
                                <small>Mista</small>
                            @endif
                        </div>
                        <div class='col-4'>
                            {{$republic->qtdVacancies}}<br>
                            <small>Vagas</small>
                        </div>
                        <div class='col-4'>
                            {{$republic->qtdMembers}}<br>
                            <small>Membros</small>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12"><h5>Avaliação</h5></div>
                        <div class="col-6"><i class="fas fa-thumbs-down text-danger"></i> {{$republic->down}}</div>
                        <div class="col-6"><i class="fas fa-thumbs-up text-success"></i> {{$republic->up}}</div>
                    </div>
                </div>
                <a href='{{route('portal.republics.show', $republic->id)}}'
                   class='btn btn-sm btn-danger m-2'>Visualisar</a>
            </div>
        @endforeach
    @else
        <div class="text-center text-monospace text-muted">
            <h4>Desculpa não encontramos nenhum anúncio!</h4>
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
