@extends('layouts.Painel.LayoutFull')

@section('content')
    <div class='card'>
        <div class='card-header'>Cadastrar República</div>
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
                <div class="form-group">
                    <label for="inputName">Nome</label>
                    <input name='name' type="text" class="form-control" id="inputName" aria-describedby="nameHelp"
                           placeholder="Adicione um nome pra sua republica." style='width: 100%' required>
                    <small id="nameHelp" class="form-text text-muted">O nome será mostrado na pesquisa dos usuários.
                    </small>
                </div>
                <div class="row">
                    <div class="form-group col-md-4 col-lg-4 col-sm-12">
                        <label>Rua</label>
                        <input id="street" name='street' type="text" class="form-control"
                               placeholder="Ex: Av. General Affonseca" style='width: 100%'>
                    </div>
                    <div class="form-group col-md-1 col-lg-1 col-sm-6">
                        <label>Número</label>
                        <input id="number" name='number' type="number" class="form-control" placeholder="Ex: 251"
                               style='width: 100%'>
                    </div>
                    <div class="form-group col-md-4 col-lg-4 col-sm-12">
                        <label>Bairro</label>
                        <input id="neighborhood" name='neighborhood' type="text" class="form-control"
                               placeholder="Ex: Manejo" style='width: 100%'>
                    </div>
                    <div class="form-group col-md-3 col-lg-3 col-sm-12">
                        <label>Cep</label>
                        <input id="cep" name='cep' type="text" class="form-control"
                               placeholder="Ex: Av. General Affonseca" style='width: 100%'>
                    </div>
                    <div class="form-group col-md-8 col-lg-8 col-sm-12">
                        <label>Cidade</label>
                        <input id="city" name='city' type="text" class="form-control" placeholder="Ex: Resende"
                               style='width: 100%'>
                    </div>
                    <div class="form-group col-md-4 col-lg-4 col-sm-12">
                        <label>Estado</label>
                        <input id="state" name='state' type="text" class="form-control" placeholder="Ex: Rio de Janeiro"
                               style='width: 100%'>
                        <small class="form-text text-muted"></small>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputDescription">Descrição:</label>
                    <textarea id="inputDescription" name='description' type="text" class="form-control"
                              placeholder="Ex: Nossa república possui 4 quartos, sendo 3 ocupados e um com dispoibilidade para até no máximo duas pessoas, 1 banheiro, 1 cozinha com duas geladeiras, um fogão e área de serviço com máquina de lavar."
                              rows='7' style='width: 100%'></textarea>
                    <small id="descriptionHelp" class="form-text text-muted">Coloque aqui informações importantes que você deseja que as pessoas saibam.
                    </small>
                </div>
                <div class='row'>
                    <div id='email' class="form-group col-md-4 col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label for="inputEmail">E-mail</label>
                            <input id="inputEmail" name='email' type="email" class="form-control"
                                   aria-describedby="emailHelp" placeholder="Ex: powerG@gmail.com" style='width: 100%'
                                   required>
                            <small id="emailHelp" class="form-text text-muted">Coloque aqui o e-mail para contato com a república.
                            </small>
                        </div>
                    </div>
                    <div id='member' class="form-group col-md-2 col-lg-2 col-sm-12">
                        <div class="form-group">
                            <label for="inputMember">Membros</label>
                            <input id="inputMember" name='qtdMembers' type="number" class="form-control"
                                   aria-describedby="memberHelp" placeholder="Ex: 5" style='width: 100%' required>
                            <small id="memberHelp" class="form-text text-muted">Quantidade de membros residentes hoje na república.
                            </small>
                        </div>
                    </div>
                    <div id='vacancy' class="form-group col-md-2 col-lg-2 col-sm-12">
                        <div class="form-group">
                            <label for="inputVacancy">Vagas</label>
                            <input id="inputVacancy" name='qtdVacancies' type="number" class="form-control"
                                   aria-describedby="vacancyHelp" placeholder="Ex: 1" style='width: 100%' required>
                            <small id="vacancyHelp" class="form-text text-muted">Quantidade de vagas disponíveis hoje na sua república
                            </small>
                        </div>
                    </div>
                    <div id='type' class="form-group col-md-4 col-lg-4 col-sm-12">
                        <label for="inputType">Tipo:</label>
                        <select id="inputType" name="type_id" class='form-control col' required>
                            <option value=''>Escolha</option>
                            <option value="1">Masculina</option>
                            <option value="2">Feminina</option>
                            <option value="3">Mista</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-success"><i class="fas fa-save mr-2"></i>Salvar</button>
            </form>
        </div>
    </div>
@endsection
