@extends('layouts.front')

@section('title')
Products
@endsection

@section('meta')
<meta name="description" content="">
<meta name="keywords" content="">
@endsection


@section('center') 
<br/><br/><br/>
<section id="two" class="wrapper style1 special">
    <div class="container">

        <div class="row 150%">
            <div class="2u 12u(xsmall)">

                <ul class="list-group-item" style="list-style:none">
                    @foreach($vrste as $vrsta)
                    <li><a href="{{asset('/index.php/products/'.$vrsta->id)}}" class="button  special small">{{$vrsta->naziv}}</a></li>
                    @endforeach

                </ul>

            </div>
            <div class="10u 12u(xsmall)">
                <div class="feature-grid" id="prikazProizvoda">
                    @yield('productsShow')

                </div>
            </div>

        </div>
        <div id='listazelja' class="row 150%">

        </div>
</section>


@endsection
@section('appendScripts')
@parent

<script>
    var BASE_URL = "{{ asset('/') }}";
    var TOKEN = "{{ csrf_token() }}";
</script>
@endsection
