<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            background-color: #282828;
        }

        .scrollable-table-container {
        max-height: 350px;
        overflow-y: auto;
        }
    </style>
    <script src="https://kit.fontawesome.com/de52212229.js" crossorigin="anonymous"></script>
    <link href="{{asset('img/medyo final na logo 1.png')}}" rel="icon" type="image/x-icon">
</head>
<body>
    <div>
        <a href="{{route('logout')}}">
            <button type="Submit" class="btn btn-primary">
                <i class="fa fa-sign-out"></i>Logout
            </button>
        </a>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12 scrollable-table-container">
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th colspan="8">
                            Products Approval
                            </th>
                        </tr>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Availability</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->quantity}}</td>
                            <td>{{$product->availability}}</td>
                            <td>
                                <div class="d-flex">
                                <form action="{{route('approve_product', $product->id)}}" method="POST" class="me-3">
                                    @csrf
                                    <button class="btn btn-success">
                                        <i class="fa fa-check"></i>
                                    </button>
                                </form>
                                
                                <form action="{{route('decline_product', $product->id)}}" method="POST">
                                    @csrf
                                    <button class="btn btn-danger">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </form>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="8" class="d-none">
                                <form action="" method="POST">
                                    <input type="text" placeholder="Enter your reason for decline:">
                                        <button type="button" class="btn btn-secondary">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>

                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12 scrollable-table-container">
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <!-- Include the total products here -->
                            <th colspan="7">
                            All Products
                            </th>
                        </tr>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Availability</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($all_products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->quantity}}</td>
                            <td>{{$product->availability}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row mt-5" style="height: 200px;">
            <div class="col mb-3 me-3 scrollable-table-container">
                <div class="d-flex justify-content-center">
                    <h3 style="color:white;">Users</h3>
                </div>
                <table class="table">
                    <tr>
                        <td>All Users</td>
                        <td>{{ $users->count()}}</td>
                    </tr>
                    <tr>
                        <td>Buyers</td>
                        <td>{{ $users->where('user_type', 'buyer')->count()}}</td>
                    </tr>
                    <tr>
                        <td>Sellers</td>
                        <td>{{ $users->where('user_type', 'seller')->count()}}</td>
                    </tr>
                    <tr>
                        <td>Male</td>
                        <td>{{ $users->where('gender', 'male')->count()}}</td>
                    </tr>
                    <tr>
                        <td>Female</td>
                        <td>{{ $users->where('gender', 'female')->count()}}</td>
                    </tr>
                </table>
            </div>

            <div class="col mb-3 me-3 scrollable-table-container">
                <div class="d-flex justify-content-center">
                    <h3 style="color:white;">Products</h3>
                </div>
                <div class="container">
                    <table class="table">
                        <tr>
                            <td>All Products</td>
                            <td>{{ $product->count()}}</td>
                        </tr>
                        <tr>
                            <td>Approved Products</td>
                            <td>{{ $product->where('availability', 'approved')->count()}}</td>
                        </tr>
                        <tr>
                            <td>To be Shipped Products</td>
                            <td>{{ $historyStatus->where('status', 'to ship')->count()}}</td>
                        </tr>
                        <tr>
                            <td>Declined Products</td>
                            <td>{{ $product->where('availability', 'declined')->count()}}</td>
                        </tr>
                        <tr>
                            <td>Sold Products</td>
                            <td>{{ $product->where('availability', 'sold')->count()}}</td>
                        </tr>
                        <tr>
                            <td>Cancelled Orders</td>
                            <td>{{ $historyStatus->where('status', 'cancelled')->count()}}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="col me-3 scrollable-table-container">
                <form action="" method="POST">
                    @csrf
                    <input type="text" name="name" class="form-control" placeholder="Search User">
                </form>

                <div class="container mt-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Usertype</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            @if($user->user_type != 'admin')
                            
                            <tr>
                                <td>{{$user->id}}</td>
                                <td> <a href="{{route('viewprofile', $user->id)}}"> {{$user->first_name}} {{$user->last_name}} </a></td>
                                <td>{{$user->user_type}}</td>
                            </tr>
                            @endif
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>