{{--@extends('layouts.app')--}}
@extends('layouts.Painel.LayoutFull')

@section('content')
    {{--        {!! Toastr::success('como q retorna essa merda certo ?', $title = null, $options = []) !!}--}}
    <div class="card">
        <div class="card-body">
            <div class="p-4 mb-2 alert alert-primary w-100">
                <h1>CONVITES</h1>
                <div class="row">
                    <div class="col-sm-12 col-lg-6 col-md-6">
                        <h3>Olá a {{auth()->user()->name}}, seja bem vindo ao República Fácil. Seus convites de
                            participação estão listados logo abaixo. Seja bem vindo!</h3>
                        <div class="">
                            @if(count($invitations)>0)
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <div class="table-responsive rounded mb-4">
                                    <table
                                        class='table-sm table-striped table-light w-100 text-center bg-gradient-white'>
                                        <tr>
                                            <td>Usuário</td>
                                            <td>República</td>
                                            <td>Aceitar</td>
                                        </tr>
                                        @foreach($invitations as $invitation)
                                            <tr>
                                                <td>
                                                    <img src="{{$invitation->user->image}}"
                                                         style="width: 32px; height: 32px; border-radius: 50%">
                                                    {{$invitation->user->name}}
                                                </td>
                                                <td>{{$invitation->republic->name}}</td>
                                                <td>
                                                    <a href='{{route('painel.invitationAccept', $invitation->id)}}'
                                                       class='btn btn-sm btn-primary'>Sim</a>
                                                    <a href='{{route('painel.invitationAccept', $invitation->id)}}'
                                                       class='btn btn-sm btn-danger'>Não</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            @else
                                <div class='alert alert-primary w-100 mb-0'><h3>Oops!</h3> você ainda não possui nenhum
                                    convite
                                </div>
                            @endif

                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-6 col-md-6 text-center">
                        <img
                            src="{{asset('/images/invitation.png')}}"
                            class="img-fluid" style="width: 300px">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
