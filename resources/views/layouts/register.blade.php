<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Register form</h2>
                <hr>
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                @if($errors->any()) 
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="" method="post">
                    @csrf
                    <div class="form-group mb-2">
                        <input type="text" placeholder="username" class="form-control" name="username">
                    </div>
                    <div class="form-group mb-2">
                        <input type="text" placeholder="password" class="form-control" name="password">
                    </div>
                    <div class="form-group mb-2">
                        <input type="text" placeholder="email" class="form-control" name="email">
                    </div>
                    <div class="form-group mb-2">
                        <button type="submit">
                            Register
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
