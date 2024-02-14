<!-- this page contains the profile of the user to see
his/her uploaded products and if he/she wants to edit his/her details -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('img/medyo final na logo 2.png')}}" rel="icon" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('css/header.css')}}">
    <script src="https://kit.fontawesome.com/de52212229.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<div class="container-fluid">
        @include('header2')
    </div>
    
    
    <div class="container min-vh-100 ms-auto me-auto mt-auto mb-auto" style="overflow: auto;">
        <div class="container">
            <h1>Your product</h1>
        </div>
    
        <div class="container" style="padding-left: 150px;">
                <div class="row w-auto">
                    @foreach($products as $like)
                    <div class="col">
                        <a href="#"> <!-- Not the link to the product but the link to the product details and analytics -->
                            <div class="card mt-5" style="width: 18rem;">
                                <img class="card-img-top" src="{{asset('products/placeholder.png')}}" alt="product image">
                                <div class="card-body">
                                    <h5 class="card-title" id="product1">{{$like->name}}</h5>
                                    <p class="card-text" style="text-align: justify;">₱{{$like->price}}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                    
                </div>
            </div>
    </div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>