@extends('layouts.front')

@section('title')
Kontakt 
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
                    <p>Kontakt forma</p><br/>
                    @isset($errors)
                    @if($errors->any())
                    @foreach($errors->all() as $error)
                    {{ $error }}
                    @endforeach
                    @endif
                    @endisset
                    <form action="{{ asset('/index.php/contact') }}" method="get">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Mejl:</label>
                            <input type="text" name="tbMejl" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Postavite pitanje:</label>
                            <input type="text" name="tbPitanje" class="form-control"/>
                        </div>
                        <br/>
                        <input type="submit" name="btnContact" value="Pošaljite poruku" class="btn btn-primary"/>
                    </form>
                </header>
            </div>
        </div>
        @include('components.section_one')
    </div>
</section>
@endsection
