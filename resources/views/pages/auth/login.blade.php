<!DOCTYPE html>
<html lang="en">

<head>
    <title>User Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container  mt-3 ">
        <h2>User Login</h2>
        <div class="col-sm-6">
            <div class="row">
                <div class="card">
                    @if ($message = Session::get('username'))
                    <div class=" mt-5 alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ $message }}</strong>
                        <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                    <form action="{{route('Login')}}" method="post">
                        @csrf
                        <div class="mb-3 mt-3">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="username" placeholder="Enter email" name="username">
                        </div>
                        <div class="mb-3">
                            <label for="pwd">Password:</label>
                            <input type="password" class="form-control" name="userpassword" id="userpassword" placeholder="Enter password">
                        </div>
                        <button type="submit" class="btn btn-primary mb-3">Submit</button>
                        <div class="form-check mb-3">
                            <p><a href="{{route('createRegistration')}}">Registration</a></p>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</body>

</html>
