<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('img/medyo final na logo 1.png')}}" rel="icon" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <title>Edit Product</title>
    <style>

        * {
            font-family: 'Sahitya', sans-serif;
        }

        body {
            background-color: #EEF6FF;
        }

        </style>
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

    <div class="container" style="width: 600px; border: solid 3px; padding:5px; background-color: white; box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.5);">
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
            <div class="d-flex">
                <div class="container">
                    <label for="product_name" class="m-1">Product Name:</label>
                    <input class="m-1 form-control" type="text" name="product_name" required value="{{$product->name}}">
                </div>

                <div class="container">
                    <label for="product_price" class="m-1">Price:</label>
                    <input class="m-1 form-control" type="text" name="product_price" required value="{{$product->price}}">
                </div>
            </div>

            <div class="d-flex flex-column">
                <label for="product_description" class="m-1">Description:</label>
                <textarea class="m-1 form-control" style="resize: none;" cols="10" rows="5" type="text" name="product_description" required value="{{$product->description}}"> </textarea>
            </div>
            
            <div class="d-flex">

                <div class="container">
                    <label for="product_category" class="m-1">Category:</label>
                    <select class="form-select m-1" name="product_category" required>
                        <option value="none"> </option>
                        <option value="Supply" title="Binders, Pens, Papers, Yellow Pad Paper, Rulers, Calculator,etc">Academic Supply</option>
                        <option value="Materials" title="Textbooks, Reviewers">Study Materials</option>
                        <option value="Electronics" title="Laptop, Tablet, Storage Drivers, Digital Products">Electronics and Gadgets</option>
                        <option value="Uniform" title="PE Uniform, Jogging Pants, RSO Uniform, University Uniform">Clothing</option>
                        <option value="Others">Others</option>
                    </select>
                </div>

                <div class="container">
                    <label for="product_quantity" class="m-1">Quantity:</label>
                    <input class="m-1 form-control" type="text" name="product_quantity" placeholder="Quantity" required value="{{$product->quantity}}">
                </div>
            </div>
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