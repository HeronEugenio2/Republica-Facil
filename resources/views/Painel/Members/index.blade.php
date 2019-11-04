@extends('layouts.Painel.LayoutFull')

@section('content')
    @if($message = Session::get('success'))
        <div class='alert alert-success alert-block'>
            <button type='button' class='close' data-dismiss='alert'>×</button>
            <Strong>{{$message}}</Strong>
        </div>
    @endif

    @if(count($errors) > 0)
        <div class='alert alert-danger'>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class='card'>
        <div class='card-header bg-nav text-white'>
            Adicionar Membro
        </div>
        <div class='card-body'>
            <form action='{{route('painel.member.store')}}' method='POST' class='mb-2'>
                @csrf
                <label class="form-control-label">Para adicionar membros à sua república é preciso que o usuário aceite
                    o convite no e-mail.</label>
                <div class='input-group mb-3'>
                    <input name='email' type='email' class='form-control' placeholder='Endereço de e-mail do convidado'
                           aria-label="Recipient's username" aria-describedby="basic-addon2"
                           style='border-top-right-radius: initial;border-bottom-right-radius: initial;' required>
                    <div class='input-group-append'>
                        <button type='submit' class='btn btn-primary'>Enviar Convite</button>
                    </div>
                </div>
            </form>
            @if(isset($invitations) && count($invitations) > 0)
                <div class='table-responsive'>
                    <table class='table table-bordered table-sm table-hover table-striped text-center'>
                        <thead>
                        <tr>
                            <th scope='col'>Email</th>
                            <th scope='col'>Enviada</th>
                            <th scope='col'>Opções</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($invitations as $invitation)
                            <tr class='text-center'>
                                <td class="align-middle">
                                    {{$invitation->email}}
                                </td>
                                <td class="align-middle">
                                    {{date_format($invitation->created_at, 'd/m/Y')}}
                                </td>
                                <td class="align-middle" width="15%">
                                    <a href='#' class='btn btn-primary btn-sm my-1 float-left'>Reenviar</a>
                                    <a href='#' class='btn btn-danger btn-sm my-1 float-left'>Cancelar</a>
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
        <div class='card-header bg-nav text-white'>
            Membros ({{isset($members)? count($members)  : ''}})
        </div>
        <div class='card-body'>
            @if(!empty($members))
                <div class='table-responsive'>
                    <table class='table table-bordered table-sm table-hover table-striped text-center'>
                        <thead>
                        <tr>
                            <th scope='col'>Nome</th>
                            <th scope='col'>E-mail</th>
                            <th scope='col'>Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($members as $member)
                            <tr class='text-center'>
                                <td class="align-middle text-left">
                                    <img src="{{$member->image}}" class="mr-2"
                                         style="width: 32px; height: 32px;  top: -2px; left: 10px; border-radius: 50%">
                                    {{$member->name}}
                                </td>
                                <td class="align-middle">{{$member->email}}</td>
                                <td class="align-middle">
                                    <a href='{{route('painel.removeMember', $member->id)}}'
                                       class='text-center text-danger'>
                                        <i class='fas fa-user-times'></i><strong> Remover Membro</strong>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>



@endsection
