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

<div class="navbar navbar-dark bg-secondary">
    <a class="navbar-brand" style="margin-left:20px;" href="#">
        Home Page
    </a>
    <div class="dropdown" style="margin-right:50px;">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        {{ $data->name ?? 'None' }} 
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a style="margin:20px;" href="edituser">Edit Profile</a></li>
            <li><a style="margin:20px;" href="logout">Logout</a></li>
        </ul>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="col-md-4 col-md-offset-4" style="margin-top:20px;">
                <h4>Welcome {{ $data->name ?? 'None' }}!</h4>
                <hr>

                <div class="form-group">
                    <label for="name">Full Name</label><br>
                    <input type="text" class="form-control" name="name" value="{{ $data->name ?? 'None' }}" disabled>
                </div><br>

                <div class="form-group">
                    <label for="name">Email</label><br>
                    <input type="text" class="form-control" name="name" value="{{ $data->email ?? 'None' }}" disabled>
                </div><br>

                <!-- <div class="formgroup">
                    <a href="edituser"><button class="btn btn-block btn-warning">Edit Profile</button></a>
                </div> -->
            </div>
        </div>
    </div>
</div>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</body>

</html>