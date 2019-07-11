@extends('Portal.TemplateLaravel')
<style>
    .text-grey2 {
        color: #636b6f !important;
    }
    h10 {
        color: #636b6f !important;
        font-family: unset;
        font-weight: 600;
        font-size: xx-large;
    }
</style>
@section('content')
    <div class="jumbotron jumbotron-fluid m-0 bg-dark">
        <div class="container text-white">
            <div class='col-md-12 col-lg-12 col-sm-12 text-center align-content-center'>
                <div class=''>
                    <form id="logout-form" action="#" method="POST">
                        @csrf
                        <div class="input-group mb-3">
                            <input class='form-control' type='text' name='search' placeholder='Estou procurando por...'>
                            <div id='search' class="input-group-append">
                                <button type='submit' class='btn btn-primary'>Buscar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class='row justify-content-md-center'>
                {{--<h10>Categorias</h10>--}}
                <div class='w-100 mb-4'></div>
                @if(isset($categories) && count($categories)>0)
                    <div class='row text-center'>
                        @foreach($categories as $category)
                            <div class='col'>
                                <a href='#'><i class="fas fa-shopping-cart text-grey2 fa-2x mx-4"></i><br></a>
                                <span class='text-grey2'>{{$category->title}}</span>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
    </div>
    <div class="jumbotron jumbotron-fluid p-4 mb-0">
        @include('Portal.Advertisement.IncludeSearch')
        {{ $advertisementes->links() }}
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {

        });
    </script>
@endpush
