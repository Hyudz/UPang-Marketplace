<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('img/logowithoutbg.png')}}" rel="icon" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Forgot Password</title>
</head>
<body>
<div class="container d-flex align-items-center justify-content-center min-vh-100">
    <div class="card" style="width: 30rem;">
        <div class="card-header">
            <h3>Forgot Password</h3>
        </div>

        <div class="card-body">
            <form>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control">

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-secondary mt-3 ">Submit</button>
                </div>
            </form>
        </div>

        <div class="card-footer d-flex justify-content-center">
            <a href="{{route('login')}}">Back to Login</a>
        </div>
    </div>
</div>

</body>
</html>

