{{--@extends('layouts.app')--}}
@extends('layouts.Painel.LayoutFull')

@section('content')
    @if(isset($user->republic))
        <div class='card-columns'>
            <div class="card">
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

                <div class="card-body">
                    <img id='imgSrc' class='mb-2' src='https://www.nato-pa.int/sites/default/files/default_images/default-image.jpg' style="width:200px; height:200px;"/>
                    <div class="input-group mb-3">
                        <input type='text' name='image' id='image' class="form-control" placeholder="Ex: www.facebook.com/user/image.png" style='border-top-right-radius: 0; border-bottom-right-radius: 0;'>
                        <div class="input-group-append">
                            <button id='btnCheck' class="btn btn-outline-danger" type="button">Upload</button>
                        </div>
                    </div>
                    <strong>Nome: </strong> {{$republic->name}}<br> <strong>Email:</strong> {{$republic->email}}<br>
                    <strong>Descrição:</strong> {{$republic->description}}<br>
                    <strong>Quantidade Membros:</strong> {{$republic->qtdMembers}}<br>
                    <strong>Quantidade de Vagas:</strong> {{$republic->qtdVacancies}}<br>
                    <strong>Endereço:</strong> {{$republic->street}}, {{$republic->number}}<br>
                    <strong>Bairro:</strong> {{$republic->neighborhood}}<br> <strong>Cep:</strong> {{$republic->cep}}
                    <br> <strong>Cidade:</strong> {{$republic->city}}<br> <strong>Estado: </strong>{{$republic->state}}
                    <br> <strong>Gênero:</strong> {{$republic->type->title}}<br> <br>
                    <strong>Preço:</strong> R$ {{money_format('%.2n' ,$republic->value)}}<br>
                    <div class='mt-4'>
                        <a href="{{route('painel.republic.edit', $user->republic->id )}}" class="btn btn-secondary">Editar</a>
                    </div>
                    <div class='mt-4'>
                        <a href="{{route('painel.republic.edit', $user->republic->id )}}" class="btn btn-secondary">Sair</a>
                    </div>
                    @if(isset($republic))
                        <hr>
                        <h4>Membros</h4>
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
