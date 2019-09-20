@extends('layouts.Painel.LayoutFull')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">Informações do perfil</div>
            <div class="card-body">
                <form>
                    <div class="row">
                        <div class="col-6">
                            <img src="{{$user->republic->image}}" alt="" style="width: 180px;height: 180px"
                                 class="my-2">
                            <div class="input-group mb-3">
                                <input type='text' name='image' id='image' class="form-control"
                                       placeholder="Ex: www.facebook.com/user/image.png"
                                       style='border-top-right-radius: 0;border-bottom-right-radius: 0;max-width: 300px;'>
                                <div class="input-group-append">
                                    <button id='btnCheck' class="btn btn-outline-danger" type="button">Upload
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="" class="form-control-label">Nome de usuário</label>
                                <input type="text" class="form-control w-100" value="{{$user->name}}"/>
                            </div>
                            <div class="form-group">
                                <label for="" class="form-control-label">E-mail</label>
                                <input type="email" class="form-control w-100" value="{{$user->email}}"/>
                            </div>
                            <div class="form-group">
                                <label for="" class="form-control-label">Telefone</label>
                                <input type="email" class="form-control w-100" value="{{$user->email}}"/>
                            </div>
                            <button type="submit" class="btn btn-primary">Editar</button>
                        </div>
                    </div>

                </form>
            </div>


        </div>
    </div>
@endsection

<script type="text/javascript">

</script>
