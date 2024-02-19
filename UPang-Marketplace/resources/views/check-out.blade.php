<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/header.css')}}">
    <script src="https://kit.fontawesome.com/de52212229.js" crossorigin="anonymous"></script>
    <link href="{{asset('img/medyo final na logo 2.png')}}" rel="icon" type="image/x-icon">
    <title>Document</title>
</head>
<body>

    <div class="container mt-5">
        <div class="container mt-5">
            <div class="header">
                <h3>Order Summary</h3>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="card col" style="width: 18rem;">
                    <div class="card-header">
                        <h3>Product Details</h3>
                    </div>
                    <img src="{{asset('img/medyo final na logo 2.png')}}" class="card-img-top" style="width: 10vmax;" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$product->name}}</h5>
                        <p class="card-text">{{$product->price}}</p>
                        <p class="card-text">x{{$product->quantity}}</p>
                    </div>
                </div>

                <div class="col">

                        <h6>Payment Method</h6>
                        <div class="d-flex">
                            <input type="radio" name="payment" id="gcash"value="gcash">
                            <label for="gcash" class="ms-3">GCash</label>
                        </div>
                        <div class="d-flex">
                            <input type="radio" name="payment" id="paypal" class="d-flex" value="paypal">
                            <label for="paypal" class="ms-3">Paypal</label>
                        </div>

                        <div class="mt-5"></div>
                        <h5>{{$buyer->first_name}} {{$buyer->last_name}}</h5>
                        <h6>{{$buyer->email}}</h6>

                </div>

                <div class="col">
                    <form action = "{{route('purchased',$product->id)}}" method="post">
                        @csrf
                        <input type="hidden" value="{{$product->id}}">
                        <button type="submit" >Place order</button>
                    </form>
                </div>
            </div>
        </div>

    
</body>
</html>