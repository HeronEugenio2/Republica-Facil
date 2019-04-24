@extends('layouts.Painel.LayoutFull')

@section('content')
    <div id='advertList' class='card'>
        <div id='advertHeader' class='card-header text-white bg-nav'>Anúncios da República</div>
        <div id='advertBody' class='card-body collapse'></div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            $("#advertHeader").click(function () {
                $("#advertBody").toggle();
            });
        });
    </script>
@endpush
