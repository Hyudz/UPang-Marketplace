<!DOCTYPE html>
    <html lang="en">
        <head>
            <title>UPang Marketplace</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
            <link href="{{asset('css/login.css')}}" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Sahitya" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Inria+Serif" rel="stylesheet">
            <link href="{{asset('img/icon.png')}}" rel="icon" type="image/x-icon">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        </head>

        <body>  
<div class="flex-container">
    <div id="mainContent" class="ms-auto">
        <h1 style="font-family: 'Sahitya';" class="text-center">Welcome to PHINMA-UPang Marketplace</h1>
        <h5 style="font-family:'Inria Serif';" class="text-center"></h5>

        <div class="d-flex justify-content-center">
            <hr>
        </div>

        <div class="d-flex flex-column justify-content-center">
            <h5 style="font-family:'Inria Serif';" class="text-center">Login to your account</h5>
            <div class="d-flex justify-content-center">
                <form action="{{route('homepage')}}" method="" id="loginform" class="content-center">
                    @csrf
                    <div class="m-auto">
                        <input type="email" name="email" placeholder="Email" class="form-control form_input">
                    </div>
                    <div class="m-auto">
                        <input type="password" name="password" placeholder="Password" class="form-control form_input">
                    </div>
                    <span class="d-flex flex-row-reverse" style="cursor: pointer;">Forgot Password</span>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-secondary" id="loginBtn">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="sideContent" >
        <img src="{{asset('img/logo.png')}}" alt="Marketplace Logo" id="logo" class="rounded mx-auto d-block">
        <h1 style="font-family: 'Sahitya';" class="mx-auto text-center">Dont have an account?</h1>
        <h5 class="mx-auto text-center">Sign up and enjoy shopping!</h5>
        
        <form action="{{route('signup')}}" method="get">
            <div class="d-flex justify-content-center">
                <button class="btn btn-light mx-auto" type="submit" id="signUpbtn">Sign Up</button>
            </div>
        </form>
    </div>

</div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" ></script>
        </body>
    </html>