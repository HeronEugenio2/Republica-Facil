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
@push('scripts')
    <script>
        $(document).ready(function () {

            $("#btnBuy").click(function () {
                alert('de');
                {{--let year = $("#selectYear").val();--}}
                {{--let month = $("#selectMonth").val();--}}
                {{--let republic_id = $('#btnSearch').data('republic');--}}
                {{--let user_id = $('#btnSearch').data('user');--}}
                {{--$.ajaxSetup({--}}
                {{--    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},--}}
                {{--    method: 'POST',--}}
                {{--    url: '{{ route("painel.listSpents") }}'--}}
                {{--});--}}
                {{--$.ajax({--}}
                {{--    data: {--}}
                {{--        year: year,--}}
                {{--        month: month,--}}
                {{--        republic_id: republic_id,--}}
                {{--        user_id: user_id,--}}
                {{--    },--}}
                {{--    success: function (data) {--}}
                {{--        $(".listSpentsHtml").html(data);--}}
                {{--    },--}}
                {{--    error: function (data) {--}}
                {{--        alert('nao veio');--}}
                {{--    }--}}
                {{--});--}}
            });
        });
    </script>
@endpush
