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
                <label>Para adicionar membros à sua república é preciso que o usuário aceite o convite no e-mail.</label>
                <div class='input-group mb-3'>
                    <input name='email' type='email' class='form-control' placeholder='Endereço de e-mail do convidado' aria-label="Recipient's username" aria-describedby="basic-addon2" style='border-top-right-radius: initial;border-bottom-right-radius: initial;' required>
                    <div class='input-group-append'>
                        <button type='submit' class='btn btn-secondary'>Enviar Convite</button>
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
                                    <td>
                                        {{$invitation->email}}
                                    </td>
                                    <td>
                                        {{date_format($invitation->created_at, 'd/m/Y')}}
                                    </td>
                                    <td>
                                        <a href='#' class='btn btn-primary btn-sm float-left'>Reenviar</a>
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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($members as $member)
                                <tr class='text-center'>
                                    <td>
                                        <a href='#' class='float-left'>
                                            <i class='fas fa-user-times text-danger'></i>
                                        </a>
                                        {{$member->name}}
                                    </td>
                                    <td>{{$member->email}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>



@endsection
