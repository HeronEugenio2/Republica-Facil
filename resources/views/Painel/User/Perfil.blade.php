@extends('layouts.Painel.LayoutFull')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">Informações do perfil</div>
            <div class="card-body">
                <form action="{{route('painel.user.update', $user->id)}}" method="POST" enctype="multipart/form-data">
                    @method("PUT")
                    @csrf

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="row">
                        <div class="form group col-6">
                            <label for="select_profile_photo" class="form-control-label">Foto de perfil</label>
                            <br>
                            <input name="profile_photo" type="file" class="form-control input-pad" id="profile_photo"
                                   style="display: none;">
                            <div style="margin: 20px 0 0 30px;">
                                <img src="{{asset('images/'.$user->image)}}" id="previewimage"
                                     alt="Nenhuma foto cadastrada" accept="image/*"
                                     style="max-height: 250px; max-width: 350px; cursor: pointer;">
                            </div>
                            <input type="hidden" name="photo_x1">
                            <input type="hidden" name="photo_y1">
                            <input type="hidden" name="photo_w">
                            <input type="hidden" name="photo_h">

                            {{--
                            <img id='imgSrc' class='my-2' src='{{$user->image}}' style="width:200px; height:200px;"/>
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
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="" class="form-control-label">Nome de usuário</label>
                                <input type="text" class="form-control w-100" name="name" value="{{$user->name}}"/>
                            </div>
                            <div class="form-group">
                                <label for="" class="form-control-label">E-mail</label>
                                <input type="email" class="form-control w-100" name="email" disabled
                                       value="{{$user->email}}"/>

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
    <script type="text/javascript" src="{{'js/scripts/jquery.imgselect.js'}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#phone').mask('(99) 99999-9999');
        });

        let p = $("#previewimage");
        $("#profile_photo").on("change", function () {
            let imageReader = new FileReader();
            imageReader.readAsDataURL(document.getElementById("profile_photo").files[0]);

            imageReader.onload = function (oFREvent) {
                p.attr('src', oFREvent.target.result).fadeIn();
            };
        });

        $("#previewimage").on('click', function () {
            $("#profile_photo").click();
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
