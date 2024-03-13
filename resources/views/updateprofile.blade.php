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
                <form action="{{route('updateAccount', $id)}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="d-flex flex-column">
                        <div class="container">
                            <label for="Email">Email</label>
                            <input type="text" required name="email" id="email" class="form-control">
                        </div>

                        <div class="container">
                            <label for="password">Current Password</label>
                            <input type="password" required name="password" id="password" class="form-control">
                        </div>

                        <div class="container">
                            <label for="newpassword">New Password</label>
                            <input type="password" required name="newpassword" id="newpassword" class="form-control">
                        </div>

                        <div class="container">
                            <label for="newpassword_confirmation">Confirm Password</label>
                            <input type="password" required name="newpassword_confirmation" id="newpassword_confirmation" class="form-control">
                        </div>

                        <input type="hidden" name="id" value="{{$id}}">
                    </div>

                    <div class="d-flex justify-content-center mt-3">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>