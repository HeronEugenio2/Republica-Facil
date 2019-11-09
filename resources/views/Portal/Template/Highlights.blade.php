<section class="wrapper">
    <div class="inner">
        <header class="special">
            <h2>Sem turpis amet semper</h2>
            <p>In arcu accumsan arcu adipiscing accumsan orci ac. Felis id enim aliquet. Accumsan ac integer lobortis commodo ornare aliquet accumsan erat tempus amet porttitor.</p>
        </header>
        <div class="highlights">
            @foreach($republics as $republic)
                <section>
                    <div class="content">
                        <header>
                            <img style='width:250px;' src='https://ae01.alicdn.com/kf/HTB1uRCXhKuSBuNjy1Xcq6AYjFXaK/Cama-de-couro-verdadeiro-e-genu-no-com-massagem-double-frame-camas-king-queen-size-mob.jpg_640x640.jpg' alt=''>
                            {{--<a href="#" class="icon fa-vcard-o"><span class="label">Icon</span></a>--}}
                            <h3>{{$republic->name}}</h3>
                        </header>
                        <p>Nunc lacinia ante nunc ac lobortis ipsum. Interdum adipiscing gravida odio porttitor sem non mi integer non faucibus.</p>
                        <a href="{{route('advertisement.index')}}" class="button primary fit small">Ver Detalhes</a>
                    </div>
                </section>
            @endforeach
            {{--<section>--}}
            {{--<div class="content">--}}
            {{--<header>--}}
            {{--<a href="#" class="icon fa-files-o">--}}
            {{--<span class="label">Icon</span>--}}
            {{--</a>--}}
            {{--<h3>Ante sem integer</h3>--}}
            {{--</header>--}}
            {{--<p>Nunc lacinia ante nunc ac lobortis ipsum. Interdum adipiscing gravida odio porttitor sem non mi integer non faucibus.</p>--}}
            {{--</div>--}}
            {{--</section>--}}
            {{--<section>--}}
            {{--<div class="content">--}}
            {{--<header>--}}
            {{--<a href="#" class="icon fa-floppy-o">--}}
            {{--<span class="label">Icon</span>--}}
            {{--</a>--}}
            {{--<h3>Ipsum consequat</h3>--}}
            {{--</header>--}}
            {{--<p>Nunc lacinia ante nunc ac lobortis ipsum. Interdum adipiscing gravida odio porttitor sem non mi integer non faucibus.</p>--}}
            {{--</div>--}}
            {{--</section>--}}
            {{--<section>--}}
            {{--<div class="content">--}}
            {{--<header>--}}
            {{--<a href="#" class="icon fa-line-chart">--}}
            {{--<span class="label">Icon</span>--}}
            {{--</a>--}}
            {{--<h3>Interdum gravida</h3>--}}
            {{--</header>--}}
            {{--<p>Nunc lacinia ante nunc ac lobortis ipsum. Interdum adipiscing gravida odio porttitor sem non mi integer non faucibus.</p>--}}
            {{--</div>--}}
            {{--</section>--}}
            {{--<section>--}}
            {{--<div class="content">--}}
            {{--<header>--}}
            {{--<a href="#" class="icon fa-paper-plane-o">--}}
            {{--<span class="label">Icon</span>--}}
            {{--</a>--}}
            {{--<h3>Faucibus consequat</h3>--}}
            {{--</header>--}}
            {{--<p>Nunc lacinia ante nunc ac lobortis ipsum. Interdum adipiscing gravida odio porttitor sem non mi integer non faucibus.</p>--}}
            {{--</div>--}}
            {{--</section>--}}
            {{--<section>--}}
            {{--<div class="content">--}}
            {{--<header>--}}
            {{--<a href="#" class="icon fa-qrcode">--}}
            {{--<span class="label">Icon</span>--}}
            {{--</a>--}}
            {{--<h3>Accumsan viverra</h3>--}}
            {{--</header>--}}
            {{--<p>Nunc lacinia ante nunc ac lobortis ipsum. Interdum adipiscing gravida odio porttitor sem non mi integer non faucibus.</p>--}}
            {{--</div>--}}
            {{--</section>--}}
        </div>
    </div>
</section>
