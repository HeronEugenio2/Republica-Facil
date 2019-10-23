{{--@extends('layouts.app')--}}
@extends('layouts.Painel.LayoutFull')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(isset($user->republic))

        <div class='card-columns'>
            <div class='card'>
                <div class="card-header bg-nav text-white">Sua República
                    @if($republic->active_flag == 0)
                        <h2 class='float-right'>
                            <span class="badge badge-warning px-4" value='{{$republic->active_flag}}'>Em Análise</span>
                        </h2>
                    @else
                        <h2 class='float-right'>
                            <span class="text-success" value='{{$republic->active_flag}}'>Ativa <i
                                    class="fas fa-check"></i></span>
                        </h2>
                    @endif
                </div>
                <div class="card-body text-center">
                    <img id='imgSrc' class='mb-2' src='{{$republic->image}}' style="width:200px; height:200px;"/> <br>
                    <div class="btn-group btn-group-sm mb-2" role="group" aria-label="...">
                        <a href="{{route('painel.republic.edit', $user->republic->id )}}" class="btn btn-secondary">Editar</a>
                        <a href="{{route('painel.republic.edit', $user->republic->id )}}"
                           class="btn btn-secondary">Sair</a>
                        <a href='#' class='btn btn-secondary btn-sm'>Fotos</a>
                    </div>
                    <br>
                    <h2>{{$republic->name}}</h2><strong>Email:</strong> {{$republic->email}}
                    <br> <strong>Descrição:</strong> {{$republic->description}}<br>
                    <strong>Vagas:</strong> {{$republic->qtdVacancies}}<br>

                    <br>
                    <h2>R$ {{money_format('%.2n' ,$republic->value)}}</h2><br>
                </div>
            </div>

            <div class='card'>
                <div class='card-header bg-nav text-white'>Endereço</div>
                <div class='card-body'>
                    <strong>Endereço:</strong> {{$republic->street}}, {{$republic->number}}<br>
                    <strong>Bairro:</strong> {{$republic->district}}<br> <strong>Cep:</strong> {{$republic->cep}}
                    <br> <strong>Cidade:</strong> {{$republic->city}}<br> <strong>Estado: </strong>{{$republic->state}}
                    <br> <strong>Gênero:</strong> {{$republic->type->title}}<br> <br>
                    <a href="{{route('painel.republic.edit', $user->republic->id )}}"
                       class="btn btn-secondary">Editar</a>
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-primary">
            <h2><i class="fas fa-exclamation-triangle"></i> Olá {{ Auth::user()->name }} !</h2>
            Para cadastrar sua primeira república clique no botão abaixo.
            <hr>
            <a href="{{route('painel.republic.create')}}" class="btn btn-primary">Cadastrar República</a>
        </div>
    @endif
@endsection
@push('scripts')
    <script type='text/javascript'>
        $('#btnCheck').click(function () {
            let src = $('#image').val();
            $('#imgSrc').attr("src", src);
            if ($('#image').val() == '' || $('#image').val() == []) {
                $('#imgSrc').attr("src", "https://www.nato-pa.int/sites/default/files/default_images/default-image.jpg");
            }
        });
    </script>
@endpush
