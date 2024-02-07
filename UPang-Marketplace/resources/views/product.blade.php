<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/header.css')}}">
    <link rel="stylesheet" href="{{asset('css/products.css')}}">
    <link href="{{asset('img/medyo final na logo 2.png')}}" rel="icon" type="image/x-icon">
    
    <script src="https://kit.fontawesome.com/de52212229.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div class="container-fluid">
        <div class="d-block">
            <div class="container-fluid row fixed-top">
                @include('header2')
            </div>

            <div class="navbar container-fluid row">
                <div class="col">
                    <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse">
                        <div class="position-sticky">
                            <div class="list-group list-group-flush mx-3 mt-5">
                                <a href="#" onclick="change('cite')" class="list-group-item list-group-item-action py-2 ripple">
                                    <span id="cite">CITE</span>
                                </a>
                                <!-- CEA CCJE CAHS CELA CMA -->
                                <a href="#" onclick="change('ccje')" class="list-group-item list-group-item-action py-2 ripple">
                                    <span id="ccje">CCJE</span>
                                </a>

                                <a href="#" onclick="change('cahs')" class="list-group-item list-group-item-action py-2 ripple">
                                    <span id="cahs">CAHS</span>
                                </a>

                                <a href="#" onclick="change('cela')" class="list-group-item list-group-item-action py-2 ripple">
                                    <span id="cela">CELA</span>
                                </a>

                                <a href="#" onclick="change('cea')" class="list-group-item list-group-item-action py-2 ripple">
                                    <span id="cea">CEA</span>
                                </a>

                                <a href="#" onclick="change('cma')" class="list-group-item list-group-item-action py-2 ripple">
                                    <span id="cma">CMA</span>
                                </a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>

            <div class="container" style="padding-left: 150px;">
                <div class="row w-auto">

                    @foreach($products as $product)
                    <div class="col">
                        <a href="{{route('viewproduct', $product->id)}}">
                            <div class="card mt-5" style="width: 18rem;">
                                <img class="card-img-top" src="{{asset('products/placeholder.png')}}" alt="product image">
                                <div class="card-body">
                                    <h5 class="card-title" id="product1">{{$product->product_name}}</h5>
                                    <p class="card-text" style="text-align: justify;">₱{{$product->product_price}}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                    
                </div>
            </div>

        </div>
    </div>

    <script>
        function change(id){
            if (id == "cite") {
                document.getElementById("product1").innerHTML = "CITE";
            } else if (id == "ccje") {
                document.getElementById("product1").innerHTML = "CCJE";
            } else if (id == "cahs") {
                document.getElementById("product1").innerHTML = "CAHS";
            } else if (id == "cela") {
                document.getElementById("product1").innerHTML = "CELA";
            } else if (id == "cea") {
                document.getElementById("product1").innerHTML = "CEA";
            } else if (id == "cma") {
                document.getElementById("product1").innerHTML = "CMA";
            }
        }
    </script>
</body>
</html>
