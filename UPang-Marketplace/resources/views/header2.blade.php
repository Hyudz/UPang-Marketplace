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
                <button onclick="myFunction()" class="dropbtn"> <i class="fa fa-circle-user"></i>Hello!</button>
                <div id="myDropdown" class="dropdown-content">
                    <a href="{{route('profile')}}"><i class="fa fa-circle-user"></i> Profile</a>
                    <a href="{{route('settings')}}"><i class="fa-solid fa-gear"></i> Settings</a>
                    <a href="{{route('logout')}}"><i class="fa-solid fa-right-from-bracket"></i>Log Out</a>
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
                <a href="#" class="nav-item">
                    <i class="fa fa-bell" id="nav-icon"></i>
                </a>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-item">
                    <i class="fa fa-message" id="nav-icon"></i>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('sell')}}">
                    <button type="submit" style="border-radius:60px; width: auto;">SELL</button>
                </a>
            </li>
        </ul>
    </div>
    
  </nav>
  
  

</header>

<script>
    function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>