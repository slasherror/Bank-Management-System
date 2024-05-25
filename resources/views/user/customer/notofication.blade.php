notification.blade.php:
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>KUET BANK</title>

    <!-- Bootstrap core CSS -->
    <link href="user/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="user/assets/css/fontawesome.css">
    <link rel="stylesheet" href="user/assets/css/templatemo-574-mexant.css">
    <link rel="stylesheet" href="user/assets/css/owl.css">
    <link rel="stylesheet" href="user/assets/css/animate.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css">
<!--

TemplateMo 574 Mexant

https://templatemo.com/tm-574-mexant

-->


<body>

<header class="header-area header-sticky" style="background: #212741">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="" class="logo">
                        <img src="user/assets/images/kblogo.png" alt="logo">
                    </a>
                            
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    
                    
                    <ul class="nav">
                        <li class="scroll-to-section"><a href="{{url('home')}}">Home</a></li>
                        <li class="scroll-to-section"><a href="{{url('account')}}" class="active">Accounts</a></li>
                        <li class="scroll-to-section"><a href="{{url('accountstatement')}}">Account Stastement</a></li>
                        <li class="scroll-to-section"><a href="{{url('fundtransfer')}}">Fund Transfer</a></li>
                        {{-- <li id="balance" class="scroll-to-section" style="background: yellowgreen; border-radius:10%; height:40px; margin-left:10px"><a href="{{url('balance',$customerdata->id)}}">Balance</a></li> --}}
                        <li class="scroll-to-section" style="background: yellowgreen; border-radius:10%; height:40px; margin-left:10px"><a href="{{url('balance')}}">Balance</a></li>
                        @if(Route::has('login'))
                            @auth
                            {{-- <x-app-layout>
                            </x-app-layout> --}}
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
                            
                           
                        @else
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
  <div id="account">
    <div class="swiper-container py-5" id="top">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="slide-inner" style="background-image:url(user/assets/images/slide-01.jpg)">
    
              <div class="container bg-white py-5" style="margin-top:100px">
                <div align="center" style="padding: 15px;" >
                  <h1>Welcome, {{ $user->name }}</h1>

                    <h3 class="mb-3">Notification From Admin:</h3>
                    <ul>
                        @foreach($feedbacks as $feedback)
                            <li>
                                <strong>message:</strong> {{ $feedback->data }} <br>
                                <!-- Add more fields as needed -->
                            </li>
                        @endforeach
                    </ul>
                </div>
              </div>
              
            </div>
          </div>
      </div>
    </div>
    </div>  
    @include('sweetalert::alert')
  </body>
</html>
