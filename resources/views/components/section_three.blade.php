<section id="three" class="wrapper style1">
    <div class="container">

        @foreach($cetiri as $f)
        <div class="feature-grid">
            <div class="feature">
                <div class="image rounded"><img src="{{asset('/'.$f->slika)}}" alt="" /></div>
                <div class="content">
                    <header>
                        <h4>{{$f->alt}}</h4>

                    </header>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore esse tenetur accusantium porro omnis, unde mollitia totam sit nesciunt consectetur.</p>
                </div>
            </div>
            @endforeach


        </div>
    </div>
</section>

