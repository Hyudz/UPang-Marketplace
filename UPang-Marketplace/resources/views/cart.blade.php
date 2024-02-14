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
    <link href="{{asset('img/medyo final na logo 2.png')}}" rel="icon" type="image/x-icon">
    <title>Saved Items</title>
</head>
<body>
    <div class="container-fluid">
        @include('header2')
    </div>

    <div class="container">
        @foreach($products as $product)
        <div class="row align-items-start mb-3" style="border: solid 1px;">
            <div class="col" id="item_image">
                <img src="https://placehold.co/120x80?text=Placeholder" alt="product image">
            </div>
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
                    <button type="button" style="width: 20px; height: 30px;" class="me-2 ms-2">-</button> 
                    <p>{{$product->quantity}}</p> 
                    <button type="button" style="width: 20px; height: 30px;" class="me-2 ms-2">+</button>
                </div>
            </div>
            <div class="col">
                Delete
            </div>
        </div>
        @endforeach
    </div>
</body>
</html>