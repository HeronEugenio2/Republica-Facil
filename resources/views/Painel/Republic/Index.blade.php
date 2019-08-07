{{--@extends('layouts.app')--}}
@extends('layouts.Painel.LayoutFull')

@section('content')
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
                            <span class="text-success" value='{{$republic->active_flag}}'>Ativa <i class="fas fa-check"></i></span>
                        </h2>
                    @endif
                </div>
                <div class="card-body text-center">
                    <img id='imgSrc' class='mb-2' src='{{$republic->image}}' style="width:200px; height:200px;"/> <br>
                    <div class="btn-group btn-group-sm mb-2" role="group" aria-label="...">
                        <a href="{{route('painel.republic.edit', $user->republic->id )}}" class="btn btn-secondary">Editar</a>
                        <a href="{{route('painel.republic.edit', $user->republic->id )}}" class="btn btn-secondary">Sair</a>
                        <a href='#' class='btn btn-secondary btn-sm'>Fotos</a>
                    </div>
                    <br> <h2>{{$republic->name}}</h2><strong>Email:</strong> {{$republic->email}}
                    <br> <strong>Descrição:</strong> {{$republic->description}}<br>
                    <strong>Membros:</strong> {{$republic->qtdMembers}}<br>
                    <strong>Vagas:</strong> {{$republic->qtdVacancies}}<br>

                    <br><h2>R$ {{money_format('%.2n' ,$republic->value)}}</h2><br>
                </div>
            </div>
            <div class='card'>
                <div class='card-header bg-nav text-white'>Convites</div>
                <div class='card-body'>
                    <form action='{{route('painel.invitation')}}' method='POST' class='mb-2'>
                        @csrf
                        <input type='hidden' name='user_id' value='{{$user->id}}'>
                        <input type='hidden' name='republic_id' value='{{$republic->id}}'>
                        {{--<div id='email' class="form-group col-12 p-0">--}}
                        {{--<div class="form-group">--}}
                        {{--<label for="inputEmail">E-mail</label>--}}
                        {{--<input id="inputEmail" name='email' type="email" class="form-control"--}}
                        {{--aria-describedby="emailHelp" placeholder="Ex: member@gmail.com" style='width: 100%'--}}
                        {{--required>--}}
                        {{--<small id="emailHelp" class="form-text text-muted">Envie uma confirmação para o email de seu membro.--}}
                        {{--</small>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--<button type='submit' href="#" class="btn btn-danger">Enviar Convite</button>--}}
                        <label>Para adicionar membros à sua república é preciso que o usuário aceite o convite no e-mail.</label>
                        <div class="input-group mb-3">
                            <input name='email' type="email" class="form-control" placeholder="Endereço de e-mail do convidado" aria-label="Recipient's username" aria-describedby="basic-addon2" style='border-top-right-radius: initial;border-bottom-right-radius: initial;' required>
                            <div class="input-group-append">
                                <button type='submit' href="#" class="btn btn-secondary">Enviar Convite</button>
                            </div>
                        </div>
                        @if($errors->any())
                            <h2 class='text-danger'>{{$errors->first()}}</h2>
                        @endif
                    </form>
                    @if(count($invitations)>0)
                        <div class='table-responsive'>
                            <table class="table table-bordered table-sm table-hover table-striped text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">Email</th>
                                        <th scope="col">Enviada</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($invitations as $invitation)
                                        <tr class='text-center'>
                                            <td>
                                                {{$invitation->email}}
                                            </td>
                                            <td>
                                                {{date_format($invitation->created_at,"d/m/Y")}}
                                                <a href='#' class='btn btn-danger btn-sm float-right'>Cancelar</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
            <div class='card'>
                <div class='card-header bg-nav text-white'>Membros</div>
                <div class='card-header'>
                    @if(isset($republic))
                        <div class='table-responsive'>
                            <table class="table table-bordered table-sm table-hover table-striped text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($members as $member)
                                        <tr class='text-center'>
                                            <td>
                                                <a href='#' class='float-left'>
                                                    <i class="fas fa-user-times text-danger"></i></a>
                                                {{$member->name}}</td>
                                            <td>{{$member->email}}</td>
                                            {{--<td>--}}
                                            {{--{{$member->created_at = null ? $member->updated_at : $member->created_at}}--}}
                                            {{--</td>--}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
            <div class='card'>
                <div class='card-header bg-nav text-white'>Endereço</div>
                <div class='card-body'>
                    <strong>Endereço:</strong> {{$republic->street}}, {{$republic->number}}<br>
                    <strong>Bairro:</strong> {{$republic->district}}<br> <strong>Cep:</strong> {{$republic->cep}}
                    <br> <strong>Cidade:</strong> {{$republic->city}}<br> <strong>Estado: </strong>{{$republic->state}}
                    <br> <strong>Gênero:</strong> {{$republic->type->title}}<br> <br>
                    <a href="{{route('painel.republic.edit', $user->republic->id )}}" class="btn btn-secondary">Editar</a>
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
