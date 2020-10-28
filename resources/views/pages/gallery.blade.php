@extends('layouts.front')

@section('title')
Gallery
@endsection

@section('meta')
<meta name="description" content="">
<meta name="keywords" content="">
@endsection

@section('appendCss')
@parent

<link href="{{ asset('/css/galerija.css') }}" rel="stylesheet">
@endsection


@section('center') 
<br/>
<section id="one" class="wrapper style1">
    <div class="container 75%">
        <div class="row">
            <header class="major">
                @include('components/bootstrapGallery')
            </header>

        </div>

    </div>
</section>

@endsection
