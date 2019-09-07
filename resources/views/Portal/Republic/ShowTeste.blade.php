@extends('Portal.TemplateLaravel')
@push('css')

@endpush

@section('content')
<div class="row">
    <div class="col-sm-12 col-lg-6 col-md-6"></div>
    <div class="col-sm-12 col-lg-6 col-md-6"></div>
</div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $(".vote").on('click', (function (e) {
                    let vote = $(this).data('value');
                    let republic_id = $('#btnView{{$republic->id}}').data('republic');
                    alert(republic_id);
                    e.preventDefault();
                    $.ajax({
                        headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                        method: 'POST',
                        url: 'https://support.perfectpay.com.br/vote/faq',
                        data: {
                            vote: vote,
                            slug_id: republic_id,
                        },
                        success: function (response) {
                            $('.answer').replaceWith('<h5 class="py-4 text-muted">' + response.message + '</h5>');
                        },
                        error: function (response) {
                            $('.answer').replaceWith('<h5 class="py-4 text-muted">' + response.message + '</h5>');

                        }
                    });
                })
            );
        });
    </script>
@endpush
