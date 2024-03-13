<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('img/logowithoutbg.png')}}" rel="icon" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Edit Profile</title>
    <style>
        * {
            font-family: 'Sahitya', sans-serif;
        }

        body {
            background-color: #EEF6FF;
        }

        </style>
</head>
<body>
    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="card" style="width: 35rem; box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.5);">
            <div class="container mt-2">
                <h3 class="text-center" style="font-family: 'Sahitya', sans-serif;">Update your Profile</h3>
            </div>

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

            <div class="card-body">
                <form action="{{route('updateProfile',$userDetails->id)}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="d-flex">
                        <div class="container">
                            <label for="first_name">First Name</label>
                            <input type="text" name="first_name" id="first_name" class="form-control" value="{{$userDetails->first_name}}">
                        </div>

                        <div class="container">
                            <label for="last_name">Last Name</label>
                            <input type="text" name="last_name" id="last_name" class="form-control" value="{{$userDetails->last_name}}">
                        </div>
                    </div>

                    <label for="email" class="mt-1">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{$userDetails->email}}">

                    <label for="password" class="mt-1">Current Password</label>
                    <input type="password" name="password" id="password" class="form-control">

                    <label for="new_password" class="mt-1">New Password</label>
                    <input type="password" name="new_password" id="new_password" class="form-control">

                    <label for="confirm_password" class="mt-1">Confirm Password</label>
                    <input type="password" name="new_password_confirmation" id="confirm_password" class="form-control">

                    <input type="hidden" name="usertype" value="{{$userDetails->id}}">

                    <div class="d-flex justify-content-center">
                        <a href="{{route('homepage')}}" class="btn btn-secondary mt-3 me-3">Cancel</a>
                        <button type="submit" class="btn btn-success mt-3 ">Submit</button>
                    </div>
                </form>

                <!-- <form action="{{ route('deleteProfile', $userDetails->id) }}" method="POST" class="d-flex justify-content-center">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger mt-3 me-3">Delete Account</button>
                </form> -->
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>