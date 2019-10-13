@extends('layouts.Painel.LayoutFull')

@section('content')
    <div class='card'>

        <div class='card-header bg-nav text-white'>Criar Anúncio</div>
        <div class='card-body'>
            <form id="logout-form" method="POST"
                  action="{{ route('painel.advertisement.store', ['user'=>$user->id]) }}">
                @csrf
                {{--<input type='hidden' name='republic_id' value='{{$republic->id}}'>--}}
                <input type='hidden' name='user_id' value='{{$user->id}}'>
                <img id='imgSrc' class='mb-2'
                     src='https://www.nato-pa.int/sites/default/files/default_images/default-image.jpg'
                     style="width:200px; height:200px;"/>
                <div class="input-group w-50 mb-3">
                    <input type='text' name='image' id='image' class="form-control"
                           placeholder="Ex: www.facebook.com/user/image.png"
                           style='border-top-right-radius: 0; border-bottom-right-radius: 0;'>
                    <div class="input-group-append">
                        <button id='btnCheck' class="btn btn-outline-danger" type="button">Upload</button>
                    </div>
                </div>
                <div class="form-group col-12 p-0">
                    <label>Título</label>
                    <input id="inputTitle" name='title' type="text" class="form-control"
                           aria-describedby="descriptionHelp" placeholder="Ex: Vaga Masculina " style='width: 100%'
                           required>
                    <small id="descriptionHelp" class="form-text text-muted">Insira titulo do anúncio.
                    </small>
                </div>
                <div class="form-group col-12 p-0">
                    <label>Descrição</label>
                    <input id="inputDescription" name='description' type="text" class="form-control"
                           aria-describedby="descriptionHelp" style='width: 100%'
                           required>
                    @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <small id="descriptionHelp" class="form-text text-muted">Insira descrição do anúncio.
                    </small>
                    <div id="address-anuncio">
                        <label>Endereço:</label>
                        <input id="street" name="street" type="text" class="form-control">
                        @error('street')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label>Cep:</label>
                        <input id="cep" name="cep" type="text" class="form-control">
                        @error('cep')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label>Bairro:</label>
                        <input id="address" name="address" type="text" class="form-control">
                        @error('address')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label>Cidade:</label>
                        <input id="city" name="city" type="text" class="form-control">
                        @error('city')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label>Estado:</label>
                        <input id="state" name="state" type="text" class="form-control">
                        @error('state')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                <div class='row'>
                    <div id='type' class="form-group col-md-4 col-lg-4 col-sm-12">
                        <label for="inputType">Categoria:</label>
                        @if(isset($advCategories))
                            <select name='category_id' class='form-control col' id="inputCategory" required>
                                @foreach($advCategories as $advCategory)
                                    <option value='{{$advCategory->id}}'>{{$advCategory->title}}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                    <div id='type' class="form-group col-md-4 col-lg-4 col-sm-12">
                        <label for="inputType">Recursos:</label>
                        @if(isset($resources))
                            @foreach($resources as $resource)
                                <div class="checkbox">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" checked data-toggle="toggle" data-onstyle="success"
                                               name="{{$resource->name}}" > {{$resource->name}}
                                    </label>
                                </div>

                            @endforeach
                        @endif
                    </div>


                </div>
                <div id='adValue' class="form-group col-md-3 col-lg-3 col-sm-12">
                    <label for="inputValue">Valor</label>
                    <input id="inputValue" name='value' type="text" step='0.01' class="form-control"
                           aria-describedby="spentHelp" placeholder="" style='width: 100%'>
                </div>
                <button type="submit" class="btn btn-success"><i class="fas fa-save mr-2"></i>Salvar</button>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script type='text/javascript'>
        // var $preview = document.getElementById('preview');
        // document.querySelector('#inputFile').addEventListener('change', function(){
        //     var reader = new FileReader(),
        //         file = this.files[0];
        //
        //     if(file)
        //         reader.readAsDataURL(file);
        //     else
        //         $preview.src = '';
        //
        //     reader.onloadend = function(){
        //         $preview.src = reader.result;
        //     };
        // });
        $('#inputValue').mask('#.##0,00', {reverse: true});

        $('#btnCheck').click(function () {
            let src = $('#image').val();
            $('#imgSrc').attr("src", src);
            if ($('#image').val() == '' || $('#image').val() == []) {
                $('#imgSrc').attr("src", "https://www.nato-pa.int/sites/default/files/default_images/default-image.jpg");
            }
        });



    </script>
@endpush
