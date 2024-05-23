<header class="header-area header-sticky">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <nav class="main-nav">
                      <!-- ***** Logo Start ***** -->
                      <a href="{{url('home')}}" class="logo">
                          <img src="user/assets/images/kblogo.png" alt="logo">
                      </a>
                      <!-- ***** Logo End ***** -->
                      <!-- ***** Menu Start ***** -->
                      <ul class="nav">
                          <li class="scroll-to-section"><a href="#home" class="active">Home</a></li>
                          <li class="scroll-to-section"><a href="#services">Services</a></li>
                          <li class="scroll-to-section"><a href="#about">About</a></li>
                          <li class="has-sub">
                              <a href="javascript:void(0)">Pages</a>
                              <ul class="sub-menu">
                                  <li><a href="#about">About Us</a></li>
                                  <li><a href="#services">Our Services</a></li>
                                  <li><a href="#communicate">Contact Us</a></li>
                              </ul>
                          </li>
                          <li class="scroll-to-section"><a href="#testimonials">Testimonials</a></li>
                          
                          @if(Route::has('login'))
                                    @auth

                                    <li>
                                        <a class="scroll-to-section" style="background: green; border-radius:10%; margin-right:10px" href="{{url('account')}}">My Workspace</a>
                                    </li>

                                    <li class="has-sub" style="background:rgb(2, 80, 80); border-radius:5%; height:40px; margin-left:10px">
                                        <a href="javascript:void(0)">{{ Auth::user()->name }}</a>
                                        <ul class="sub-menu">
                                            <li><a class="dropdown-item" href="{{url('account')}}">Profile</a></li>
                                            <li><a class="dropdown-item" href="{{ route ('feedback.admin') }}">Feedback</a></li>
                                            <li><a class="dropdown-item" href="{{ route ('frontendNotification') }}">Notification</a></li>
                                            <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form></li>
                                        </ul>
                                    </li>

                                    {{-- <x-app-layout>
                                    </x-app-layout> --}}
                                    @else
                                    <li class="scroll-to-section" style="background: lime; border-radius:10%; margin-right:10px">
                                        <a href="{{route('login')}}"><i>Login</i></a>
                                    </li>

                                    <li class="scroll-to-section" style="background: aqua; border-radius:10%; margin-right:10px">
                                        <a href="{{route('register')}}"><i>Register</i></a>
                                    </li>

                                    @endauth
                                    @endif
                                    <li></li> 
                      </ul>        
                      <a class='menu-trigger'>
                          <span>Menu</span>
                      </a>
                      <!-- ***** Menu End ***** -->
                  </nav>
              </div>
          </div>
      </div>
  </header>