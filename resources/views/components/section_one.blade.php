<section id="one" class="wrapper style1">
    <div class="container 75%">
        <div class="row 200%">
            <div id='anketa' class="6u 12u(medium)">
                <header >
                    @isset($prikazP)
                    <p style=" text-decoration-line:underline;text-decoration-style: double;">{{$prikazP[0]->pitanje}}</p>
                    @endisset
                </header>
                <br/>       
                @isset($prikazO )
                <form name="form"  action="{{asset('/index.php/anketa')}}" method="POST">
                    {{csrf_field()}}

                    <input type="radio" id="contactChoice1"
                           name="anketa" value="{{$prikazO[0]->id_odgovori}}" >
                    <label for="contactChoice1">{{$prikazO[0]->odgovori}}</label>

                    <input type="radio" id="contactChoice2"
                           name="anketa" value="{{$prikazO[1]->id_odgovori}}">
                    <label for="contactChoice2">{{$prikazO[1]->odgovori}}</label>

                    <input type="radio" id="contactChoice3"
                           name="anketa" value="{{$prikazO[2]->id_odgovori}}">
                    <label for="contactChoice3">{{$prikazO[2]->odgovori}}</label> 
                    <button type="submit" id='submit'>Posalji</button>

                </form> 
                @endisset          

            </div>

            <div class="6u 12u(medium)">

                <header >
                    @isset($rezultat)
                    <p style="text-align:right; text-decoration-line:underline;text-decoration-style: double;">Rezultati ankete</p>
                    <p style="text-align:right;" class='poll-results'>

                        @foreach($rezultat as $r)
                        {{$r->odgovori}} ={{$r->rezultat}}<br/>
                        @endforeach
                        @endisset
                    </p>

                </header>                                               
            </div>
        </div>
    </div>
</section>
@section('appendScripts')
@parent
<!-- Scripts -->
        <!--<script src="{{asset('/js/anketa.js')}}"></script>-->
<script>
    var BASE_URL = "{{ asset('/') }}";
    var TOKEN = "{{ csrf_token() }}";
</script>

@endsection