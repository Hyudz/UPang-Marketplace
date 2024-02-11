<!-- this page contains the details of the product -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/header.css')}}">
    <link href="{{asset('img/medyo final na logo 2.png')}}" rel="icon" type="image/x-icon">
    <script src="https://kit.fontawesome.com/de52212229.js" crossorigin="anonymous"></script>
    <title>Likes</title>
</head>
<body>
    <div class="container-fluid">
        @include('header2')
    </div>
    
    
    <div class="container min-vh-100 ms-auto me-auto mt-auto mb-auto" style="overflow: auto;">
        <div class="container">
            <h1>Likes</h1>
        </div>
    
        <div class="container" style="padding-left: 150px;">
                <div class="row w-auto">
                    @foreach($likes as $like)
                    <div class="col">
                        <a href="{{route('viewproduct', $product->id)}}">
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
</body>
</html>