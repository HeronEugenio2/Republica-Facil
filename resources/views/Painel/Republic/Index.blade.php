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
        <div class="card">
            <div class="card-body">
                <div class="p-4 mb-2 bg-lighter w-100">
                    <h1>{{strtoupper($republic->name)}}</h1>
                    <div class="row">
                        <div class="col-sm-12 col-lg-7 col-md-7">
                            <p>{{$republic->description}}</p>

                            <div class="my-4">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        <h3><i class="fab fa-whatsapp"></i> {{$republic->phone}}</h3>
                                        <h3><i class="far fa-envelope"></i> {{$republic->email}}</h3>
                                        <h3><i class="fas fa-angle-double-right"></i> {{$republic->type->title}}</h3>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        <h3>
                                            <i class="fas fa-users"></i> {{$republic->qtdMembers}} membros
                                        </h3>
                                        <h3>
                                            <i class="fas fa-bed"></i>
                                            {{$republic->qtdVacancies}}
                                            @if($republic->qtdVacancies==1)
                                                vaga
                                            @else
                                                vagas
                                            @endif
                                        </h3>
                                        <h3>
                                            R$ {{money_format('%.2n' ,$republic->value)}}
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <address class="my-4">
                                <i class="fas fa-map-marked-alt fa-2x"></i>
                                <strong class="display-4">{{$republic->city}} - {{$republic->state}} </strong>
                                <p class="mb-0">{{$republic->street}}, {{$republic->number}}</p>
                                <p>{{$republic->district}},
                                    CEP {{$republic->cep}}</p>
                            </address>
                            @if(isset($republic->user_id))
                                <div class="mb-4">
                                    <h3>
                                        <img src="{{$owner->image}}"
                                             style="width: 40px; height: 40px;border-radius: 50%">
                                        Proprietário {{$owner->name}}
                                    </h3>
                                </div>
                            @endif

                            <a href="{{route('painel.republic.edit', $user->republic->id )}}"
                               class="btn btn-outline-dark mb-4">
                                Editar Informações <i class="fas fa-angle-double-right"></i>
                            </a>
                            @if($republic->user_id == \Illuminate\Support\Facades\Auth::user()->id)
                                <a href="#" class="btn btn-outline-dark mb-4"
                                   data-toggle="modal" data-target="#modalExemplo">
                                    Alterar Proprietário <i class="fas fa-angle-double-right"></i>
                                </a>
                            @endif
                            @if($republic->user_id != Auth::id() && isset($republic->user_id))
                                <a href="{{route('painel.removeOwner',Auth::id() )}}"
                                   class="btn btn-outline-danger mb-4">
                                    Deixar República <i class="fas fa-angle-double-right"></i>
                                </a>
                            @else
                                <a href="{{route('painel.desactive', $republic->id )}}"
                                   class="btn btn-outline-danger mb-4">
                                    Desativar República <i class="fas fa-angle-double-right"></i>
                                </a>
                            @endif

                        </div>
                        <div class="col-sm-12 col-lg-5 col-md-5 text-center">
                            <div class='overflow-hidden'>
                                <div class="overflow-auto overflow-hidden rounded" style="
                                    background-image: url({{$republic->image}});
                                    background-size: auto;
                                    /* width: 100%; */
                                    height: 350px;
                                    background-position: center;
                                    background-repeat: no-repeat;
                                    background-size: cover;
                                    ">
                                </div>
                                <div class="mt-4">
                                    @if($republic->active_flag == 0)

                                        <div class="alert bg-warning w-100 p-1">
                                            <span class="display-4"><i class="far fa-clock"></i> Em Análise</span>
                                        </div>
                                        {{--<span value='{{$republic->active_flag}}'>
                                            <i class="far fa-clock"></i> Em Análise
                                        </span>--}}
                                    @else
                                        <div class="alert bg-success w-100 p-1">
                                            <span class="display-4"><i class="fas fa-check"></i> Ativa</span>
                                        </div>
                                        {{-- <span value='{{$republic->active_flag}}'>
                                             <i class="fas fa-check"></i> Ativa
                                         </span>--}}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="card">
            <div class="card-body">
                <div class="p-4 mb-2 alert alert-primary w-100">
                    <div class="row">
                        <div class="col-sm-12 col-lg-6 col-md-6">
                            <h1><i class="fas fa-exclamation-triangle"></i> Olá {{ Auth::user()->name }} !</h1>
                            <h3>Você ainda não pertence a nenhuma república, para registrar uma nova república clique no
                                botão abaixo. Caso seja membro de alguma república entre em contato com o proprietário e
                                solicite seu convite de membro.</h3>
                            <p>Você pode visualizar seus convites na página inicial do painel.</p>
                            <a href="{{route('painel.republic.create')}}" class="btn btn-primary mb-2">
                                Criar República <i class="fas fa-angle-double-right"></i>
                            </a>
                        </div>
                        <div class="col-sm-12 col-lg-6 col-md-6 text-center my-4">
                            <img
                                src="{{asset('/images/cadastrar-republic.png')}}"
                                class="img-fluid"
                                style="height: 250px">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!-- Modal -->
    <div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Membros</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('painel.alterOwner')}}" method="POST">
                        @csrf
                        <div class='table-responsive'>
                            <table class="table table-bordered table-hover table-sm table-striped text-center">
                                <thead>
                                <tr>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Proprietário</th>
                                </tr>
                                </thead>
                                <tbody>
                                <div class="form-check">
                                    @if(isset($members))
                                        @foreach($members as $member)
                                            <input type="hidden" value="{{$republic->id}}" name="republic_id">
                                            <tr class='text-center'>
                                                <td class="align-middle text-center">
                                                    <img src="{{$member->image}}"
                                                         style="width: 32px; height: 32px;border-radius: 50%">
                                                </td>
                                                <td class="align-middle text-center">{{$member->name}}</td>
                                                <td class="text-center">
                                                    <input class="form-check-input" type="radio" name="member_id"
                                                           value="{{$member->id}}" checked>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </div>
                                </tbody>
                            </table>
                        </div>

                        <button type="submit" class="btn btn-primary">Salvar mudanças</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
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
