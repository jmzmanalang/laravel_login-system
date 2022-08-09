<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-sacle=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Page</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

<nav class="navbar navbar-dark bg-secondary">
    <a class="navbar-brand" style="margin-left:20px;" href="dashboard">
        Home Page
    </a>
    <div class="dropdown">
        <a style="margin-right:20px; color:white;" href="logout" class="nav-link">Logout</a>
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="col-md-4 col-md-offset-4" style="margin-top:20px;">
                <h4>Edit User Profile</h4>
                <hr>
                <form action="{{ route('updateuser') }}" method="post">
                    @if(Session::has('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                    @if(Session::has('fail'))
                        <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                    @endif
                    @csrf
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" class="form-control" placeholder="Enter Full Name" name="name" value="{{ $data->name ?? 'None' }}">
                        <span class="text-danger">@error('name') {{ $message }} @enderror</span>
                    </div><br>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" placeholder="Enter Email" name="email" value="{{ $data->email ?? 'None' }}">
                        <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                    </div><br>
                    <div class="formgroup">
                        <button class="btn btn-block btn-primary" type="submit">Confirm Changes</button>
                    </div><br>
                </form>
                <div class="formgroup">
                    <a href="deleteuser"><button class="btn btn-block btn-danger">Delete Account</button></a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</body>

</html>