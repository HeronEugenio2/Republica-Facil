<div class="row justify-content-center mb-2">
    @if(isset($arrayData))
            <table class="table table-bordered table-hover table-sm table-striped text-center mt-4">
                <thead>
                <tr>
                    <th scope="col">Membro</th>
                    <th scope="col">Valor</th>
                </tr>
                </thead>
                <tbody>
                @foreach($arrayData as $e)

                    <tr>
                    <td>{{$e['user_name']}}</td>
                    <td>R${{number_format($e['result']['result'], 2, ',', ' ')}}</td>
                </tr>
                @endforeach

                </tbody>
            </table>
    @endif
</div>
