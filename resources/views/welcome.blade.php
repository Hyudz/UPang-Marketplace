<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Homepage</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Sahitya" rel="stylesheet">
        <script src="https://kit.fontawesome.com/de52212229.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{asset('css/landing.css')}}">
        <link rel="stylesheet" href="{{asset('css/header.css')}}">
        <link href="{{asset('img/logowithoutbg.png')}}" rel="icon" type="image/x-icon">

        <style>
            body {
                background-color: #EEF6FF;
            }
        </style>
    </head>
        <body>
        @include('header2')
        <div class="container-fluid mainContent">
    
            <div class="container-fluid h-100" id="content">
                <div class="row">
                    <div class="col-md">
                        <div class="d-flex justify-content-center">
                            <div class="d-flex flex-column">
                                <h1 class="mt-5" style="text-align: center;"> Student Deals</h1>
                                <h5 style="text-align: center;">Limited-time student offers, don't miss out!</h5>
                            </div>
                        </div> 
                        <div class="d-flex">
                            @foreach($products->take(3) as $product)
                            <a href="{{route('viewproduct', $product->id)}}">
                                <div class="card mt-2 ms-1" style="width: 15rem;">
                                    <img class="card-img-top" style="width: auto; height : 200px;" src="{{ asset('uploads/products/'.$product->image) }}" alt="product image">
                                    <div class="card-body">
                                        <h5 class="card-title" id="product1">{{$product->name}}</h5>
                                        <p class="card-text" style="text-align: justify;"><span style="text-decoration: line-through;">₱{{$product->price + 200}}</span> ₱{{$product->price}}</p>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                        </div>
                        
                        <div class="mt-5 me-5 mb-5 container-fluid d-flex justify-content-center">
                            <a href="{{route('product')}}" class="btn btn-warning">Browse More Products</a>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mh-100" style="height: 100%;" class="model">
                            <img src="{{asset('img/girl.png')}}" alt="none" class="img-fluid" style="max-height: 90vh; width: 100%;">
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
