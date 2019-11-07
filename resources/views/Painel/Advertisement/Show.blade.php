@extends('layouts.Painel.LayoutFull')

@section('content')
    <div id='advertList' class='card'>
        <div id='advertHeader' class='card-header text-white bg-nav'>Anúncio</div>
        @if(isset($advert))
            <div id='advertBody' class='card-body '>
                <div class='border my-2 p-4'>
                    <h3>{{$advert->title}}</h3>
                </div>
                <div class='my-2'>
                    <img src='{{$advert->image}}' style='width: 200px; height: 200px' alt=''>
                </div>
                <div class='my-2'>
                    <div class='card-colunms'>
                        @foreach($advert->images as $photo)
                            <input name="image" type="file" class="form-control input-pad" id="image"
                                   style="display: none;">
                            <div style="margin: 20px 0 0 30px;">
                                <img src='{{$photo->url}}' class="rounded-circle"
                                     {{--                                    src="{{asset($user->image != null ? $user->image :'/user-default.png') }}"--}}
                                     id="previewimage"
                                     alt="Nenhuma foto cadastrada" accept="image/*"
                                     style="max-height: 250px; max-width: 350px; cursor: pointer;">
                            </div>
                        @endforeach
                        <img class='my-1' src='http://inyogo.com/img/image_not_available.png' style='width: 100px; height: 100px' alt=''>
                        <img class='my-1' src='http://inyogo.com/img/image_not_available.png' style='width: 100px; height: 100px' alt=''>
                        <img class='my-1' src='http://inyogo.com/img/image_not_available.png' style='width: 100px; height: 100px' alt=''>
                        <img class='my-1' src='http://inyogo.com/img/image_not_available.png' style='width: 100px; height: 100px' alt=''>
                        <img class='my-1' src='http://inyogo.com/img/image_not_available.png' style='width: 100px; height: 100px' alt=''>
                        <img class='my-1' src='http://inyogo.com/img/image_not_available.png' style='width: 100px; height: 100px' alt=''>
                    </div>
                </div>
                <div class='border my-2 p-4'>
                    <h3>Descrição:</h3>
                    {{$advert->description}}
                    <hr>
                    <i class="far fa-money-bill-alt"></i> R$ {{number_format($advert->value,2,',', '.')}}
                </div>
                <div class='border my-2 p-4'>
                    <h3>Contato:</h3>
                    {{$advert->user->name}}<br>
                    {{$advert->user->email}}
                </div>
            </div>
            @else
            <h2 class='text-center'>Não possui república</h2>
        @endif
    </div>
@endsection
