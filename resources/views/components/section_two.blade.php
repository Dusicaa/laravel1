<section id="two" class="wrapper style2 special">
    <div class="container">
        <header class="major">
            <h2>Želite savršeno venčanje?</h2>
            <p>Sve što vam je potrebno jeste malo mašte...</p>
            <br>
            <ul class="actions">
                <li><a href="{{asset('/index.php/showContact')}}" class="button special big">Kontaktirajte nas</a></li>
            </ul>
        </header>
        <div class="row 150%">
            @foreach($dva as $l)
            <div class="6u 12u(xsmall)">
                <div class="image fit captioned">
                    <img src="{{asset('/'.$l->slika)}}" alt="" />

                </div>
            </div>

            @endforeach
        </div>

    </div>
</section>
