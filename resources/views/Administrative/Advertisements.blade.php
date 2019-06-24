{{--@extends('layouts.app')--}}
@extends('layouts.Painel.LayoutFull')

@section('content')
    @if(count($advertisements)>0)
        <div class="card">
            <div class="card-header">Anúncios</div>
            <div class="card-body">
                <div class='table-responsive'>
                    <table class="table table-sm table-bordered table-hover table-striped text-center">
                        <thead>
                            <tr>
                                <th scope="col">#ID</th>
                                <th scope="col">Imagem</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Valor</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Ativo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($advertisements as $advertisement)
                                <tr class='text-center'>
                                    <td>{{$advertisement->id}}</td>
                                    <td>
                                        <img src="{{$advertisement->image}}" height="42" width="42"></td>
                                    <td>{{$advertisement->title}}</td>
                                    <td>R$ {{money_format('%.2n', $advertisement->value)}}</td>
                                    <td>{{$advertisement->category->title}}</td>
                                    <td>
                                        <form action="{{route('administrative.advertisements.update', $advertisement->id)}}" method="POST" >
                                            @method('PUT')
                                            @csrf
                                            @if($advertisement->active_flag == 0)
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
                    <div class='my-2'>{{$advertisements->links()}}</div>

                </div>
            </div>
        </div>
    @else
        <div class="alert alert-primary col-md-6 col-lg-4 col-sm-12">
            <h2><i class="fas fa-exclamation-triangle"></i> Olá usuário {{ Auth::user()->name }} !</h2>
            Ainda não existem epúblicas cadastradas na plataforma.
        </div>
    @endif
@endsection
{{--@push('scripts')--}}
{{--<script type='text/javascript'>--}}
{{----}}
{{--</script>--}}
{{--@endpush--}}
