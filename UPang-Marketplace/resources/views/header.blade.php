    <!-- This page contains the header of the marketplace  -->
    
    <div class="row">
        <div class="mt-3 ms-3 col-sm-2 container">
            <a href="{{route('home')}}" class="ms-5">
                <img src="{{asset('img/LOGO 2.png')}}" alt="Marketplace Logo" id="logo" style="width: 7vmax;">
            </a>
        </div>

        <div class="col-5 mt-4 container-fluid">
            <form>
                <div>
                    <input type="text" name="search" placeholder="I am looking for..." class="form-control" id="searchbar">
                </div>
            </form>
        </div>

        <div class="col-sm-2 d-flex mt-4">
            <div class="item-container">
                <div class="container d-flex">
                    <div class="icon">
                        <i class="fa fa-circle-user"></i>
                    </div>
                    <div class="text ms-1">
                        <h6 class="ms-1">Hello, {name}</h6>
                    </div>
                </div>
                <div class="button-list">
                    <div class="items-list">
                        <i class="fa fa-circle-user"></i>
                        <a href="{{route('profile')}}">Profile</a>
                    </div>

                    <div class="items-list">
                        <i class="fa-solid fa-gear"></i>
                        <a href="{{route('settings')}}">Settings</a>
                    </div>

                    <div class="items-list">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <a href="{{route('logout')}}">Log Out</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid col mt-4">
            <nav>
                <ul>
                    <a href="{{route('likes')}}" class="nav-item"> 
                        <i class="fa fa-heart" id="nav-icon"></i>
                    </a>
                    <a href="{{route('cart')}}" class="nav-item">
                        <i class="fa fa-shopping-cart" id="nav-icon"></i>
                    </a>    

                    <!-- WALA YATANG SARILING PAGE TO EH JUST LIKE IN FB -->
                    <a href="#" class="nav-item">
                        <i class="fa fa-bell" id="nav-icon"></i>
                    </a>
                    <a href="#" class="nav-item">
                        <i class="fa fa-message" id="nav-icon"></i>
                    </a>
                    <a href="{{route('sell')}}">
                        <button type="submit" style="border-radius:60px; width: auto;">SELL</button>
                    </a>
                </ul>
            </nav>
        </div>
        
    </div>