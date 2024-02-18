<header>
    <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container-fluid">

        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <a class="navbar-brand" href="{{route('homepage')}}">
            <img  src="{{asset('img/medyo final na logo 2.png')}}" style="height: 10vmin;" alt="" loading="lazy"/>
        </a>

        <form class="d-none d-md-flex input-group w-auto my-auto">
            <input type="search" class="form-control" placeholder='I am looking for...' style="min-width: 300px; border-radius: 60px"/>
            <span class="input-group-text border-0 ms-3">
                <a href="#">
                    <i class="fas fa-search"></i>
                </a>
            </span>
        </form>

        <ul class="navbar-nav ms-auto d-flex flex-row">
            <li class="nav-item dropdown">
                <div class="dropdown">
                    <button type="button" style="border: 0px; background-color: none;" id="dropdown-profile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-circle-user"></i>Hello {{$usertype}}!
                    </button>

                    <div class="dropdown-menu" aria-labelledby="dropdown-profile">
                        @if($usertype == 'buyer')
                        <a class="dropdown-item" href="{{route('buyer_profile')}}"><i class="fa fa-circle-user"></i> Profile</a>
                        @elseif($usertype == 'seller')
                        <a class="dropdown-item" href="{{route('profile')}}"><i class="fa fa-circle-user"></i> Profile</a>
                        @endif
                        <a class="dropdown-item" href="{{route('settings')}}"><i class="fa-solid fa-gear"></i> Settings</a>
                        <a class="dropdown-item" href="{{route('logout')}}"><i class="fa-solid fa-right-from-bracket"></i>Log Out</a>
                    </div>
                </div>

            <li class="nav-item">
                <a href="{{route('likes')}}" class="nav-item"> 
                    <i class="fa fa-heart" id="nav-icon"></i>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('cart')}}" class="nav-item">
                    <i class="fa fa-shopping-cart" id="nav-icon"></i>
                </a>
            </li>

            <li class="nav-item">
                <div class="dropdown">
                    <button type="button" style="border: 0px; background-color: none;" id="dropdown-notif" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bell" id="nav-icon"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdown-notif" style="margin-left: -150px; width: 250px;">
                        @if($notifications->isEmpty())
                            <span class="dropdown-item">No new notifications</span>
                        @else
                        @foreach($notifications as $notification)
                            <div class="dropdown-item">{{$notification->message}}</div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <div class="dropdown">
                    <button type="button" style="border: 0px; background-color: none;" id="dropdown-msg" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-message" id="nav-icon"></i>
                    </button>

                    <div class="dropdown-menu me-auto" aria-labelledby="dropdown-msg" style="margin-left: -155px; width: 225px;">
                        @if($messages->isEmpty())
                            <span class="dropdown-item">No new message</span>
                        @else
                        @foreach($messages as $message)
                            <div class="dropdown-item">{{$message}}</div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </li>

            @if($usertype == 'buyer')
            <li class="nav-item" >
                <a href="{{route('sell')}}" >
                    <button type="submit" style="display: none;">SELL</button>
                </a>
            </li>
            @elseif($usertype == 'seller')
            <li class="nav-item">
                <a href="{{route('sell')}}">
                    <button type="submit" style="border-radius:60px; width: auto;">SELL</button>
                </a>
            </li>
            @endif
        </ul>
    </div>
    
    </nav>
</header>