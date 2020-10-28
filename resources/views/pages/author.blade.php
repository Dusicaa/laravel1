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

        <div class="row 150%">
            <div class="6u 12u(xsmall)">
                <div class="image ">
                    <br/>
                    <img src="{{asset('/images/autor.jpg')}}" alt=""width="40%" height="40%" />

                </div>
            </div>
            <div class="6u 12u(xsmall)">
                <div class="image ">
                    <br/>

                    <small>Zovem se Dušica Cakić, i imam 29 godina.</small>                   
                    <small>Student sam Visoke škole strukovnih studija za informacione i komunikacione tehnologijе .</small> 
                    <small>Već 10 godina radim u apoteci kao farmaceutski tehničar, a želja mi je da uskoro uplovim u IT vode . </small>
                </div>
            </div>
        </div>


    </div>
</section>

@endsection

