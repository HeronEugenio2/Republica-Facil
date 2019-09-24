@extends('layouts.Painel.LayoutFull')

@push('css')


@endpush

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">Informações do perfil</div>
            <div class="card-body">
                @if($errors->any())
                    @foreach($errors->all() as $error)      {{ $error }} @endforeach
                @elseif(session()->has('success'))
                    {{ session('success') }}
                @endif
                <form action="{{route('painel.profile.update', auth()->user()->id)}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-6 row">
                            <span id="uploadForm"></span>
                            <div>{{$errors->first('img')}}</div>
                            {{--<img id='imgSrc' class='my-2' src='{{$user->image}}' style="width:200px; height:200px;"/>
                            <br>
                            <div class="input-group mb-3">
                                <input type='text' name='image' id='image' value="{{$user->image}}" class="form-control"
                                       placeholder="Ex: www.facebook.com/user/image.png"
                                       style='border-top-right-radius: 0;border-bottom-right-radius: 0;max-width: 300px;'>
                                <div class="input-group-append">
                                    <button id='btnCheck' class="btn btn-outline-danger" type="button">Upload
                                    </button>
                                </div>
                            </div>--}}


                            <input type="file" name="file" id="file"/>

                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="" class="form-control-label">Nome de usuário</label>
                                <input type="text" class="form-control w-100" name="name" value="{{$user->name}}"/>
                            </div>
                            <div class="form-group">
                                <label for="" class="form-control-label">E-mail</label>
                                <input type="email" class="form-control w-100" name="email" value="{{$user->email}}"/>
                            </div>
                            <div class="form-group">
                                <label for="" class="form-control-label">Telefone</label>
                                <input id="phone" type="text" maxlength="14" class="form-control w-100" name="phone"
                                       value="{{$user->phone}}"/>
                            </div>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

    <script type="text/javascript">
        $(document).ready(function () {
            $('#phone').mask('(99) 99999-9999');

            $("#file").change(function () {
                filePreview(this);
            });


            function filePreview(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#uploadForm + img').remove();
                        $('#uploadForm').after('<img class="img-fluid img-thumbnail" src="' + e.target.result + '" width="200" height="300"/>');
                    }

                    $("#file").val(e.target.result);
                    reader.readAsDataURL(input.files[0]);
                }
            }

        });

        /*$('#btnCheck').click(function () {
            let src = $('#image').val();
            $('#imgSrc').attr("src", src);
            if ($('#image').val() == '' || $('#image').val() == []) {
                $('#imgSrc').attr("src", "https://www.nato-pa.int/sites/default/files/default_images/default-image.jpg");
            }
        });*/


    </script>
@endpush
