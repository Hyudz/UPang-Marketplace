<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('img/medyo final na logo 2.png')}}" rel="icon" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('css/sell.css')}}">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
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

    <div class="container" style="width: 600px;">
        <form action="{{route('sell.product')}}" method="POST">
            @csrf
            <input type="text" name="product_name" placeholder="Product Name">
            <input type="text" name="product_price" placeholder="Price">
            <input type="text" name="product_description" placeholder="Description">
            <input type="text" name="product_category" placeholder="Category">
            <input type="text" name="product_quantity" placeholder="Quanitity">
            <select name="department">
                <option value="1">CITE</option>
                <option value="2">CCJS</option>
                <option value="3">CAHS</option>
                <option value="4">CEA</option>
                <option value="5">CMA</option>
            </select>
            <button type="submit">Upload</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>