<header>
    <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light" style="background-color: #23713E;">
    <div class="container-fluid">
        <a href="{{route('landing')}}">
            <img src="{{asset('img/medyo final na logo 1.png')}}" style="height: 10vmin;" alt="" loading="lazy" class="m-2"/>
        </a>
    
        <form class="d-md-flex input-group w-auto my-auto" method="POST" action="{{secure_url(route('search2'))}}">
            @csrf
            <input type="search" name="search" class="form-control" placeholder='I am looking for...' style="min-width: 300px; border-radius: 60px 0px 0px 60px"/>
            <span class="input-group-text border-0">
                <button type="submit" style="background-color: transparent; border: 0px;">
                    <i class="fas fa-search"></i>
                </button>
            </span>
        </form>
    
    <ul class="navbar-nav ms-auto">
        <div class="container">
            <span style="color: white;">Log in or</span> <a href="{{route('signup')}}" style="text-decoration: underline; color: #D3B306;"> Create Your Marketplace Account!</a>
            <form class="d-flex me-5" action="{{secure_url(route('login-post'))}}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input class="form-controll me-2" type="email" name="email" placeholder="Email">
                <input class="form-controll me-2" type="password" name="password" placeholder="Password">
                <button class="btn btn-outline-warning" type="submit">Login</button>
            </form>
        </div>
    </ul>
    </div>
    </nav>
</header>
