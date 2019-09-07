{{--@extends('layouts.app')--}}
@extends('layouts.Painel.LayoutFull')

@section('content')
    {{--        {!! Toastr::success('como q retorna essa merda certo ?', $title = null, $options = []) !!}--}}
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-nav text-white">Convites Pendentes</div>
                    <div class="card-body">
                        @if(count($invitations)>0)
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <table class='table-sm table-striped table-light w-100 text-center'>
                                <tr>
                                    <td>Usuário</td>
                                    <td>República</td>
                                    <td>Aceitar</td>
                                </tr>
                                @foreach($invitations as $invitation)
                                    <tr>
                                        <td>{{$invitation->user->name}}</td>
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
                        @else
                            <div class='alert alert-primary w-100 mb-0'>Você não possui convites</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
