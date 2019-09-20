@extends('layouts.Painel.LayoutFull')
<style>
    /* Image Designing Propoerties */
    .thumb {
        height: 75px;
        border: 1px solid #000;
        margin: 10px 5px 0 0;
    }
</style>

@section('content')
    {{--    <div class="container-fluid">--}}
    {{--        <input type='file'/>--}}
    {{--        <br><img id="myImg" src="#" alt="your image" height=200 width=200>--}}
    {{--    </div>--}}

    <form name="form" method="post" action="{{route('uploadImage')}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="republic_id" value="{{auth()->id()}}">
        <input type="file" name="my_file"/><br/><br/>
        <input type="submit" name="submit" value="Upload"/>
    </form>
    @if(isset($message))
        <div class="alert alert-primary">{{$message}}</div>
    @endif
@endsection

<script type="text/javascript">
    // window.addEventListener('load', function () {
    //     document.querySelector('input[type="file"]').addEventListener('change', function () {
    //         if (this.files && this.files[0]) {
    //             var img = document.querySelector('#myImg');  // $('img')[0]
    //             img.src = URL.createObjectURL(this.files[0]); // set src to file url
    //             img.onload = imageIsLoaded; // optional onload event listener
    //         }
    //     });
    // });
    //
    // function imageIsLoaded(e) {
    //     alert(e);
    // }

</script>
