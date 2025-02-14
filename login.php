<?php
require_once __DIR__ . '/db_connect.php';

session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: contacts.php");
    exit();
}

$error_msg = '';
if (isset($_POST['submit'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    // Preparazione della query SQL
    $stmt = $connect->prepare("SELECT * FROM `users` WHERE `email` = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        if (password_verify($password, $result['password'])) {
            $_SESSION['user_id'] = $result['id'];
            header("Location: contacts.php");
            exit();
        } else {
            $error_msg = "Incorrect email or password";
        }
    } else {
        $error_msg = "Incorrect email or password (fuori)";
    }
    $connect = null;
}

?>

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
        <div class="row justify-content-center bg-warning-subtle">
            <div class="col-12 col-md-6 " id="signupWrapper">
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="signupForm rounded shadow p-5 pb-2 bg-white">
                    <!-- <?php if (isset($error_msg)): ?>
                        <div class="alert alert-danger"><?php echo $error_msg; ?></div>
                    <?php endif; ?> -->
                    <h1>Sign in</h1>
                    <div class="mb-3 form-group">
                        <label for="email" class="form-label">Email</label>
                        <input class="form-control" type="email" required name="email">
                    </div>
                    <div class="mb-3 form-group">
                        <label for="" class="form-label">Password</label>
                        <input class="form-control" type="password" required name="password">
                    </div>
                    <?php echo "<p class='text-danger'> $error_msg</p>" ?>
                    <div class="pt-3 text-center form-group">
                        <button type="submit" name="submit" class="btn btn-warning">Sign in</button>
                    </div>
                    <p class="pt-3 text-end">Don't have an account yet? <a href="register.php">Register</a></p>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>