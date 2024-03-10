<!-- this page contains the profile of the user to see
his/her uploaded products and if he/she wants to edit his/her details -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('img/medyo final na logo 1.png')}}" rel="icon" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('css/header.css')}}">
    <script src="https://kit.fontawesome.com/de52212229.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Profile</title>
    <style>
        body {
                background-color: #EEF6FF;
            }
        </style>
</head>
<body>
        @include('header2')

        <div class="profile container mt-3">
            <div class="profile-details d-flex justify-content-between" style="border: 3px solid;">
                <div class="profile-details p-3">
                    <h5>{{$usertype->first_name}} {{$usertype->last_name}}</h5>
                    <h6> {{$usertype->email}} </h6>
                </div>

                <div class="me-3 mt-2">
                    <a href="{{route('editProfile')}}" class="btn btn-primary">Edit Profile</a>    
                </div>
            </div>
        </div>

        @include('admin/sellerprofile')


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>