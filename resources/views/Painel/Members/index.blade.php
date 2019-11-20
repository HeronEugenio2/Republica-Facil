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
    <div class="card">
        <div class="card-body">
            <div class="p-4 mb-2 alert alert-primary w-100">
                <h1>CONVITES</h1>
                <div class="row">
                    <div class="col-sm-12 col-lg-6 col-md-6">
                        <h3>Envie convites por email para os membros da sua república se cadastrarem na plataforma</h3>
                        <form action='{{route('painel.member.store')}}' method='POST' class='mb-2'>
                            @csrf
                            <div class='input-group mb-3'>
                                <input name='email' type='email' class='form-control'
                                       placeholder='Endereço de e-mail do convidado'
                                       aria-label="Recipient's username" aria-describedby="basic-addon2"
                                       style='border-top-right-radius: initial;border-bottom-right-radius: initial;'
                                       required>
                                <div class='input-group-append'>
                                    <button type='submit' class='btn btn-primary'>Enviar Convite</button>
                                </div>
                            </div>
                        </form>
                        <div class="mb-4">
                            @if(isset($invitations) && count($invitations) > 0)
                                <div class='table-responsive rounded'>
                                    <table class='table bg-gradient-white table-bordered table-sm text-center'>
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
                                                    {{--                                                    <a href='#' class='btn btn-primary btn-sm my-1 float-left'>Reenviar</a>--}}
                                                    <a href='#'
                                                       class='btn btn-danger btn-sm my-1 float-left'>Cancelar</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>

                    </div>
                    <div class="col-sm-12 col-lg-6 col-md-6">
                        <img
                            src="{{asset('/images/members-create.png')}}"
                            class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="">
                <div class="text-center mt-3">
                    <h1>Membros</h1>
                    <hr>
                </div>
                @if(!empty($members))
                    <div class="row">
                        @foreach($members as $member)
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="jumbotron p-4">
                                    <div class="media">
                                        <img class="mr-3 mt-2 img-thumbnail rounded-circle" src="{{$member->image}}"
                                             style="width: 120px;height:120px">
                                        <div class="media-body text-left">
                                            <h2>{{$member->name}}</h2>
                                            {{$member->email}}<br>
                                            <br>
                                            @if($republic->user_id == \Illuminate\Support\Facades\Auth::user()->id)
                                                <a href='{{route('painel.removeMember', $member->id)}}'
                                                   class='btn btn-outline-danger'>
                                                    <i class='fas fa-user-times'></i><strong> Remover Membro</strong>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
