<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('img/medyo final na logo 1.png')}}" rel="icon" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('css/sell.css')}}">
    <title>Sell Item</title>
    <style>
        body {
            background-color: #EEF6FF;
        }
    </style>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex align-items-center justify-content-center min-vh-100">

    <div class="container" style="width: 600px; border: solid 3px; padding:5px; border-radius: 30px; background-color: white;   ">
        <div class="card-header d-flex justify-content-center">
            <h3>Sell Item</h3>
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
        
        <form action="{{route('sell.product')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input class="mt-2" type="text" name="product_name" placeholder="Product Name">
            <input class="mt-2" type="text" name="product_price" placeholder="Price">
            <input class="mt-2" type="text" name="product_description" placeholder="Description">
            <!-- <input class="mt-2" type="text" name="product_category" placeholder="Category"> -->
            <select class="form-select mt-2" name="product_category" required>
                <option value="none">Category</option>
                <option value="Supply" title="Binders, Pens, Papers, Yellow Pad Paper, Rulers, Calculator,etc">Academic Supply</option>
                <option value="Materials" title="Textbooks, Reviewers">Study Materials</option>
                <option value="Electronics" title="Laptop, Tablet, Storage Drivers, Digital Products">Electronics and Gadgets</option>
                <option value="Uniform" title="PE Uniform, Jogging Pants, RSO Uniform, University Uniform">Clothing</option>
                <option value="Others">Others</option>
            </select>
            <input class="mt-2" type="text" name="product_quantity" placeholder="Quanitity">
            <!-- <select name="department">
                <option value="1">CITE</option>
                <option value="2">CCJS</option>
                <option value="3">CAHS</option>
                <option value="4">CEA</option>
                <option value="5">CMA</option>
            </select> -->
            <input class="mt-2" type="file" name="product_image" required>
            <div class="container-fluid d-flex justify-content-center">
                <a href="{{route('homepage')}}" class="btn btn-outline-warning mt-2 me-2"> <b>Cancel Upload <b></a>
                <button class="mt-2 btn btn-success" type="submit">Upload</button>
            </div>
        </form> 
        
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>