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
        <link href="{{asset('img/logowithoutbg.png')}}" rel="icon" type="image/x-icon">

        <style>
            body {
                background-color: #EEF6FF;
            }
        </style>
    </head>
    <body>
    @include('header')
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header text-center">
                                <img src="{{ asset('uploads/products/'.$product->image) }}" alt="product image" class="img-fluid" style="max-height: 400px;">
                            </div>

                            <div class="card-body">
                                <h5 class="card-title ms-4" style="font-family: 'Sahitya';" id="productname">{{ $product->name }}</h5>
                                <h5 class="ms-4">₱{{ $product->price }}.00</h5>
                                <p class="card-text ms-4 short_desc">{{ $product->description }}</p>
                            </div>

                            <div class="card-footer d-flex flex-row justify-content-center">
                                <form method="POST" action="{{ route('save_item', $product->id) }}">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <button type="submit" class="btn btn-success me-2">
                                        <span class="fa fa-shopping-cart"></span> Add to Cart
                                    </button>
                                </form>

                                <a href="{{ route('checkout-item', $product->id) }}" class="btn btn-warning">Buy Now</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="row">
                            @foreach($similar->take(6) as $similarProduct)
                                <div class="col-md-4">
                                    <a href="{{ route('viewproduct', $similarProduct->id) }}" class="text-decoration-none">
                                        <div class="card">
                                            <img class="card-img-top" style="height: 200px; object-fit: cover;" src="{{ asset('uploads/products/'.$similarProduct->image) }}" alt="product image">
                                            <div class="card-body">
                                                <h5 class="card-title" id="product1">{{ $similarProduct->name }}</h5>
                                                <p class="card-text" style="text-align: justify;">₱{{ $similarProduct->price }}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
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
