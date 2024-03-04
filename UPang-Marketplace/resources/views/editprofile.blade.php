<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('img/medyo final na logo 1.png')}}" rel="icon" type="image/x-icon">
    <title>Edit Profile</title>
</head>
<body>
    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="card" style="width: 30rem;">
            <div class="card-header">
                <h3>Edit Profile</h3>
            </div>

            <div class="card-body">
                <form>
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control">

                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control">

                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control">

                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" id="first_name" class="form-control">

                    <label for="last_name">Last Name</label>
                    <input type="text" name="last_name" id="last_name" class="form-control">

                    <label for="contact_number">Contact Number</label>
                    <input type="text" name="contact_number" id="contact_number" class="form-control">

                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" class="form-control">

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-secondary mt-3 ">Submit</button>
                    </div>
                </form>
            </div>

            <div class="card-footer d-flex justify-content-center">
                <a href="{{#}}">Back to Profile</a>
            </div>
        </div>
    </div>
</body>
</html>