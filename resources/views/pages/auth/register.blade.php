<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registration</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container  mt-3">
        <h2>Registration</h2>
        <div class="col-sm-6">
            <div class="row">
                <div class="card">
                    <form action="{{ route('StoreRegistration') }}" method="post">
                        @csrf
                        <div class="mb-3 mt-3">
                            <label for="name">Name:</label>
                            <input type="name" class="form-control" id="name" placeholder="Enter name"
                                name="name">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter email"
                                name="email">
                        </div>
                        <div class="mb-3">
                            <label for="pwd">Password:</label>
                            <input type="password" class="form-control" id="pwd" placeholder="Enter password"
                                name="pswd">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <div class="form-check mb-3">
                            <p><a href="{{route('login')}}">Login</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
