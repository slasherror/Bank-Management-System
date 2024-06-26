<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar p-0 fixed-top d-flex flex-row">
      <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
        <a class="navbar-brand brand-logo-mini" href="{{url('home')}}"><img src="employee/assets/images/logo-mini.svg" alt="logo" /></a>
      </div>
      <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="mdi mdi-menu"></span>
        </button>
        <ul class="navbar-nav w-100">
          <li class="nav-item w-100">
            <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
              <input style="color:white;" type="text" class="form-control" placeholder="Search">
            </form>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown d-none d-lg-block">
            <a class="nav-link btn btn-success create-new-button" aria-expanded="false" href="{{ route('notification') }}">+ Post New Notice</a>
          </li>
          <li class="nav-item nav-settings d-none d-lg-block">
            <a class="nav-link" href="{{url('notavailable')}}">
              <i class="mdi mdi-view-grid"></i>
            </a>
          </li>
          <li class="nav-item dropdown border-left">
            <a class="nav-link count-indicator dropdown-toggle" href="{{url('notavailable')}}">
              <i class="mdi mdi-email"></i>
              <span class="count bg-success"></span>
            </a>
          </li>
          <li class="nav-item dropdown border-left">
            <a class="nav-link count-indicator dropdown-toggle" href="{{url('showfeedback')}}">
              <i class="mdi mdi-bell"></i>
              <span class="count bg-danger"></span>
            </a>
          </li>
          <li class="has-sub" style="background:white; border-radius:5%">
            <b><a class="nav-link count-indicator dropdown-toggle" href="{{url('employeeprofile')}}">
              {{ Auth::user()->name }}
            </a></b>
          </li>

          

          {{-- <li class="has-sub" style="background:rgb(7, 52, 52); border-radius:5%; height:40px; margin-left:10px; color:aliceblue">
            <a href="javascript:void(0)">{{ Auth::user()->name }}</a>
            <ul class="sub-menu">
                <li><a class="dropdown-item" href="{{url('employeeprofile')}}">Profile</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form></li>
            </ul>
        </li> --}}

          {{-- <x-app-layout>
        </x-app-layout> --}}
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-format-line-spacing"></span>
        </button>
      </div>
    </nav>