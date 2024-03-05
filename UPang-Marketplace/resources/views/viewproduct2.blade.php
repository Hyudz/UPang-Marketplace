<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{$product->name}}</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Sahitya" rel="stylesheet">
        <script src="https://kit.fontawesome.com/de52212229.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{asset('css/viewproduct.css')}}">
        <link rel="stylesheet" href="{{asset('css/header.css')}}">
        <link href="{{asset('img/medyo final na logo 1.png')}}" rel="icon" type="image/x-icon">

        <style>
            body {
                background-color: #EEF6FF;
            }
        </style>
    </head>
    <body>
    @include('header')
        <div class="container-fluid mainContent">
            
            <div class="d-flex">
            <div class="col-md">
                <h1 class="p-4" style="font-family: 'Sahitya';" id="productname">
                    {{$product->name}}
                </h1>
                <h5 class="ms-4">₱{{$product->price}}.00</h5>
                <h5 class="short_desc ms-4">{{$product->description}}</h5><br>
                <div class="d-flex justify-content-center">
                    <form method="POST" action="{{route('save_item',$product->id)}}">
                        @csrf
                        <input type="hidden" name="product_id" value="$product->id">
                        <button id="shoppingbtn" type="submit"> <span class="fa fa-shopping-cart"></span> Add to Cart</button>
                    </form>

                    <a href="{{route('checkout-item',$product->id)}}">
                        <button id="shoppingbtn">Buy Now</button>
                    </a>
                </div>
            </div>

            <div class="col-md" style="height: 100vmin;">
                <div class="mh-100 container mt-5 mb-auto me-auto ms-auto" class="model">
                    <img src="{{asset('uploads/products/'.$product->image)}}" alt="product image" class="img-fluid" style="max-height: 90vh; width: 100%;">
                </div>
            </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
