<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="{{asset('css/signup.css')}}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('img/medyo final na logo 2.png')}}" rel="icon" type="image/x-icon">
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
                <h1 style="font-family: 'Sahitya';" class="d-flex justify-content-start" id="header">Sign Up</h1>
                <div class="d-flex flex-column">
                    <div class="container-fluid" id="signup_form">
                        <form action="{{route('homepage')}}" method="" id="loginform" class="content-center">
                            @csrf
                            <div class="row">
                                <div class="mt-auto col-sm">
                                    <input type="text" name="First_Name" placeholder="First Name" class="form-control" id="form_input">
                                </div>
                                <div class="mt-auto col-sm">
                                    <input type="text" name="Last_Name" placeholder="Last Name" class="form-control" id="form_input">
                                </div>
                            </div>
                            <div class="mt-3">
                                <input type="email" name="email" placeholder="Email" class="form-control" id="form_input">
                            </div>
                            <div class="mt-3">
                                <input type="password" name="password" placeholder="Password" class="form-control" id="form_input">
                            </div>
                            <div class="mt-3">
                                <input type="password" name="password_confirm" placeholder="Confirm Password" class="form-control" id="form_input">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" ></script>
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