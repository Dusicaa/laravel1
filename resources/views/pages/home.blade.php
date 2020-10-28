@extends('layouts.front')

@section('title')
Home page
@endsection

@section('meta')
<meta name="description" content="">
<meta name="keywords" content="">
@endsection


@section('banner')
<section id="banner" style='background-image:url("{{asset('/css/images/overlay2.png')}}"), url("{{asset('/images/dekoracija1.jpg')}}");'>

    <p ><b>Ručna izrada nakita,dekoracije i ukrasa za mladu</b><br /></p>
    <ul class="actions">
        <li><a href="{{asset('/index.php/products')}}" class="button special big">>>Pogedajte ponudu<<</a></li>
    </ul>
</section>
@endsection

@section('center')      

@include('components.section_two')			
@include('components.section_three')			
@include('components.section_four')


@endsection