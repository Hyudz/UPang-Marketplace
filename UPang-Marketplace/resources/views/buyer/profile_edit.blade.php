<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <title>Marketplace</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{{asset('img/medyo final na logo 1.png')}}" rel="icon" type="image/x-icon">
    <script src="https://kit.fontawesome.com/de52212229.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('css/header.css')}}">
</head>
<body>
    @include('header2')
    <div class="container mt-5">
    <!-- Filter Tabs -->
    <ul class="nav nav-pills mb-3">
        <li class="nav-item">
            <a class="nav-link active" id="all-tab" data-toggle="pill" href="#all">All</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="to-receive-tab" data-toggle="pill" href="#to-receive">To Receive</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="cancelled-tab" data-toggle="pill" href="#cancelled">Cancelled</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="settled-tab" data-toggle="pill" href="#settled">Settled</a>
        </li>
    </ul>

    <!-- Tab Content -->
    <div class="tab-content">
        <div class="tab-pane fade show active" id="all">
            <table class="table">
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Status</th>
                </tr>
                <tr>
                    <td>Product 1</td>
                    <td>₱100.00</td>
                    <td>Cancelled</td>
                </tr>
                <tr>
                    <td>Product 2</td>
                    <td>₱200.00</td>
                    <td>To Receive</td>
                </tr>
                <tr>
                    <td>Product 3</td>
                    <td>₱300.00</td>
                    <td>Settled</td>
                </tr>
            </table>
        </div>
        <div class="tab-pane fade" id="to-receive">
        <table class="table">
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Status</th>
                </tr>
                <tr>
                    <td>Product 1</td>
                    <td>₱100.00</td>
                    <td>Cancelled</td>
                </tr>
                <tr>
                    <td>Product 2</td>
                    <td>₱200.00</td>
                    <td>To Receive</td>
                </tr>
                <tr>
                    <td>Product 3</td>
                    <td>₱300.00</td>
                    <td>Settled</td>
                </tr>
            </table>
        </div>
        <div class="tab-pane fade" id="cancelled">
        <table class="table">
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Status</th>
                </tr>
                <tr>
                    <td>Product 1</td>
                    <td>₱100.00</td>
                    <td>Cancelled</td>
                </tr>
                <tr>
                    <td>Product 2</td>
                    <td>₱200.00</td>
                    <td>To Receive</td>
                </tr>
                <tr>
                    <td>Product 3</td>
                    <td>₱300.00</td>
                    <td>Settled</td>
                </tr>
            </table>
        </div>
        <div class="tab-pane fade" id="settled">
        <table class="table">
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Status</th>
                </tr>
                <tr>
                    <td>Product 1</td>
                    <td>₱100.00</td>
                    <td>Cancelled</td>
                </tr>
                <tr>
                    <td>Product 2</td>
                    <td>₱200.00</td>
                    <td>To Receive</td>
                </tr>
                <tr>
                    <td>Product 3</td>
                    <td>₱300.00</td>
                    <td>Settled</td>
                </tr>
            </table>
        </div>
    </div>
</div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>