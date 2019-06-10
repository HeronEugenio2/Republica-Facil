@extends('Portal.TemplateLaravel')
@push('css')

@endpush

@section('content')

    <section class='my-4'>
        <center>
            <span class='mr-4'>
                <i class="fas fa-users text-muted fa-2x"></i>
                <label for="">{{$republic->qtdMembers}}</label>
            </span>
            <span class='mx-1'><img src="{{$republic->image}}" class='rounded-circle shadow border' style='width: 150px; height: 150px;'></span>
            <span class='ml-4'>
                <i class="fas fa-bed text-muted fa-2x"></i>
                {{$republic->qtdVacancies}}
            </span>
        </center>
    </section>
    <section>
        <center>
            <h2 class='text-muted'>{{$republic->name}}</h2>
            <hr>
            {{$republic->description}}
            <br>
            <div class='i bg-dark p-4'>
                <i class="fas fa-shower fa-2x"></i> <i class="fas fa-bath fa-2x"></i>
                <i class="fas fa-wifi text-success fa-2x"></i> <i class="fas fa-bed text-success fa-2x"></i>
                <i class="fas fa-smoking text-danger fa-2x"></i>
            </div>
            <div class='m-4'>
                <a href='#' class='btn  btn-success px-4'><i class="fab fa-whatsapp text-white"></i> Contato</a>
            </div>
        </center>
    </section>
@endsection

