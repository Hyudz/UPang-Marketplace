<!-- this page contains the profile of the user to see
his/her uploaded products and if he/she wants to edit his/her details -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('img/logowithoutbg.png')}}" rel="icon" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('css/header.css')}}">
    <script src="https://kit.fontawesome.com/de52212229.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Profile</title>
    <style>
        body {
                background-color: #EEF6FF;
            }

            * {
                font-family: 'Sahitya', sans-serif;
            }

            .nav-pills .nav-link.active, .nav-pills .nav-link:hover {
            color: #23713E;
            background-color: #F3E309;
            border-color: #F3E309;
            }

            .nav-pills .nav-link {
                color: #4D9941 ;
            }
    </style>
</head>
<body>
        @include('header2')
        <!-- ETO YUNG SA SELLER PROFILE  -->
        <div class="profile container d-flex flex-row mt-3 h-100" >
            <div class="profile-details d-flex h-100 flex-column justify-content-between" style="border: 1px solid; box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.5); background-color: white;">
                <div class="profile-details p-3" >
                    <h5>{{$usertype->first_name}} {{$usertype->last_name}}</h5>
                    <h6> {{$usertype->email}} </h6>
                </div>

                <div class=" container-fluid p-1">
                    <div class=" mt-2 container-fluid">
                        <a href="{{route('editProfile')}}" class="btn btn-success w-100">Edit Profile</a>    
                    </div>

                    <div class="me-3 container-fluid">
                        <a href="{{route('deleteProfile', $usertype->id)}}" class="btn btn-danger w-100">Delete Profile</a>    
                    </div>
                </div>
            </div>

            <div class="container">
                @include('admin/sellerprofile')
            </div>
        </div>

        


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>