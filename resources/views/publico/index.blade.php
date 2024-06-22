<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Natanael Capellan">
        <link rel="icon" href="{{asset('/publico/images/favicon.jpg')}}">
        <title>{{ config('app.name', 'Laravel') }} - {{$title}}</title>
        <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/album/">
        <!-- Bootstrap core CSS -->
        <link href="{{asset('/assets/css/bootstrap.min.css')}}" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="{{asset('/assets/css/album.css')}}" rel="stylesheet">
        <!-- Icon -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        
    </head>

    <body>

        <header>
        <div class="navbar navbar-dark bg-dark box-shadow">
            <div class="container d-flex justify-content-between">
            <a href="{{route('/')}}" class="navbar-brand d-flex align-items-center">
                <strong>{{ config('app.name', 'Laravel') }}</strong>
            </a>
            <button class="navbar-toggler" type="button" onclick="window.location='{{ route("login") }}'">
                <span class="navbar-toggler-icon"></span>
            </button>
            </div>
        </div>
        </header>

        <main role="main">

        <section class="jumbotron text-center">
            <div class="container">
            <h1 class="jumbotron-heading">{{$title}}</h1>
            <p class="lead text-muted">Lista de personas desaparecidas... pero casi la encontramos ;)</p>
            </div>
        </section>

        <div class="album py-5" style="background-color:#00a651;">
            <div class="container">

            <div class="row">
                @foreach ($data as $val)
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <div class="card-body bg-danger text-white pt-1 pb-1 m-0 b-0">
                            <h4 class="text-white p-0 m-0 b-0"><b>PERSONA DESAPARECIDA</b></h4>
                            <small class="text-white p-0 m-0 b-0">Desde el {{ \Carbon\Carbon::parse($val->ultimo_avistamiento)->format('d M Y') }}</small>
                        </div>
                        <img class="card-img-top" src="{{ asset($val->foto) }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="text-bold"><b>{{$val->nombre}}</b></h5> 
                            <small class="text-muted">EDAD: <b>{{ \Carbon\Carbon::parse($val->fecha_nacimiento)->age }} años</span></b></small>
                            <br><small class="text-muted">SEXO: <b>@if ($val->sexo == 'H') Hombre @else Mujer @endif</b></small>
                            <br><small class="text-muted">DIRECCION: <b>{{$val->direccion_residencia}}</b></small>    
                            <br><small class="text-muted">DISCAPACIDAD:
                                @php $discapacidad = json_decode($val->discapacidad); @endphp
                                @if (is_array($discapacidad))
                                    @foreach ($discapacidad AS $key => $value)
                                        @if ($value == 1)
                                            <i class="text-success fa-solid fa-eye-slash"></i>                                    
                                        @elseif ($value == 2)
                                            <i class="text-success fa-solid fa-ear-deaf"></i>
                                        @elseif ($value == 3)
                                            <i class="text-success fa-brands fa-accessible-icon"></i>
                                        @elseif ($value == 4)
                                            <i class="text-success fa-solid fa-brain"></i>
                                        @else
                                            <i class="text-success fa-solid fa-masks-theater"></i>
                                        @endif              
                                    @endforeach                                    
                                @endif
                            </small>
                                                                                
                            <div class="d-flex justify-content-between align-items-center pt-3">
                                <small class="text-muted">Contacto: {{$val->nombre_contacto}} <br> </small>
                                <div class="btn-group">                                    
                                    <button type="button" class="btn btn-sm btn-outline-success" onclick="window.location.href='tel:+{{$val->telefono_contacto}}'">Llamar</button>
                                    <button type="button" class="btn btn-sm btn-success" onclick="window.location.href='https://wa.me/+1{{$val->whatsapp_contacto}}'">whatsapp</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach


            </div>
            </div>
        </div>

        </main>

        <footer class="text-muted">
            <div class="container">
                <p class="float-right">
                <a href="#">Volver arriba</a>
                </p>
                <p>© Copyright 2024 NATA TECHNOLOGY <a href="https://natatechnology.net/">Visita nuestra web</a> y conoce más.</p>
            </div>
        </footer>

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
        <script src="{{asset('/assets/js/popper.min.js')}}"></script>
        <script src="{{asset('/assets/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('/assets/js/holder.min.js')}}"></script>
    </body>
</html>
