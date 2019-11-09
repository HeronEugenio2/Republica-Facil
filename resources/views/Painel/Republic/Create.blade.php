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
            @if(isset($republic))
                <form id="logout-form" method="POST"
                      action="{{ route('painel.republic.update', ['republic'=>$republic->id]) }}"
                      enctype="multipart/form-data">
                    {{method_field('PUT')}}
                    @else
                        <form id="logout-form" action="{{ route('painel.republic.store') }}" method="POST"
                              enctype="multipart/form-data">
                            @endif
                            @csrf
                            <div class='row'>
                                @if(isset($republic))
                                    <div class='form-group col-6'>
                                        <label class='form-control-label' for='select_image'
                                               class='form-control-label'>
                                            Foto República
                                        </label>
                                        <br>
                                        <input name='image' style='display: none;' type='file'
                                               class='form-control input-pad' id='image'>
                                        <img
                                            src='{{isset($republic->image)? $republic->image : 'https://www.nato-pa.int/sites/default/files/default_images/default-image.jpg'}}'
                                            id='previewimage' accept="image/*"
                                            alt='Nenhuma foto cadastrada'
                                            style='max-height: 250px; max-width: 350px; cursor: pointer;'>
                                    </div>
                                @endif
                                <div class='col-6'>
                                    <div class='form-group'>
                                        <label class='form-control-label' for='name-republic'
                                               class='form-control-label'>Nome da Republica</label>
                                        <input type='text' class='form-control w-100' name='name'
                                               value='{{isset($republic)? $republic->name : ''}}'
                                               placeholder='Adicionae um nome para sua republica' style='width: 100%;'
                                               required>
                                        <small id='nameHelp' class='form-text text-muted'>O nome será mostrado na
                                            pesquisa dos usuários</small>
                                    </div>
                                    <div class='form-group'>
                                        <label class='form-control-label' for='email-republic'
                                               class='form-control-label'>E-mail da Repúlica</label>
                                        <input class='form-control w-100' id='email'
                                               value='{{isset($republic)? $republic->email : ''}}'
                                               name='email'
                                               aria-describedby='emailHelp'
                                               placeholder='republica.estudantes@gmail.com'
                                               style='width: 100%' required>
                                        <small id="emailHelp" class="form-text text-muted">Coloque aqui o e-mail para
                                            contato com a república.
                                        </small>
                                    </div>
                                    <div class='form-group'>
                                        <label class='form-control-label' for='email-republic'
                                               class='form-control-label'>WhatsApp da Repúlica</label>
                                        <input class='form-control w-100' id='phone'
                                               value='{{isset($republic)? $republic->phone : ''}}'
                                               name='phone'
                                               aria-describedby='emailHelp'
                                               placeholder='24992482156'
                                               style='width: 100%' required>
                                        <small id="emailHelp" class="form-text text-muted">WhatsApp para contato.
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="form-group col-md-4 col-lg-4 col-sm-12">
                                    <label class='form-control-label'>Rua</label>
                                    <input id="street" name='street'
                                           value='{{isset($republic)?$republic->street:old('street')??''}}' type="text"
                                           class="form-control"
                                           placeholder="Ex: Av. General Affonseca" style='width: 100%'>
                                </div>
                                <div class="form-group col-md-1 col-lg-1 col-sm-6">
                                    <label class='form-control-label'>Número</label>
                                    <input id="number" name='number'
                                           value='{{isset($republic)?$republic->number:old('number')??''}}'
                                           type="text" class="form-control" placeholder="Ex: 251"
                                           style='width: 100%'>
                                </div>
                                <div class="form-group col-md-4 col-lg-4 col-sm-12">
                                    <label class='form-control-label' class='form-control-label'>Bairro</label>
                                    <input id="district" name='district'
                                           value='{{isset($republic)?$republic->district:old('district')??''}}'
                                           type="text" class="form-control"
                                           placeholder="Ex: Manejo" style='width: 100%'>
                                </div>
                                <div class="form-group col-md-3 col-lg-3 col-sm-12">
                                    <label class='form-control-label'>Cep</label>
                                    <input id="cep" name='cep'
                                           value='{{isset($republic)?$republic->cep:old('cep')??''}}' type="text"
                                           class="form-control"
                                           placeholder="Ex: Av. General Affonseca" style='width: 100%'>
                                </div>
                                <div class="form-group col-md-8 col-lg-8 col-sm-12">
                                    <label class='form-control-label'>Cidade</label>
                                    <input id="city" name='city'
                                           value='{{isset($republic)?$republic->city:old('city')??''}}' type="text"
                                           class="form-control" placeholder="Ex: Resende"
                                           style='width: 100%'>
                                </div>
                                <div class="form-group col-md-4 col-lg-4 col-sm-12">
                                    <label class='form-control-label'>Estado</label>
                                    <input id="state" name='state'
                                           value='{{isset($republic)?$republic->state:old('district')??''}}' type="text"
                                           class="form-control" placeholder="Ex: Rio de Janeiro"
                                           style='width: 100%'>
                                    <small class="form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class='form-control-label' for="inputDescription">Descrição:</label>
                                <textarea id="inputDescription" name='description'
                                          value='{{isset($republic) ?$republic->description:old('description')??''}}'
                                          type="text" class="form-control"
                                          placeholder="Ex: Nossa república possui 4 quartos, sendo 3 ocupados e um com dispoibilidade para até no máximo duas pessoas, 1 banheiro, 1 cozinha com duas geladeiras, um fogão e área de serviço com máquina de lavar."
                                          rows='7'
                                          style='width: 100%'>{{isset($republic) ?$republic->description:old('description')??''}}</textarea>
                                <small id="descriptionHelp" class="form-text text-muted">Coloque aqui informações
                                    importantes que você deseja que as pessoas saibam.
                                </small>
                            </div>
                            <div class='row'>
                                <div id='member' class="form-group col-md-2 col-lg-2 col-sm-12">
                                    <div class="form-group">
                                        <label class='form-control-label' for="inputMember">Membros</label>
                                        <input id="inputMember"
                                               value='{{isset($republic)?$republic->qtdMembers:old('qtdMembers')??''}}'
                                               name='qtdMembers' type="text" class="form-control"
                                               aria-describedby="memberHelp" placeholder="Ex: 5" style='width: 100%'
                                               required>
                                        <small id="memberHelp" class="form-text text-muted">Quantidade de membros
                                            residentes hoje na república.
                                        </small>
                                    </div>
                                </div>
                                <div id='vacancy' class="form-group col-md-2 col-lg-2 col-sm-12">
                                    <div class="form-group">
                                        <label class='form-control-label' for="inputVacancy">Vagas</label>
                                        <input id="inputVacancy"
                                               value='{{isset($republic)?$republic->qtdVacancies:old('qtdVacancies')??''}}'
                                               name='qtdVacancies' type="text" class="form-control"
                                               aria-describedby="vacancyHelp" placeholder="Ex: 1" style='width: 100%'
                                               required>
                                        <small id="vacancyHelp" class="form-text text-muted">Quantidade de vagas
                                            disponíveis hoje na sua república
                                        </small>
                                    </div>
                                </div>
                                <div id='type' class="form-group col-md-2 col-lg-2 col-sm-12">
                                    <label class='form-control-label' for="inputType">Tipo:</label>
                                    @if(isset($types))
                                        <select name='type_id' class='form-control col' id="inputCategory" required>
                                            @foreach($types as $type)
                                                <option
                                                    value='{{$type->id}}' {{ isset($republic) ? ($type->id == $republic->type_id ? 'selected="selected"' : '') : '' }}>
                                                    {{$type->title}}
                                                </option>
                                            @endforeach
                                        </select>
                                    @endif
                                </div>
                                <div id='valueDiv' class="form-group col-md-2 col-lg-2 col-sm-12">
                                    <div class="form-group">
                                        <label class='form-control-label' for="value">Preço</label>
                                        <input id="value"
                                               value='{{isset($republic) ? $republic->value : old('value') ?? ''}}'
                                               name='value' type="text" class="value form-control"
                                               aria-describedby="vacancyHelp" placeholder="R$ 450,00"
                                               style='width: 100%' required>
                                        <small id="vacancyHelp" class="form-text text-muted">Valor do aluguel da
                                            república
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <button id="save" type="submit" class="btn btn-success"><i class="fas fa-save mr-2"></i>Salvar
                            </button>
                        </form>
                </form>
        </div>
    </div>
    {{--@if(isset($republic))
                                <img id='imgSrc' class='mb-2' src='{{$republic->image}}'
                                     style="width:200px; height:200px;"/>
                                <br>
                                <div class="input-group mb-3">
                                    <input type='text' name='image'
                                           value="{{isset($republic) ? $republic->image:old('image') ?? ''}}" id='image'
                                           class="form-control"
                                           placeholder="Ex: www.facebook.com/user/image.png"
                                           style='border-top-right-radius: 0;border-bottom-right-radius: 0;max-width: 300px;'>
                                    <div class="input-group-append">
                                        <button id='btnCheck' class="btn btn-outline-danger" type="button">Upload
                                        </button>
                                    </div>
                                </div>
                            @endif--}}
@endsection
@push('scripts')
    <script type="text/javascript" src="{{'js/scripts/jquery.imgselect.js'}}"></script>
    <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>

    <script type='text/javascript'>
        $('#value').mask('###0,00', {reverse: true});

        // $('#btnCheck').click(function () {
        //     let src = $('#image').val();
        //     $('#imgSrc').attr("src", src);
        //     if ($('#image').val() == '' || $('#image').val() == []) {
        //         $('#imgSrc').attr("src", "https://www.nato-pa.int/sites/default/files/default_images/default-image.jpg");
        //     }
        // });

        //trocar virgula
        $('#save').click(function () {
            let rep = $('#value').val();
            let valuePoint = rep.replace('.', '');
            valuePoint = rep.replace(',', '.');
            $('#value').val(valuePoint);
        });

        //image
        let p = $("#previewimage");
        $("#image").on("change", function () {
            let imageReader = new FileReader();
            imageReader.readAsDataURL(document.getElementById("image").files[0]);

            imageReader.onload = function (oFREvent) {
                p.attr('src', oFREvent.target.result).fadeIn();
            };
        });

        $("#previewimage").on('click', function () {
            $("#image").click();
        });

        @if(!isset($republic->image))

        $('#previewimage').error(function () {
            $(this).attr('src', '{{'https://www.nato-pa.int/sites/default/files/default_images/default-image.jpg'}}');
        });
        @endif
    </script>
@endpush
