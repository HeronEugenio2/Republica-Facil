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
        <div class='row'>
            <div class="col col-sm-12 col-md-6 col-lg-6">
                <div class='card shadow'>
                    <div class="card-header bg-nav text-white">Sua República
                        @if($republic->active_flag == 0)
                            <h2 class='float-right m-0'>
                                <span class="text-warning"
                                      value='{{$republic->active_flag}}'><i class="far fa-clock"></i> Em Análise</span>
                            </h2>
                        @else
                            <h2 class='float-right m-0'>
                            <span class="text-success" value='{{$republic->active_flag}}'>Ativa <i
                                    class="fas fa-check"></i></span>
                            </h2>
                        @endif
                    </div>
                    <div class="card-body text-center">
                        <img id='imgSrc' class='mb-2' src='{{$republic->image}}' style="width:200px; height:200px;"/>
                        <br>
                        <div class="btn-group btn-group-sm mb-2" role="group" aria-label="...">
                            <a href="{{route('painel.republic.edit', $user->republic->id )}}"
                               class="btn btn-secondary">Editar</a>
                            <a href='#' class='btn btn-secondary btn-sm'>Fotos</a>
                            <button data-toggle="modal" data-target="#modalExemplo" href='#'
                                    class='btn btn-secondary btn-sm'>Alterar Proprietário
                            </button>
                            <a href="{{route('painel.republic.edit', $user->republic->id )}}"
                               class="btn btn-danger">Sair</a>
                        </div>
                        <br>
                        <div class="my-2">
                            <h1>{{$republic->name}}</h1><strong>Email:</strong> {{$republic->email}}
                        </div>
                        @if(isset($owner))
                            <h3>Proprietário: {{$owner->name}}</h3>
                        @endif
                        @if(isset($owner))
                            <div><h3>Contato: {{$republic->phone}}</h3></div>
                        @endif
                        <hr>
                        <strong>Descrição:</strong> {{$republic->description}}<br>
                        <div class="mt-3">
                            <span class="mr-4">
                                <strong><i class="fas fa-bed"></i> Vagas:</strong> {{$republic->qtdVacancies}}
                            </span>
                            <strong><i class="fas fa-users"></i> Membros:</strong> {{$republic->qtdMembers}}
                        </div>
                    </div>
                    <div class="card-footer bg-secondary p-3 m-0 text-center"><h2 class="text-white m-0 display-3">
                            R$ {{money_format('%.2n' ,$republic->value)}}</h2>
                    </div>
                </div>
            </div>
            <div class="col col-sm-12 col-md-6 col-lg-6">
                <div class='card shadow'>
                    <div class='card-header bg-nav text-white'>Endereço</div>
                    <div class='card-body'>
                        <strong>Endereço:</strong> {{$republic->street}}, {{$republic->number}}<br>
                        <strong>Bairro:</strong> {{$republic->district}}<br> <strong>Cep:</strong> {{$republic->cep}}
                        <br> <strong>Cidade:</strong> {{$republic->city}}<br>
                        <strong>Estado: </strong>{{$republic->state}}
                        <br> <strong>Gênero:</strong> {{$republic->type->title}}<br> <br>
                        <a href="{{route('painel.republic.edit', $user->republic->id )}}"
                           class="btn btn-secondary">Editar</a>
                    </div>
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
