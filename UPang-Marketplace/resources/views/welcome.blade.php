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
        <link rel="stylesheet" href="{{asset('css/landing.css')}}">
        <link rel="stylesheet" href="{{asset('css/header.css')}}">
    </head>
        <body>
        
        <div class="container-fluid mt-3">
            @include('header')
            <div class="container-fluid">
                <div class="row">
                    <div class="container-fluid col">
                        <h1 class="mt-5 fs-1 p-5" style="font-family: 'Sahitya';">
                            Welcome to PHINMA-UPang Marketplace
                        </h1>

                        <div class="container mt-5 me-5 mb-5 d-inline">
                            <a href="{{route('products')}}">
                            <button style="border-radius: 60px; padding: 1%; display: flex; align-items: center;">
                                <div class="indicator col">Start shopping</div>
                                    <div style="border: 2px solid; border-radius:50%; width: 32px; height: 32px; margin-left: 10px;  transform: rotate(300deg);" class="icon container">
                                        <i class="fa-regular fa-hand-pointer" style="margin-left: -3px; margin-top:7px;"></i>
                                    </div>
                            </button>
                            </a>
                        </div>
                    </div>

                    <div class="container-fluid d-inline col" style=" height: 100%; width: 50%; position: absolute; top:10%; left: 50%;">
                        <div class="mh-100" style="height: 665px;">
                            <img src="{{asset('img/girl.png')}}" alt="none" style="height: 90vmin;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="node_modules/bootstrap/scss/bootstrap.scss"></script>
        <script>
            function script1(){
                window.alert("Hello World!");
            }
        </script>
    </body>
</html>
