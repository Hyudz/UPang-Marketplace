<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketplace</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
    <script src="https://kit.fontawesome.com/de52212229.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<!--     <link rel="stylesheet" href="{{asset('css/header.css')}}"> -->
    <link rel="icon" href="{{asset('img/medyo final na logo 1.png')}}" type="image/x-icon">
</head>
<body>
    @include('header')
    <div class="container-fluid">
        <h1 class="mt-5">Products on Sale!</h1>
        <div class="container-fluid">
            <div class="row w-auto">
                @foreach($products as $product)
                <div class="col">
                    <a href="{{route('preview', $product->id)}}">
                        <div class="card mt-5" style="width: 18rem;">
                            <img class="card-img-top" style="height: 200px; padding: 10px;" src="{{asset('uploads/products/'.$product->image)}}" alt="product image">
                            <div class="card-body">
                                <h5 class="card-title" id="product1">{{$product->name}}</h5>
                                <p class="card-text" style="text-align: justify;">{{$product->price}}</p>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
