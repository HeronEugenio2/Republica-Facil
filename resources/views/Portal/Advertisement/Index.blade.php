@extends('Portal.TemplateLaravel')
@push('css')

@endpush
@section('content')
    <div class="jumbotron jumbotron-fluid m-0 bg-dark">
        <div class="container text-white">
            <div class='row justify-content-md-center'>
                @if(isset($categories) && count($categories)>0)
                    <div class='row'>
                        @foreach($categories as $category)
                            <i class="fas fa-shopping-cart text-danger fa-2x"></i>
                        @endforeach
                    </div>
                @endif
            </div>
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
