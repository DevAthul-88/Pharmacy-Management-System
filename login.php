<?php
session_start();
require "connection/connection.php";
require "func/redirect.php";

$message = null;
$error = null;
if (isset($_GET["registered"])) {
    $message = "User successfully registered! Please login to your account";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $query = "SELECT * FROM admin WHERE email='$email' ";
    $result = mysqli_query($conn , $query);
    if (mysqli_num_rows($result)) {
        $user = $result->fetch_assoc();
        $checkPassword = password_verify($password , $user["password"]);
        if ($checkPassword == 0) {
            $error = "Incorrect Password";
        } else {
            $_SESSION["auth"] = "true";
            $_SESSION["email"] = $user["email"];
            $_SESSION["firstname"] = $user["firstname"];
            $_SESSION["lastname"] = $user["lastname"];
            $_SESSION["userId" ] = $user["id"];
            redirect("index.php");
        }
    } else {
        $error = "User not found";
    }


    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>MEDIC - Login</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <?php if (isset($message)) {
            echo "<div class='alert alert-success mt-5' role='alert'>
          $message
        </div>";
        } ?>
        <?php if (isset($error)) {
            echo "<div class='alert alert-danger mt-5' role='alert'>
          $error
        </div>";
        } ?>
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" action="" method="POST" >
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="signup.php">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>