<section id="banner">
    <div class="inner">
        <img src='{{ asset('/images/favicon.png') }}' alt='' style='width: 100px'>
        <h1>República Fácil</h1>
        <p>Busca e
            <a href="https://templated.co/">Gerenciamento</a>
            de maneira fácil
        </p>
        {{--<a href='{{ route('login') }}' class='button secondary'>Login</a>--}}
        {{--<a href="{{ route('register') }}" class="button primary">Cadastre-se</a>--}}
        <div class='row '>
            <div class='col-4'>
                <input type='text'>
            </div>
            <div class='col'>
                <button type='submit' class='btn btn-success'>Buscar</button>
            </div>
        </div>
    </div>
    <video autoplay loop muted playsinline src="templated-industrious/images/banner.mp4"></video>
</section>
