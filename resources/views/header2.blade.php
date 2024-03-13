<header>
    <nav id="main-navbar" class="navbar navbar-expand-lg" style="background-color: #23713E;">
    <div class="container-fluid">

        <button class="navbar-toggler" style="display: none;" type="button" data-mdb-toggle="collapse" data-mdb-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <a class="navbar-brand" href="{{route('homepage')}}">
            <img  src="{{asset('img/logowithoutbg.png')}}" style="height: 10vmin;" alt="" loading="lazy"/>
        </a>

        <form class="d-none d-md-flex input-group w-auto my-auto" method="POST" action="{{route('search')}}">
            @csrf
            <input type="search" name="search" class="form-control" placeholder='I am looking for...' style="min-width: 300px; border-radius: 60px 0px 0px 60px"/>
            <span class="input-group-text border-0">
                <button type="submit" style="background-color: transparent; border: 0px;">
                    <i class="fas fa-search"></i>
                </button>
            </span>
        </form>

        <ul class="navbar-nav ms-auto d-flex flex-row">
            <li class="nav-item dropdown">
                <div class="dropdown">
                    <button type="button" style="border: 0px; background-color: transparent; color: white;" id="dropdown-profile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-circle-user"></i> <span class="ms-1">Hello {{$usertype->first_name}}!</span>
                    </button>

                    <div class="dropdown-menu" aria-labelledby="dropdown-profile">
                        @if($usertype->user_type == 'buyer')
                        <a class="dropdown-item" href="{{route('buyer_profile')}}"><i class="fa fa-circle-user"></i> Profile</a>
                        @elseif($usertype->user_type == 'seller')
                        <a class="dropdown-item" href="{{route('profile')}}"><i class="fa fa-circle-user"></i> Profile</a>
                        @endif
                        <a class="dropdown-item" style="display: none;" href="{{route('settings')}}"><i class="fa-solid fa-gear"></i> Settings</a>
                        <a class="dropdown-item" href="{{route('logout')}}"><i class="fa-solid fa-right-from-bracket"></i>Log Out</a>
                    </div>
                </div>

            <li class="nav-item" style="display: none;">
                <a href="{{route('likes')}}" class="nav-item"> 
                    <i class="fa fa-heart" id="nav-icon"></i>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('cart')}}" style="color: white;" class="nav-item">
                    <i class="fa fa-shopping-cart" id="nav-icon"></i>
                </a>
            </li>

            <li class="nav-item">
                <div class="dropdown">
                    <button type="button" style="border: 0px; background-color: transparent; color: white;" id="dropdown-notif" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bell" id="nav-icon"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdown-notif" style="margin-left: -230px; width: 270px; max-height: 300px; overflow-y: auto;">
                        @if($notifications->count() == 0)
                            <span class="dropdown-item">No notifications</span>
                        @else
                            @foreach($notifications as $notification)
                                <div class="dropdown-item text-wrap" style=" overflow: hidden; text-overflow: ellipsis; height: 50px;">
                                    <span>{{$notification->message}}</span>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </li>

            @if($usertype->user_type == 'buyer')
            <li class="nav-item" >
                <a href="{{route('sell')}}" class="nav-item" >
                    <button type="submit" style="display: none;">SELL</button>
                </a>
            </li>
            @elseif($usertype->user_type == 'seller')
            <li class="nav-item">
                <a href="{{route('sell')}}" style="text-decoration: none;" class="nav-item btn btn-outline-warning"> <span>SELL</span> </a>
            </li>
            @endif
        </ul>
    </div>
    
    </nav>
</header>