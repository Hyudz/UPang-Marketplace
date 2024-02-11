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
        <link rel="stylesheet" href="{{asset('css/viewproduct.css')}}">
        <link rel="stylesheet" href="{{asset('css/header.css')}}">
        <link href="{{asset('img/medyo final na logo 2.png')}}" rel="icon" type="image/x-icon">
    </head>
        <body>
        
        <div class="container-fluid mainContent">
        @include('header2')
            <div class="container-fluid h-100" id="content">
                <div class="row">
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
                    <div class="col-md">
                        <h1 class="p-4" style="font-family: 'Sahitya';" id="productname">
                            {{$product->name}}
                        </h1>
                        <p class="short_desc">{{$product->description}}</span><br>
                        <span class="likes"> {{$product->user->first_name}} - 0 likes</span>
                        <div class="d-flex justify-content-center">
                            <a href="{{route('add_like',$product->id)}}">
                                <button id="heartBtn"><span class="fa fa-heart"></span></span></button>
                            </a>

                            <a href="#">
                                <button id="shoppingbtn"> <span class="fa fa-shopping-cart"></span> Add to Cart</button>
                            </a>

                            <a href="{{route('checkout-item')}}">
                                <button id="shoppingbtn">Buy Now</button>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-6" style="height: 100vmin;">
                        <div class="mh-100 container mt-5 mb-auto me-auto ms-auto" class="model">
                            <img src="https://placehold.co/600x400?text=Placeholder" alt="product image" class="img-fluid" style="max-height: 90vh; width: 100%;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
