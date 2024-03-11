<!DOCTYPE html>
    <html lang="en">
        <head>
            <title>UPang Marketplace</title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <link href="{{asset('css/login.css')}}" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Sahitya" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Inria+Serif" rel="stylesheet">
            <link href="{{asset('img/logowithoutbg.png')}}" rel="icon" type="image/x-icon">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        </head>
        <body class="d-flex justify-content-center align-items-center" style="height: 100vh;">  
            <div class="container-fluid d-flex justify-content-center align-items-center">
                <div class="container m-" style="background-color: white; box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.5); background: rgb(255,255,255); background: linear-gradient(158deg, rgba(255,255,255,1) 0%, rgba(226,255,220,1) 100%);">
                    <div class="row">
                        <div class="col p-5">
                            <div class="d-flex justify-content-center">
                                <img src="{{asset('img/medyo final na logo 1.png')}}" alt="UPang Marketplace" style="width: 50px; height: 50px; margin-right: 20px;" class="me-3">
                                <h1 style="font-family: 'Sahitya';" class="text-center">We're glad you're back!</h1>
                            </div>
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
                                            <a href="{{route('forgotpassword')}}" class="text-decoration-none" id="forgotPassword">Forgot Password?</a>
                                        </span>
                                        
                                        <div class="d-flex justify-content-center">
                                            <button type="submit" class="btn btn-outline-success" id="loginBtn">Login</button>
                                        </div>
                                    </form>
                                </div>

                                <div class="d-flex justify-content-center">
                                    <hr>
                                </div>

                                <div class="d-flex justify-content-center">
                                    <span style="font-family:'Inria Serif';" class="text-center">Or <a href="{{route('signup')}}">Sign up</a> to enjoy student discount </h5>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="container mt-5">
                                <img src="{{asset('img/intro.png')}}" alt="UPang Marketplace" class="img-fluid">
                            </div>
                        </div>
                    </div>
                
                </div>
            </div>
                <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        </body>
    </html>