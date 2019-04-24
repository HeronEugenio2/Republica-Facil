@extends('layouts.Painel.LayoutFull')

@section('content')
    <div id='advertList' class='card'>
        <div id='advertHeader' class='card-header text-white bg-nav'>{{$advert->title}}</div>
        <div id='advertBody' class='card-body '>
            <img src="{{$advert->image->url}}" height="180" width="180">
            {{--<form action=''>--}}
            {{--<div class="form-group">--}}
            {{--<label>Título</label>--}}
            {{--<input type="text" class="form-control" placeholder="{{$advert->title}}" name='title' style='width: 100%'>--}}
            {{--</div>--}}
            {{--<div class="form-group">--}}
            {{--<label>Descrição</label>--}}
            {{--<textarea type="text" class="form-control" placeholder="{{$advert->description}}" name='description' style='width: 100%' rows='10'></textarea>--}}
            {{--</div>--}}
            {{--</form>--}}
        </div>
    </div>
@endsection
