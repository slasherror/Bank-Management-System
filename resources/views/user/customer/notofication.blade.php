<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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

</head>
<body>
  <header class="header_area header-sticky" style="background: #212741">
    <div class ="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <a href=" " class="logo">
                        <img src="user/assets/images/kblogo.png" alt="logo">
                    </a>
                    <ul class="nav">
                        <li class="scroll-to-section"><a href="{{url('home')}}">Home</a></li>
                        <li class="scroll-to-section"><a href="{{url('account')}}" class="active">Accounts</a></li>
                        <li class="scroll-to-section"><a href="{{url('accountstatement')}}">Account Stateme</a></li>
                        <li class="scroll-to-section"><a href="{{url('fundtransfer')}}">Fund Transfer</a></li>
                         {{-- <li id="balance" class="scroll-to-section" style="background: yellowgreen; border-radius:10%; height:40px; margin-left:10px"><a href="{{url('balance',$customerdata->id)}}">Balance</a></li> --}}
                         <li class="scroll-to-section" style="background: yellowgreen; border-radius:10%; height:40px; margin-left:10px"><a href="{{url('balance')}}">Balance</a></li>
                         @if(Route::has('login'))
                         @auth
                           
                            <li class="has-sub" style="background:rgb(2, 80, 80); border-radius:5%; height:40px; margin-left:10px">
                                <a href="javascript:void(0)">{{ Auth::user()->name }}</a>
                                <ul class="sub-menu">
                                    <li><a class="dropdown-item" href="{{url('account')}}">Profile</a></li>
                                    <li><a class="dropdown-item" href="{{url('frontendNotification')}}">Notification</a></li>
                                    <li><a class="dropdown-item" href="{{ route ('feedback.admin') }}">Feedback</a></li>
                                    <li><a class="dropdown-item" 



                         @endauth

                    </ul>
            </div>
    </div>
</header>  

     
</body>
</html>
