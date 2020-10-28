<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>SB Admin - Bootstrap Admin Template</title>
        <link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('/css/sb-admin.css')}}" rel="stylesheet">
        <link href="{{asset('/css/plugins/morris.css')}}" rel="stylesheet">
        <link href="{{asset('/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li class="active">
                            <a href="{{asset('/index.php/admin')}}"><i class="fa fa-fw fa-dashboard"></i> Admin panel</a>
                        </li>
                        <li>
                            <a href="{{asset('/index.php/admin/slike')}}"><i class="fa fa-fw fa-heart"></i> Izmena slika</a>
                        </li>
                        <li>
                            <a href="{{asset('/index.php/admin/korisnici')}}"><i class="fa fa-fw  fa-child"></i> Izmena korisnika</a>
                        </li>
                        <li>
                            <a href="{{asset('/index.php/admin/uloge')}}"><i class="fa fa-fw fa-edit"></i> Izmena uloga</a>
                        </li>
                        <li>
                            <a href="{{asset('/index.php/admin/proizvodi')}}"><i class="fa fa-fw fa-desktop"></i> Izmena proizvoda</a>
                        </li>
                        <li>
                            <a href="{{asset('/index.php/admin/ankete')}}"><i class="fa fa-fw fa-wrench"></i> Izmena ankete</a>
                        </li>  
                        <li>
                            <a href="{{asset('/index.php/admin/meni')}}"><i class="fa fa-fw  fa-bars"></i> Izmena menija</a>
                        </li>  
                        <li>
                            <a href="{{asset('/index.php/admin/zelje')}}"><i class="fa fa-fw  fa-bars"></i> Lista zelja</a>
                        </li> 
                        <li>
                            <a href="{{asset('/index.php/home')}}"><i class="fa fa-fw fa-coffee"></i> Vrati se na početnu</a>
                        </li>              
                    </ul>
                </div>
            </nav>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                ADMIN PANEL
                            </h1>
                            <ol class="breadcrumb">
                                <li class="active">
                                    <i class="fa fa-dashboard"></i> Dobrodošli na admin panel. Ovde možete menjati,dodavati i brisati sadržaj sa sajta.
                                </li>
                            </ol>
                            @yield('administracija')
                        </div>
                    </div>           
                </div>
            </div>
        </div>
        <script src="{{asset('/js/jquery.min.js')}}"></script>
        <script src="{{asset('/js/bootstrap.min.js')}}"></script>   
    </body>
</html>

