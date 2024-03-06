<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('img/medyo final na logo 1.png')}}" rel="icon" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('css/sell.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Edit Product</title>
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
    <!-- <div class="min-vh-100 d-flex justify-content-center">

        <div class="container" style="width: 600px; border: solid 3px; padding:5px; border-radius: 30px; background-color: white;   ">
        <form action="{{route('update_product',$product->id)}}" method="POST">
            @csrf
            <input type="text" name="product_name" value="{{$product->name}}">
            <input type="text" name="product_price" value="{{$product->price}}">
            <input type="text" name="product_description" value="{{$product->description}}">
            <input type="text" name="product_category" placeholder="Category">
            <input type="text" name="product_quantity" value="{{$product->quantity}}">
            <button type="submit">Update</button>
        </form>
        </div>
    </div> -->

    <div class="container" style="width: 600px; border: solid 3px; padding:5px; border-radius: 30px; background-color: white;   ">
        <div class="card-header d-flex justify-content-center">
            <h3>Update Item</h3>
        </div>

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
        
        <form action="{{route('update_product',$product->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input class="mt-2" type="text" name="product_name" required value="{{$product->name}}">
            <input class="mt-2" type="text" name="product_price" required value="{{$product->price}}">
            <input class="mt-2" type="text" name="product_description" required value="{{$product->description}}">
            <select class="form-select mt-2" name="product_category" required>
                <option value="none">Category</option>
                <option value="Supply" title="Binders, Pens, Papers, Yellow Pad Paper, Rulers, Calculator,etc">Academic Supply</option>
                <option value="Materials" title="Textbooks, Reviewers">Study Materials</option>
                <option value="Electronics" title="Laptop, Tablet, Storage Drivers, Digital Products">Electronics and Gadgets</option>
                <option value="Uniform" title="PE Uniform, Jogging Pants, RSO Uniform, University Uniform">Clothing</option>
                <option value="Others">Others</option>
            </select>
            <input class="mt-2" type="text" name="product_quantity" required value="{{$product->quantity}}">
            <div class="container-fluid d-flex justify-content-center">
                <a href="{{route('homepage')}}" class="btn btn-outline-warning mt-2 me-2"> <b>Cancel<b></a>
                <button class="mt-2 btn btn-success" type="submit">Update</button>
            </div>
        </form> 
        
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>