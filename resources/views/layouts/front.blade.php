<!DOCTYPE HTML>

<html>
    <head>
        <title>@yield('title') </title>
        <meta charset="utf-8" />
        @yield('meta')
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        @section('appendCss')
        <link rel="stylesheet" href="{{asset('/css/main.css')}}" />
        @show

    </head>
    <body class="landing">

        <!-- Header -->
        <header id="header" class="alt" >
            @include('components.navigation')
        </header>

        <a href="#menu" class="navPanelToggle"><span class="fa fa-bars"></span></a>

        @yield('banner')  

        @yield('center')
        <section id="error">
            @isset($errors)
            @if($errors->any())
            @foreach($errors->all() as $error)
            {{ $error }}<br/>
            @endforeach
            @endif
            @endisset

            @empty(!session('error'))
            <div class="alert alert-danger" >{{ session('error') }}                                                            

            </div>
            @endempty

            @empty(!session('success'))
            <div class="alert alert-success">{{ session('success') }} </div>
            @endempty
        </section>
        @include('components.footer')

        @section('appendScripts')
        <!-- Scripts -->
        <script src="{{asset('/js/jquery.min.js')}}"></script>
        <script src="{{asset('/js/skel.min.js')}}"></script>
        <script src="{{asset('/js/util.js')}}"></script>
        <script src="{{asset('/js/main.js')}}"></script>

        @show

    </body>
</html>
