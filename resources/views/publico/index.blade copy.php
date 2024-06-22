<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta name="description" content="Bleurant - Responsive HTML Creative Team and Portfolio Template">
        <meta name="author" content="themeforest.net/user/doubleeight/portfolio">
        <title>{{ config('app.name', 'Laravel') }} - {{$title}}</title>
        <link rel="icon" href="{{asset('/publico/images/favicon.jpg')}}">
        <!-- Bootstrap -->
        <link rel="stylesheet" href="{{asset('/publico/css/bootstrap/bootstrap.min.css')}}" type="text/css" media="screen">
        <!-- Pace -->
        <link rel="stylesheet" href="{{asset('/publico/css/pace/preloader.css')}}" media="screen">
        <!-- Animate -->
        <link rel="stylesheet" href="{{asset('/publico/css/animate/animate.css')}}" type="text/css">     
        <!-- Icon -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Font -->
        <link href="../css?family=Raleway:500,600,700,800" rel="stylesheet">
        <!-- Theme CSS -->
        <link href="{{asset('/publico/css/style.css')}}" rel="stylesheet" media="screen"> 
        <style>
            .fullwidth {
                width: 100%;
                height: 400px;
                object-fit: fill;
            }
        </style>
	</head>

	<body>
        <!--PRELOADER-->
        <div id="page-preloader">
            <div class="align-middle">
                <div class="v-align -oncenter">                 
                    <div class="spinner"></div>
                </div>
            </div>
        </div> <!--END of PRELOADER-->
        
        
        <!-- NAVIGATION -->    
        <header>
            <div id="nav-bar" class="animated fadeIn">
                <div id="logo">
                    <a href="{{route('/')}}">{{ config('app.name', 'Laravel') }}</a>
                </div>
                <div id="menu-wrapper">
                    <a id="menu-icon" href="#">
                        <div id="bar-wrapper">
                            <div class="bar"></div>
                            <div class="bar"></div>
                            <div class="bar"></div>
                        </div>
                    </a>
                </div>
                <div class="clearboth"></div>
            </div>
        </header>        
        
        <div id="navigation-window">	
            <div class="align-middle">
                <div class="v-align -oncenter"> 
                    <div id="navigation-title">Menu</div>
                    <nav>
                        <ul id="nav-menu">
                            <li><a href="{{route('/')}}">Home</a></li>
                            <li><a href="#">Sobre Nosotros</a></li>
                            <li><a href="{{route('login')}}">Mi cuenta</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </nav>
                    <div id="closemenu-wrapper">
                        <a href="#" id="closemenu"><i class="fa fa-close"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!--END of NAVIGATION-->
        
        
        <!-- CONTENT -->
        <div id="page-content" class="animated fadeIn">

            
            <div class="container-fluid">
            
                <!-- Home Title -->
                <div id="home-title" class="row -rowmargin">
                    <div class="col-md-12 text-center">
                        <h1>{{$title}}</h1>
                        <p class="nomargin">Lista de personas desaparecidas... pero casi la encontramos ;)</p>
                    </div>
                </div>	<!--End of Home Title -->
                
                



                <!-- Photo -->
                <div id="home-photo" class="row -rowmargin">
                    @foreach ($data as $val)
                    <div class="col-md-4">                    	
                        <div class="photo-item -marginbottom">
                            <div class="overlay-caption">
                                <div class="align-middle">
                                    <div class="v-align -oncenter"> 
                                        <div class="phototitle">{{$val->nombre}}</div>
                                        <div class="photocaption">
                                            <h4>
                                                @if ($val->sexo == 'H')
                                                    Hombre
                                                @else
                                                    Mujer
                                                @endif
                                                <br>{{ \Carbon\Carbon::parse($val->fecha_nacimiento)->age }} años
                                                <br>{{$val->direccion_residencia}}
                                            </h4>
                                            @if ($val->discapacidad != '')
                                            <h4><b>Discapacidad:</b> {{$val->discapacidad}}</h4>                                                                                            
                                            @endif
                                            <br>
                                            <h3><b>Contacto:</b> {{$val->nombre_contacto}}</h3>                                            
                                            <i class="fa-solid fa-mobile-screen"></i> : {{$val->telefono_contacto}}  /  <i class="fa-brands fa-whatsapp"></i> : {{$val->telefono_contacto}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <img src="{{ asset($val->foto) }}" class="fullwidth">                                
                        </div>
                    </div>                        
                    @endforeach

                </div> <!--End of Photo -->                
                
                <!-- Call Action -->
                <div id="home-action" class="row">
                    <div class="col-md-12 text-center">
                        <p>Deseas reportar a un familiar o amigo desaparecido.</p>
                        <a href="{{route('register')}}" class="default-button">Haz click aquí</a>
                    </div>
                </div> <!--End of Call Action -->
                
            </div>
        </div>
        
        <!-- FOOTER SOCIAL MEDIA -->
        <footer id="social-media">
            <a href="#" class="socmed-icon"><i class="fa-brands fa-facebook"></i></a>
            <a href="#" class="socmed-icon"><i class="fa-brands fa-twitter"></i></a>
            <a href="#" class="socmed-icon"><i class="fa-brands fa-instagram"></i></a>  
        </footer> <!-- END oF FOOTER SOCIAL MEDIA -->
        
        
        <!-- jQuery -->
        <script src="{{asset('/publico/js/jquery-3.2.1.min.js')}}"></script>
        <!-- Pace -->
        <script src="{{asset('/publico/js/pace/pace.min.js')}}"></script> 
        <!-- Bootstrap -->
        <script src="{{asset('/publico/js/bootstrap/bootstrap.min.js')}}"></script>  	
        <!-- Device JS -->
        <script src="{{asset('/publico/js/devicejs/device.min.js')}}"></script>          
        <!-- Custom Core Script -->
        <script type="text/javascript" src="{{asset('/publico/js/script.js')}}"></script>    
        
	</body>
</html>