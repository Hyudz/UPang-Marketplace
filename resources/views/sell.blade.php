<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('img/logowithoutbg.png')}}" rel="icon" type="image/x-icon">
    <title>Sell Item</title>
    <style>

        * {
            font-family: 'Sahitya', sans-serif;
        }

        
    </style>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex align-items-center justify-content-center min-vh-100" style="background-color: #EEF6FF;">

    <div class="container" style="width: 600px; box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.5); padding:5px; border-radius: 30px; background-color: white;   ">
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
            <div class="d-flex">
                <input class="m-1 form-control" type="text" name="product_name" required placeholder="Product Name">
                <input class="m-1 form-control" type="number" name="product_price" required placeholder="Price" min="1">
            </div>

            <div class="d-flex">
                <textarea class="m-1 form-control" type="text" required name="product_description" style="resize: none;" cols="10" rows="5" placeholder="Description"></textarea>
            </div>

            <div class="d-flex">
                <select class="form-select m-1" name="product_category" required>
                    <option value="none">Category</option>
                    <option value="Supply" title="Binders, Pens, Papers, Yellow Pad Paper, Rulers, Calculator,etc">Academic Supply</option>
                    <option value="Materials" title="Textbooks, Reviewers">Study Materials</option>
                    <option value="Electronics" title="Laptop, Tablet, Storage Drivers, Digital Products">Electronics and Gadgets</option>
                    <option value="Uniform" title="PE Uniform, Jogging Pants, RSO Uniform, University Uniform">Clothing</option>
                    <option value="Others">Others</option>
                </select>
                <input class="m-1 form-control" type="number" name="product_quantity" placeholder="Quanitity" required min="1">
                <input class="m-1 form-control" type="file" name="product_image" required>
            </div>
            <div class="container-fluid d-flex justify-content-center">
                <span style="font-size: 12px;">Before the product can be viewed and purchased on the website, it will undergo review by the admin for approval.</span>
            </div>
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