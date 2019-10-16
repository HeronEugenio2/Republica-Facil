@extends('layouts.Painel.LayoutFull')

@section('content')
    <div class='card'>
        <div class='card-header bg-nav text-white'>Criar Anúncio</div>
        <div class='card-body'>
            <form id="logout-form" method="POST"
                  action="{{ route('painel.advertisement.store', ['user'=>$user->id]) }}">
                @csrf
                {{--<input type='hidden' name='republic_id' value='{{$republic->id}}'>--}}
                <input type='hidden' name='user_id' value='{{$user->id}}'> <img id='imgSrc' class='mb-2'
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
                    <textarea id="inputDescription" name='description' class="form-control w-100" rows='10' required></textarea>
                    @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <small id="descriptionHelp" class="form-text text-muted">Insira descrição do anúncio.
                    </small>
                </div>
                <div class='row'>
                    <div class='col-sm-12 col-md-6 col-lg-6'>
                        <div class="form-group col-12 p-0">
                            <label>Rua:</label>
                            <input id="street" name="street" type="text" class="form-control w-100">
                            @error('street')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-12 p-0">
                            <label>Bairro:</label>
                            <input id="address" name="address" type="text" class="form-control  w-100">
                            @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-12 p-0">
                            <label>Cep:</label>
                            <input id="cep" name="cep" type="text" class="form-control w-100">
                            @error('cep')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-12 p-0">
                            <label for="inputValue">Valor</label>
                            <input id="inputValue" name='value' type="text" step='0.01' class="form-control w-100"
                                   aria-describedby="spentHelp" placeholder="">
                        </div>
                    </div>
                    <div class='col-sm-12 col-md-6 col-lg-6'>
                        <div class="form-group col-12 p-0">
                            <label>Estado:</label>
                            <input id="state" name="state" type="text" class="form-control  w-100">
                            @error('state')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-12 p-0">
                            <label>Cidade:</label>
                            <input id="city" name="city" type="text" class="form-control  w-100">
                            @error('city')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-12 p-0">
                            <label for="inputType">Categoria:</label>
                            @if(isset($advCategories))
                                <select name='category_id' class='form-control  w-100' id="inputCategory" required>
                                    @foreach($advCategories as $advCategory)
                                        <option value='{{$advCategory->id}}'>{{$advCategory->title}}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>
                    </div>
                </div>
                <div class='form-group col-12 p-0'>
                    <label for="inputType">Recursos:</label>
                    <div id='type' class="">
                        @if(isset($resources))
                            @foreach($resources as $resource)
                                <div class="checkbox mx-4">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" checked data-toggle="toggle" data-onstyle="success"
                                              value='{{$resource->id}}' name="{{$resource->name}}"> {{$resource->name}}
                                    </label>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <button type="submit" class="btn btn-success"><i class="fas fa-save mr-2"></i>Salvar</button>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script type='text/javascript'>
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
