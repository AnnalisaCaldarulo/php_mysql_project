<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign in</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container-fluid  vh-100">
        <div class="row justify-content-center bg-warning">
            <div class="col-12 col-md-6 " id="signupWrapper">
                <form action="#" method="post" class="signupForm rounded shadow p-5 pb-2 bg-white">
                    <h1>Sign in</h1>
                    <div class="mb-3 form-group">
                        <label for="email" class="form-label">Email</label>
                        <input class="form-control" type="email" required name="email">
                    </div>
                    <div class="mb-3 form-group">
                        <label for="" class="form-label">Password</label>
                        <input class="form-control" type="password" required name="password">
                    </div>
                    <div class="pt-3 text-center form-group">
                        <button type="submit" class="btn btn-warning">Sign in</button>
                    </div>
                    <p class="pt-3 text-end">Don't have an account yet? <a href="register.php">Register</a></p>
                </form>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>