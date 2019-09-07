@extends('layouts.Painel.LayoutFull')

@section('content')
    <div class='card'>
        <div class='card-header'>Cadastrar Endereço</div>
        <div class='card-body'>
            @if( isset($errors) && count($errors) > 0 )
                <div class='error'>
                    <ul>
                        @foreach($errors->all() as $error)
                            <list style='color:red'>{{$error}}</list>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form id="logout-form" action="{{ route('painel.republic.store') }}" method="POST">
                @csrf
                <input name='user_id' value='{{ Auth::user()->id }}' type='hidden'>
                <div class="row">
                    <div class="form-group col-md-4 col-lg-4 col-sm-12">
                        <label>Rua</label>
                        <input id="street" name='street' type="text" class="form-control"
                               placeholder="Ex: Av. General Affonseca" style='width: 100%' required>
                    </div>
                    <div class="form-group col-md-1 col-lg-1 col-sm-6">
                        <label>Número</label>
                        <input id="number" name='number' type="number" class="form-control" placeholder="Ex: 251"
                               style='width: 100%' required>
                    </div>
                    <div class="form-group col-md-4 col-lg-4 col-sm-12">
                        <label>Bairro</label>
                        <input id="neighborhood" name='neighborhood' type="text" class="form-control"
                               placeholder="Ex: Manejo" style='width: 100%' required>
                    </div>
                    <div class="form-group col-md-3 col-lg-3 col-sm-12">
                        <label>Cep</label>
                        <input id="cep" name='cep' type="text" class="form-control"
                               placeholder="Ex: Av. General Affonseca" style='width: 100%' required>
                    </div>
                    <div class="form-group col-md-8 col-lg-8 col-sm-12">
                        <label>Cidade</label>
                        <input id="city" name='city' type="text" class="form-control" placeholder="Ex: Resende"
                               style='width: 100%' required>
                    </div>
                    <div class="form-group col-md-4 col-lg-4 col-sm-12">
                        <label>Estado</label>
                        <input id="state" name='state' type="text" class="form-control" placeholder="Ex: Rio de Janeiro"
                               style='width: 100%' required>
                        <small class="form-text text-muted"></small>
                    </div>
                </div>
                <button type="submit" class="btn btn-success"><i class="fas fa-save mr-2"></i>Salvar</button>
            </form>
        </div>
    </div>
@endsection
