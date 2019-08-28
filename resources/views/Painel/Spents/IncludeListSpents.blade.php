<div class="row justify-content-center mb-2">
    @if(isset($arrayData))
        <table class="table table-bordered table-hover table-sm table-striped text-center mt-4">
            <thead>
            <tr>
                <th scope="col">Membro</th>
                <th scope="col">Valor</th>
                <th scope="col">Data</th>
                <th scope="col">Pago</th>
            </tr>
            </thead>
            <tbody>
            @foreach($arrayData as $e)
                <tr>
                    <td>{{$e->user_id}}</td>
                    <td>R${{number_format($e->value, 2, ',', ' ')}}</td>
                    <td>{{date_format($e->created_at,"d/m/Y")}}</td>
                    <td>{{$e->buy ? 'sim' : 'nao'}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
</div>
