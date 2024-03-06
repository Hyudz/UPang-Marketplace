<!DOCTYPE html>
    <html lang="en">
        <head>
            <title>UPang Marketplace</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
            <link href="{{asset('css/login.css')}}" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Sahitya" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Inria+Serif" rel="stylesheet">
            <link href="{{asset('img/medyo final na logo 1.png')}}" rel="icon" type="image/x-icon">
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
        <div class="mt-5 d-flex justify-content-center">
            @if($errors->any())
                <div class="col-12">
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">{{$error}}</div>
                    @endforeach
                </div>
            </div>
            @endif

            @if(session()->has('error'))
                <div class="alert alert-danger">{{session('error')}}</div>
            @endif

            @if(session()->has('success'))
                <div class="alert alert-success">{{session('success')}}</div>
            @endif
        </div>

        <div class="d-flex flex-column justify-content-center">
            <h5 style="font-family:'Inria Serif';" class="text-center">Login to your account</h5>
            <div class="d-flex justify-content-center">
                <form action="{{route('login-post')}}" method="POST" id="loginform" class="content-center">
                    @csrf
                    <div class="m-auto">
                        <input type="email" name="email" placeholder="Email" required class="form-control form_input">
                    </div>

                    <div class="m-auto">
                        <input type="password" name="password" placeholder="Password" required class="form-control form_input">
                    </div>

                    <span class="d-flex flex-row-reverse">
                        <a href="{{route('forgotpassword')}}" class="text-decoration-none" id="forgotPassword">Forgot Password</a>
                    </span>
                    
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-secondary" id="loginBtn">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="sideContent" >
        <img src="{{asset('img/medyo final na logo 1.png')}}" alt="Marketplace Logo" id="logo" class="rounded mx-auto d-block">
        <h1 style="font-family: 'Sahitya';" class="mx-auto text-center">Don't have an account?</h1>
        <h5 class="mx-auto text-center">Sign up now and enjoy shopping with a Student Discount!</h5>
        
        <form action="{{route('signup')}}" method="get">
            <div class="d-flex justify-content-center">
                <button class="btn btn-light mx-auto" type="submit" id="signUpbtn">Sign Up</button>
            </div>
        </form>
    </div>

    </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        </body>
    </html>