<!-- this page contains the details of the product -->

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
    <title>Saved Items</title>
    <style>
        body {
            overflow: hidden;
        }
    </style>
</head>
<body style="background-color: #EEF6FF;">
        @include('header2')

    <div class="container mt-5" style="background-color: white; border-radius: 30px; overflow-y: auto; max-height: 500px;">
        <div class="mt-3"></div>
        @if($products->isEmpty())
            <h1 class="text-center">No items in cart</h1>
        @endif
        <div class="mt-3"></div>
        @foreach($products as $product)
            <hr>
            <div class="row align-items-start mb-3">
                <img src="{{asset('uploads/products/'.$product->image)}}" alt="product image" style="height: 150px; width: 200px;">
            <div class="col" id="item">
                <p>Item:</p>
                <p>{{$product->name}}</p>
            </div>
            <div class="col" id="price">
                <p>Price:</p>
                <p>{{$product->price}}</p>
            </div>
            <div class="col" id="quantity">
                <p>Quantity</p>
                <div class="d-flex">
                    <p>{{$product->quantity}}</p> 
                </div>
            </div>
            <div class="col">
                Actions
                <div class="d-flex">
                    <a href="{{route('viewproduct', $product->id)}}" class="btn btn-primary">View</a>
                    <a href="{{route('checkout-item', $product->id)}}" class="btn btn-success">Checkout</a>
                    <form action="{{route('delete_item', $product->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <button type="submit" class="btn btn-danger">Remove</button>
                    </form>
                </div>
            </div>
            <hr>
        </div>
        @endforeach
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>