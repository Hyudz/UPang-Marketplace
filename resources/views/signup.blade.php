<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="{{asset('css/signup.css')}}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('img/medyo final na logo 1.png')}}" rel="icon" type="image/x-icon">
</head>
<body>

    <div class="container-fluid">
        <div class="row" style="height: 100%;">
            <div id="sideContent" class="col-3 vh-100 d-inline-block" style="background-color: #D9D9D9;">
                <img src="{{asset('img/medyo final na logo 1.png')}}" alt="Marketplace Logo" id="logo" style="width: 50%; margin-top:50%" class="rounded mx-auto d-block">
                <h1 style="font-family: 'Sahitya';" class="mx-auto text-center">Already have an account?</h1>
                <h5 class="mx-auto text-center">Sign in now!</h5>
            
                <form action="{{route('login')}}" method="get">
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-light mx-auto" type="submit" id="signInbtn">Sign In</button>
                    </div>
                </form>
            </div>

            <div id="mainContent" class="col">

            <div class="mt-5">
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
                <h1 style="font-family: 'Sahitya';" class="d-flex justify-content-start" id="header">Sign Up</h1>
                <div class="d-flex flex-column">
                    <div class="container-fluid" id="signup_form">
                        <form action="{{route('create-user')}}" method="POST" id="loginform" class="content-center">
                            @csrf
                            <div class="row">
                                <div class="mt-auto col-sm">
                                    <input type="text" name="first_name" placeholder="First Name" class="form-control" id="form_input">
                                </div>
                                <div class="mt-auto col-sm">
                                    <input type="text" name="last_name" placeholder="Last Name" class="form-control" id="form_input">
                                </div>
                            </div>
                            <div class="mt-3">
                                <input type="email" name="email" placeholder="Email" class="form-control" id="form_input">
                            </div>
                            <div class="mt-3">
                                <input type="password" name="password" placeholder="Password" class="form-control" id="form_input">
                            </div>
                            <div class="mt-3">
                                <input type="password" name="password_confirmation" placeholder="Confirm Password" class="form-control" id="form_input">
                            </div>
                            <div class="mt-3">
                                <div class="container text-center">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="d-flex justify-content-start col">User Type</h5>
                                            <select name="user_type" class="form-select" id="form_input" required>
                                                <option value="none"></option>
                                                <option value="buyer">Buyer</option>
                                                <option value="seller">Seller</option>
                                            </select>
                                        </div>

                                        <div class="col">
                                            <h5 class="d-flex justify-content-start col">Gender</h5>
                                            <select name="gender" class="form-select" id="form_input" required>
                                                <option value="none"></option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </div>

                                        <div class="col">
                                            <h5 class="d-flex justify-content-start col">Birthday</h5>
                                            <input type="date" name="birthday" class="form-control" id="form_input" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <input type="checkbox" name="terms" id="terms" class="form-check-input" onclick="checkterms()"> I have read your <a href="#">Privacy and Policy</a> and I agree on your <a href="#"> Terms and conditions. </a>
                            </div>

                            <button type="submit" class="btn btn-secondary" id="signUpBtn">Sign Up</button>
                        </form>
                    </div>
                </div>
            </div>
    </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        let agree = document.getElementById('terms');

        function checkterms(){
            if(agree.checked == true){
                document.getElementById('signUpBtn').disabled = false;
            }
            else{
                document.getElementById('signUpBtn').disabled = true;
            }
        }
        
        checkterms();
    </script>
</body>
</html>