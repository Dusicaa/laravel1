@extends('pages.products')
@section('productsShow')
@if($sviProizvodi!==null )
@foreach($sviProizvodi as $proizvod)

<div class="feature">
    <div class="image rounded"><img src="{{ asset('/'.$proizvod->slika) }}" alt="{{$proizvod->alt}}" /></div>
    <div class="content">
        <header>
            <h4>{{$proizvod->naziv}}</h4>
            <p>{{$proizvod->opis}}</p>
        </header>

        <p>{{$proizvod->cena}} RSD</p>

        @if(session()->has('user'))
        <form action='{{asset('/index.php/listazelja')}}'method="post">
            {{csrf_field()}}
            <input type='hidden' value='{{$proizvod->id}}' name='pro_id'/>
            <input type="submit" value='Ubaci u listu zelja' class="btn btn-primary"/>

        </form>
        @endif
    </div>
</div>

@endforeach 

@endif
@endsection                                        
