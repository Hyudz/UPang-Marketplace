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
    <div class="container-fluid">
            @include('header2')
    </div>

    <div class="container mt-5">
        <div class="container mt-5">
            <div class="header">
                <h1>Checkout</h1>
            </div>
        </div>
    </div>

    <h1>Payment Details here</h1>
    <a href="{{route('purchase')}}">Place Order</a>
</body>
</html>