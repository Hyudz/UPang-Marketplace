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
        <link href="{{asset('img/medyo final na logo 2.png')}}" rel="icon" type="image/x-icon">
    </head>
        <body>
        
        <div class="container-fluid mainContent">
        @include('header2')
            <div class="container-fluid h-100" id="content">
                <div class="row">
                    <div class="col-md">
                        <h1 class="p-4" style="font-family: 'Sahitya';" id="firstHeading">
                            Welcome to PHINMA-UPang Marketplace
                        </h1>
                        <div class="mt-5 me-5 mb-5 d-inline">
                            <a href="{{route('products')}}">
                                <button id="shoppingbtn">
                                    <div class="indicator col">Start shopping</div>
                                    <div class="icon-container">
                                        <i class="fa-regular fa-hand-pointer" style="margin-left: -3px; margin-top:7px;"></i>
                                    </div>
                                </button>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mh-100" style="height: 100%;" class="model">
                            <img src="{{asset('img/girl.png')}}" alt="none" class="img-fluid" style="max-height: 90vh; width: 100%;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
