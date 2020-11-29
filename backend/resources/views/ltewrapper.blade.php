@extends('master')
@section('ltewrapper')
<div class="wrapper">
        <!-- Navbar -->
    

              <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom" style="margin-left: 0 !important">
            <!-- Left navbar links -->

            <!-- Right navbar links -->
              <div class="collapse navbar-collapse " id="navbarNav">

            <ul class="navbar-nav ">
                <!-- Notifications Dropdown Menu -->
                 <li class="nav-item" style="cursor: pointer;">
                    <a class="nav-link nav_btn" href="{{ route('home') }}" data-slide="false">Inicio</a>
                </li>
                 <li class="nav-item" style="cursor: pointer;">
                    <a class="nav-link nav_btn" href="{{ route('testimonies') }}" data-slide="false">Testimonios<i class="fas fa-users" style="color: #0D0D0D; margin-left: 9px"></i></a>
                </li>
                <li class="nav-item" style="cursor: pointer;">
                    <a class="nav-link nav_btn" href="{{ route('logout') }}" data-slide="false">Cerrar Sesion<i class="fa fa-sign-out" style="color: #0D0D0D; margin-left: 9px"></i></a>
                </li>

            </ul>
        </div>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="margin-left: 0 !important; min-height: 800px;" >
 
            @yield('home')
  
        </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer" style="margin-left: 0 !important">
        <strong>Copyright &copy; 2019.</strong>
    </footer>

    </div>
    @endsection