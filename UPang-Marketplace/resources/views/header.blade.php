    <!-- This page contains the header of the marketplace  -->
    
    <div class="row">
        <div class="mt-3 ms-3 col-2">
            <a href="{{route('home')}}">
                <img src="{{asset('img/logo.png')}}" alt="Marketplace Logo" id="logo" style="width: 15vmax;">
            </a>
        </div>

        <div class="col-5">
            <form>
                <div>
                    <input type="text" name="search" placeholder="I am looking for..." class="form-control" id="searchbar">
                </div>
            </form>
        </div>

        <div class="col-sm d-flex">
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

        <div class="container-fluid col">
            <nav>
                <ul>
                    <a href="{{route('likes')}}" style="color: red;"> 
                        <i class="fa fa-heart"></i>
                    </a>
                    <a href="{{route('cart')}}">
                        <i class="fa fa-shopping-cart"></i>
                    </a>    

                    <!-- WALA YATANG SARILING PAGE TO EH JUST LIKE IN FB -->
                    <a href="#">
                        <i class="fa fa-bell"></i>
                    </a>
                    <a href="#">
                        <i class="fa fa-message"></i>
                    </a>
                    <button type="submit" style="border-radius:60px; width: 20%">SELL</button>
                </ul>
            </nav>
        </div>
    </div>