<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Not Found</title>
    <link href="{{asset('img/medyo final na logo 1.png')}}" rel="icon" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        <div class="container d-flex align-items-center justify-content-center min-vh-100">
            <div>
                <div class="d-flex justify-content-center">
                    <img src="{{asset('img/sad.png')}}" class="img-fluid" alt="404"> 
                </div>   
                <h3 class="text-center">Oops, product not found</h3>
                <h6 class="text-center">The product you are looking for is no longer available</h6>
                <div class="container d-flex align-items-center justify-content-center">
                    <a href="{{route('product')}}" class="btn btn-secondary">Back to Home</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>