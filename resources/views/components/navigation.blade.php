
<h1 ><a href="{{asset('/')}}" ><b>Moja mala maštaonica</b></h1> 
<image src="{{asset('/images/logo1.png')}}"style="position: absolute; left: 1.1in;  top:0.1in; width: 1.3in; 
       height: 1.3in;" width="200" height="150"></image></a>
<nav id="nav">
    <ul>

        @foreach($meni as $link)
        <li  class="nav-item {{ (Request::url().'/' == asset($link->ruta))? 'active' : '' }}">
            <a class="nav-link" href="{{ asset('/index.php/'.$link->ruta) }}"><b>{{$link->naziv}}</b></a>
        </li>
        @endforeach


        @if(session()->has('user')&& session()->get('user')[0]->naziv=='admin')

        <li><a class="nav-link" href="{{ asset("/index.php/admin") }}"><b>Admin panel</b></a></li>
        @endif
        @if(!session()->has('user'))  
        <li><a class="nav-link" href="{{ asset("/index.php/showLogin") }}"><b>Logujte se</b></a></li>

        @endif
        @if(session()->has('user'))  
        <li><a class="nav-link" href="{{ asset("/index.php/logout") }}"><b>Izlogujte se</b></a></li>

        @endif


    </ul>
</nav>



