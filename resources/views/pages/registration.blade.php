@extends('layouts.front')

@section('title')
Registration page
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

                    <p>Forma za registraciju</p><br/>                                                                       



                    <form action="{{ asset('/index.php/registration') }}" id="formaR" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Ime:</label>
                            <input type="text" name="tbIme" id="ime" class="form-control" value="{{ old('tbime') }}"/>
                        </div>
                        <div class="form-group">
                            <label>Prezime:</label>
                            <input type="text" name="tbPrezime" class="form-control" value="{{ old('tbPrezime') }}"/>
                        </div>
                        <div class="form-group">
                            <label>Korisnicko ime:</label>
                            <input type="text" name="tbKorisnickoIme" class="form-control" value="{{ old('tbKorisnickoIme') }}"/>
                        </div>

                        <div class="form-group">
                            <label>Lozinka:</label>
                            <input type="password" name="tbLozinka" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label>Mejl:</label>
                            <input type="text" name="tbMejl" class="form-control" value="{{ old('tbMejl') }}"/>
                        </div>
                        <div class="form-group">
                            <label>Slika:</label>
                            <input type="file" name="tbSlika" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Telefon:</label>
                            <input type="text" name="tbTelefon" class="form-control"value="{{ old('tbTelefon') }}" />
                        </div>
                        <br/>
                        <input type="submit" name="btnReg" value="Registrujte se" class="btn btn-primary" onclick="provera();"/>

                    </form>

                </header>
            </div>

        </div>

    </div>
</section>




@endsection

@section('appendScripts')
@parent
<!-- Scripts -->
<script src="{{asset('/js/provera.js')}}"></script>


@endsection