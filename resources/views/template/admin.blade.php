<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="{{ asset('images/log.jpg') }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tesis - @yield('title')</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/metisMenu.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sb-admin-2.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css') }}">
    @yield('link')
</head>
<body>

    <div id="wrapper">    
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../inicio/inicio.php">Eventos</a>
            </div>
           
            <ul class="nav navbar-top-links navbar-right">
                 <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        {{Auth::user()->nombre.' '.Auth::user()->apellido}}
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>   
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href=""><i class="fa fa-user fa-fw"></i> Editar Clave</a>
                        </li>
                        
                        <li class="divider"></li>
                        <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Salir</a></li>
                    </ul>
                </li>
            </ul>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                                                    <!--   Usuarios     -->
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Usuario<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level" id="usuario">
                                <li>
                                    <a href="{{ route('usuario.create') }}"><i class='fa fa-user-plus'></i> Agregar</a>
                                </li>
                                <li>
                                    <a href="{{ route('usuario.index') }}"><i class='fa fa-list-ol fa-fw'></i> Lista de usuarios </a>
                                </li>
                            </ul>
                        </li>
                    
                        <li>
                            <a href="#"><i class="fa fa-anchor"></i> Inventario<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ route('inventario.create') }}"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                                </li>
                                <li>
                                    <a href="{{ route('inventario.index') }}"><i class='fa fa-bicycle'></i> Lista de Implementos</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-child"></i> Clientes<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ route('cliente.create') }}"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                                </li>
                                <li>
                                    <a href="{{ route('cliente.index') }}"><i class='fa fa-book'></i> Lista de Clientes</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-globe"></i> Eventos<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ route('evento.index') }}"><i class='fa fa-life-buoy'></i> Lista de eventos</a>
                                </li>
                            </ul>
                        </li>
                        
                        
                        
                    </ul>
                </div>
            </div>

     </nav>

        <div id="page-wrapper" style="padding-top: .6em">
            
                <h4>@yield('titulo')</h4><hr>
                @if (count($errors) > 0)
                    <div class="alert-danger">
                        <br>
                            @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                            @endforeach
                        <br>
                        </div>
                @endif
                @include('flash::message')
                <br>
                @yield('content')
                </div>
        </div>        
    
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src=" {{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/metisMenu.min.js') }}"></script>
<script src="{{ asset('js/sb-admin-2.js') }}"></script>
@yield('script')
</body>
</html>