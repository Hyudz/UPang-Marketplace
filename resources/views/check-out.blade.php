<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/header.css')}}">
    <script src="https://kit.fontawesome.com/de52212229.js" crossorigin="anonymous"></script>
    <link href="{{asset('img/medyo final na logo 1.png')}}" rel="icon" type="image/x-icon">
    <title>Checkout Item</title>
    <style>
        body {
            background-color: #EEF6FF;
        }

        #submitBtn {
            background-color: #4CAF50;
            color: white;
            padding: 15px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            border-radius: 12px;
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center vh-100">

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

    <div class="container" style="width: 900px; border: solid 3px; border-radius: 30px; background-color: white; box-shadow: 30px;">
        <div class="container mt-3">
            <div class="d-flex header">
                <a href="{{ route('viewproduct', $product->id) }}" class="btn btn-secondary"> <i class="fa fa-arrow-left"></i> </a>
                <div class="d-flex justify-content-center w-100">
                    <h3 class="d-flex justify-content-center">Order Summary</h3>
                </div>
            </div>
        </div>


        <div class="container-fluid p-5">
            <div class="row">
                <div class="card col" style="width: 18rem;">
                    <div class="card-header">
                        <h3>Product Details</h3>
                    </div>
                    <img src="{{asset('uploads/products/'.$product->image)}}" class="card-img-top" style="width: 10vmax;" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$product->name}}</h5>
                        <span class="card-text">₱{{$product->price}}.00</span>
                        <span class="card-text ms-5">x{{$product->quantity}}</span>
                    </div>
                </div>

                <div class="col">
                    <h6>Seller:</h6>
                    <h5>{{$seller->first_name}} {{$seller->last_name}}</h5>
                    <h6>{{$seller->email}}</h6>

                    <div class="mt-5"></div>
                    <hr>
                    <div class="mt-5"></div>

                    <h6>Sold to:</h6>
                    <h5>{{$buyer->first_name}} {{$buyer->last_name}}</h5>
                    <h6>{{$buyer->email}}</h6>
                </div>

                <div class="col">
                    <div>
                        <form action = "{{route('purchased',$product->id)}}" method="post">
                            @csrf
                            <h6>Payment Method</h6>
                            <div class="d-flex">
                                <input type="radio" name="payment" id="cod" class="d-flex" value="paypal" required>
                                <label for="cod" class="ms-3">Cash on Delivery</label>
                            </div>

                            <!-- <div class="mb-5"></div> -->
                            <h6 class="mt-3">Message <span class="ms-1" style="color: #999;">optional</span> </h6>
                            <div class="d-flex">
                                <textarea class="form-control" style="resize: none;" name="message" id="message" cols="10" rows="5" class="w-100"></textarea>
                            </div>
                                <input type="hidden" value="{{$product->id}}">
                                <button type="submit" id="submitBtn">Place order</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    
</body>
</html>