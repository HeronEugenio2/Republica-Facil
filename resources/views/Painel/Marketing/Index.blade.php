@extends('layouts.Painel.LayoutFull')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4" style="min-height: 600px; background-color: white;">
                <div class="progress">
                    <div class="progress-bar w-25">
                    </div>
                </div>
                <div class="page-header">
                    <label>
                        LayoutIt! <small>Teste o Marketing Digital da Platforma gratuitamente</small>
                    </label>
                </div>
                <h1> Etapa 1 de 3</h1>
                <form role="form">
                    <div class="form-group">
                        <h4>País</h4>
                        <select name="" id="" class="form-control w-100">
                            <option value="1">Brasil</option>
                            <option value="1">...</option>
                        </select>
                    </div>
                    <div class="checkbox">
                        <h4>Termos de Serviço</h4>
                        <label>
                            <input type="checkbox"/> Li e concordo com os <a href="#">Termos de Serviço da avaliação
                                gratuita</a>
                        </label>
                        <small class="d-flex flex-column">Necessário para continuar</small>
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">
                        Continuar
                    </button>
                </form>
                <div class="mt-4 text-center align-content-end"  style="bottom: 0;margin: 40px 0 56px 16px;position: absolute;text-align: center;">Política de Privacidade | Perguntas frequentes</div>
            </div>
            <div class="col-md-8">
            </div>
        </div>
    </div>
@endsection
