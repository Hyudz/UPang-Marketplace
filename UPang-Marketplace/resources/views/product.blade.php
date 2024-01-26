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
        <div class="d-block bg-primary">
            <div class="container-fluid mt-3 row">
                @include('header2')
            </div>

            <div class="navbar container-fluid row">
                <div class="col">
                    <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-bars"></i>
                    </button>

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
        </div>

        <!-- Place the h1 below both the navbar and the sidebar -->
        <div class="container-fluid mt-5" style="padding-left: 260px;">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="..." alt="product image">
                <div class="card-body">
                    <h5 class="card-title" id="product1">Product Name</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos aliquid sit, ipsum obcaecati sed numquam ea quis iste nulla eum aut maiores reprehenderit quia tempora veniam. Inventore asperiores veritatis eveniet.</p>
                    <a href="{{route('viewproduct')}}" class="btn btn-primary">View</a>
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
