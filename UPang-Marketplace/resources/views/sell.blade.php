<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('img/medyo final na logo 2.png')}}" rel="icon" type="image/x-icon">
    <title>Document</title>
</head>
<body>
<div class="mt-5">
            @if($errors->any())
                <div class="col-12">
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">{{$error}}</div>
                    @endforeach
                </div>
            </div>
            @endif

            @if(session()->has('error'))
                <div class="alert alert-danger">{{session('error')}}</div>
            @endif

            @if(session()->has('success'))
                <div class="alert alert-success">{{session('success')}}</div>
            @endif
        </div>
    <div>
        <form action="{{route('sell.product')}}" method="POST">
            @csrf
            <input type="text" name="product_name" placeholder="Product Name">
            <input type="text" name="product_price" placeholder="Price">
            <input type="text" name="product_description" placeholder="Description">
            <input type="text" name="product_category" placeholder="Category">
            <input type="text" name="product_quantity" placeholder="Quanitity">
            <button type="submit">Upload</button>
        </form>
    </div>
</body>
</html>