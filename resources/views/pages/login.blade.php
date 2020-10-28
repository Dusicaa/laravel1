@extends('layouts.front')

@section('title')
Login page
@endsection

@section('meta')
<meta name="description" content="">
<meta name="keywords" content="">
@endsection


@section('center') 
<br/>
<section id="one" class="wrapper style1">
    <div class="container 75%">
        <div class="row 200%">
            <div class="6u 12u(medium)">
                <header class="major">

                    <p>Login forma</p><br/>



                    @isset($errors)
                    @if($errors->any())
                    @foreach($errors->all() as $error)
                    {{ $error }}
                    @endforeach
                    @endif
                    @endisset

                    <form action="{{ asset('/index.php/login') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Korisnicko ime:</label>
                            <input type="text" name="tbKorisnickoIme" class="form-control" />
                        </div>

                        <div class="form-group">
                            <label>Lozinka:</label>
                            <input type="password" name="tbLozinka" class="form-control"/>
                        </div>
                        <br/>
                        <input type="submit" name="btnLogin" value="Logujte se" class="btn btn-primary"/>

                    </form>
                </header>
            </div>

        </div>
        <div class="row 200%">
            <div class="6u 12u(medium)">
                <p>Ukoliko niste registrovani korisnik, registraciju možete izvršiti <a href='{{asset('/index.php/showRegistration')}}' ><strong style="color:red">OVDE</strong></a>.
            </div>
        </div>
    </div>
</section>

@endsection
