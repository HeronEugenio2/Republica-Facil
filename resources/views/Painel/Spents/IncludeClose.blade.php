<div class="row justify-content-center mb-2">
    asd
    @if(isset($arrayData))
        <h1>{{$arrayData[0]['user_name']}}</h1>
        {{--                @foreach($arrayData as $e)--}}
        {{--                    <table class="table table-striped">--}}
        {{--                        <thead>--}}
        {{--                        <tr>--}}
        {{--                            <th scope="col">Membro</th>--}}
        {{--                            <th scope="col">Valor</th>--}}
        {{--                        </tr>--}}
        {{--                        </thead>--}}
        {{--                        <tbody>--}}
        {{--                        <tr>--}}
        {{--                            <th scope="row">1</th>--}}
        {{--                            <td>{{$e->user_name}}</td>--}}
        {{--                            <td>{{$e->result}}</td>--}}
        {{--                        </tr>--}}
        {{--                        </tbody>--}}
        {{--                    </table>--}}
        {{--                @endforeach--}}
    @endif
</div>
