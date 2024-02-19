<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('img/medyo final na logo 2.png')}}" rel="icon" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Forgot Password</title>
</head>
<body>
<div class="container d-flex align-items-center justify-content-center min-vh-100">
    <div class="card" style="width: 30rem;">
        <div class="card-header d-flex justify-content-center">
            <img src="{{asset('img/medyo final na logo 2.png')}}" style="height: 10vmin;" alt="logo" loading="lazy"/>
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

        <div class="card-body">
            <form method="POST" action="{{route('admin.login')}}">
                @csrf
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control">

                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control">

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-secondary mt-3 ">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>