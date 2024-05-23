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
<script>
    document.getElementById("balance").addEventListener("click", function() {
        alert("Your Current Balance is: "+ {{$customerdata->balance}});
    });

</script>