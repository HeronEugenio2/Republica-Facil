{{--@extends('layouts.app')--}}
@extends('layouts.Painel.LayoutFull')

@section('content')
    @if(count($republics)>0)
        <div class="card">
            <div class="card-header">Sua República</div>
            <div class="card-body">
                <div class='table-responsive'>
                    <table class="table table-sm table-bordered table-hover table-striped text-center">
                        <thead>
                            <tr>
                                <th scope="col">#ID</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Email</th>
                                <th scope="col">Vagas</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Ativo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($republics as $republic)
                                <tr class='text-center'>
                                    <td>{{$republic->id}}</td>
                                    <td>
                                        {{$republic->name}}
                                        <a class='float-right' href='{{route('administrative.republics.show', $republic->id)}}' ><i class="fas fa-info-circle text-primary"></i></a>
                                    </td>
                                    <td>{{$republic->email}}</td>
                                    <td>{{$republic->qtdVacancies}}</td>
                                    <td>{{$republic->type->title}}</td>
                                    <td>
                                        <form action="{{route('administrative.republics.update', $republic->id)}}" method="POST" >
                                            @method('PUT')
                                            @csrf
                                            @if($republic->active_flag == 0)
                                                <button type='submit' class='btn btn-sm btn-danger'  name='active_flag' value='1'>Não</button>
                                            @else
                                                <button type='submit' class='btn btn-sm btn-success' name='active_flag' value='0'>Sim</button>
                                            @endif
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-primary col-md-6 col-lg-4 col-sm-12">
            <h2><i class="fas fa-exclamation-triangle"></i> Olá usuário {{ Auth::user()->name }} !</h2>
            Ainda não existem repúblicas cadastradas na plataforma.
        </div>
    @endif
@endsection
{{--@push('scripts')--}}
{{--<script type='text/javascript'>--}}
{{----}}
{{--</script>--}}
{{--@endpush--}}
