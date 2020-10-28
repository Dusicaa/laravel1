@extends('pages.products')
@section('productsShow')

@if($izabranaVrsta!==null)
@foreach($izabranaVrsta as $jedna)
<div class="feature">
    <div class="image rounded"><img src="{{ asset('/'.$jedna->slika) }}" alt="{{$jedna->alt}}" /></div>
    <div class="content">
        <header>
            <h4>{{$jedna->naziv}}</h4>
            <p>{{$jedna->opis}}</p>
        </header>
        <p>{{$jedna->cena}} RSD</p>


    </div>
</div>
@endforeach

@endif

@endsection