<header>
    <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light" style="background-color: #23713E;">
    <div class="container-fluid">
        <img src="{{asset('img/medyo final na logo 1.png')}}" style="height: 10vmin;" alt="" loading="lazy" class="m-2"/>

        <form class="d-none d-md-flex input-group w-auto my-auto">
            <input type="search" class="form-control" placeholder='I am looking for...' style="min-width: 300px; border-radius: 60px 0px 0px 60px"/>
            <span class="input-group-text">
                <a href="#">
                    <i class="fas fa-search"></i>
                </a>
            </span>
        </form>
    

    <ul class="navbar-nav ms-auto">
        <div class="container">
            <span style="color: white;">Log in or</span> <a href="{{route('signup')}}" style="text-decoration: underline; color: #D3B306;"> Create Your Marketplace Account!</a>
            <form class="d-flex me-5" action="{{route('login-post')}}" method="POST">
                @csrf
                <input class="form-controll me-2" type="email" name="email" placeholder="Email">
                <input class="form-controll me-2" type="password" name="password" placeholder="Password">
                <button class="btn btn-outline-warning" type="submit">Login</button>
            </form>
        </div>
    </ul>
    </div>
    </nav>
</header>