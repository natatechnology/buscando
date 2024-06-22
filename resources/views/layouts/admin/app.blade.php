<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="today will learn to build an admin dashboard panel design by using HTML and CSS.">
    <meta name="keywords" content="Buscar, personas, desaparecidas, vida, niño, niña, Policia Nacional">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} | Rastros de vida</title>
    <link rel="stylesheet" href="{{asset('/admin/style.css')}}">

    <!-- Boostrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="{{asset('/admin/boxicons%402.0.7/css/boxicons.min.css')}}" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="{{asset('/admin/custom-scripts.js')}}" defer="" type="319ca0a3647f4b4e4e6cae0a-text/javascript"></script>
</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <i class="bx bxl-c-plus-plus"></i>
            <span class="logo_name">{{ config('app.name', 'Laravel') }}</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="#" class="active">
                    <i class="bx bx-grid-alt"></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{route('admin.desaparecidos.index')}}">
                    <i class="bx bx-box"></i>
                    <span class="links_name">Desaparecidos</span>
                </a>
            </li>
            <li>
                <a href="{{route('profile.show')}}">
                    <i class="bx bx-cog"></i>
                    <span class="links_name">Mi Cuenta</span>
                </a>
            </li>
            <li class="log_out">
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    <i class="bx bx-log-out"></i>
                    <span class="links_name">Cerrar la sesión</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class="bx bx-menu sidebarBtn"></i>
                <span class="dashboard">Dashboard</span>
            </div>
            <div class="search-box">
                <input type="text" placeholder="Search...">
                <i class="bx bx-search"></i>
            </div>
            <div class="profile-details">
                <img src="{{asset('/admin/images/avatar.png')}}" alt="">
                <span class="admin_name">{{auth()->user()->name}}</span>
            </div>
        </nav>
        <div class="home-content">            
            @yield('content')
        </div>
    </section>
    <script type="319ca0a3647f4b4e4e6cae0a-text/javascript">
      let sidebar = document.querySelector(".sidebar");
      let sidebarBtn = document.querySelector(".sidebarBtn");
      sidebarBtn.onclick = function () {
        sidebar.classList.toggle("active");
        if (sidebar.classList.contains("active")) {
          sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
        } else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
      };
    </script>
    <script src="{{asset('/admin/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js')}}"
        data-cf-settings="319ca0a3647f4b4e4e6cae0a-|49" defer=""></script>
</body>

</html>