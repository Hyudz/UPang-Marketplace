<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="{{asset('css/signup.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="{{asset('img/medyo final na logo 1.png')}}" rel="icon" type="image/x-icon">
</head>
<body style="height: 100vh;">

    <div class="mt-3" style="height: 15px;"></div>
    <div class="container mt-5 p-5" style="width: 600px; box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.5);">
        <div class="justify-content-center">
            <h3 class="text-center" style="font-family: 'Sahitya', sans-serif;">Welcome to PHINMA UPang Marketplace</h3>
            <h6 class="text-center" style="font-family: 'Sahitya', sans-serif;">Already have an account? <a href="{{route('login')}}" style="text-decoration: none;">Sign in </a> now!</h6>
            <div class="mt-5 d-flex justify-content-center">
            <div class="row">
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
        </div>
        <div class="d-flex justify-content-center">
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
                                <h5 class="d-flex justify-content-start col" style="font-size: auto;">Role</h5>
                                <select name="user_type" class="form-control" id="dropdown" required>
                                    <option value="none"></option>
                                    <option value="buyer">Buyer</option>
                                    <option value="seller">Seller</option>
                                </select>
                            </div>

                            <div class="col">
                                <h5 class="d-flex justify-content-start col">Gender</h5>
                                <select name="gender" class="form-control   " id="dropdown" required>
                                    <option value="none"></option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>

                            <div class="col">
                                <h5 class="d-flex justify-content-start col">Birthdate</h5>
                                <input type="date" name="birthday" class="form-control" id="dropdown" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <input type="checkbox" name="terms" id="terms" class="form-check-input" onclick="checkterms()"> I have read your <a href="#">Privacy and Policy</a> and I agree on your <a href="#"> Terms and conditions. </a>
                </div>

                <div class="d-flex justify-content-center mt-3">
                    <button type="submit" class="btn btn-outline-success" id="signUpBtn">Sign Up</button>
                </div>
            </form>
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