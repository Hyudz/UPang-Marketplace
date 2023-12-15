@extends('layout')
@section('content')
@section('title', 'Login')


<div class="container" style=" height: 100%; position: absolute; right: 0px; background: rgb(2,0,36); background: linear-gradient(90deg, rgba(2,0,36,0) 0%, rgba(255,255,255,0.5) 75%, rgba(255,255,255,0.7) 100%);">
</div>
<div class="container" style="width: 500px; position: absolute; right: 0px;">

    <img src='{{ asset("img/university_logo.default.png")}}' style="width: 50vmin;" class="mt-5"><br><br>
    <span class="m-auto" style="font-size:32px; font-family: 'Open Sans'; font-weight: bold; line-height: normal; text-align: center; background-color: red;"><u>LOG IN TO MARKETPLACE</u></span>
    <form class="ms-auto">
        <div class="mt-3">
            <label class="form-Label">EMAIL</label>
            <input type="email" class="form-control" required id="form-label">
        </div>

        <div class="mt-3">
            <label class="form-Label" style="font-weight: bold; font-family: 'Open Sans'">PASSWORD</label>
            <input type="password" class="form-control" required id="form-label">
        </div>

        <div class="mt-3">
            <button type="submit" class="btn" style="width: 100%; background-color: #0E7D44;"><span style="color: white;">LOGIN</span></button>
            <span style="cursor: pointer; font-family: 'Open Sans', sans-serif;">Forgot Password</span>
        </div>
    </form>
</div>



@endsection