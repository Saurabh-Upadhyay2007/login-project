<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require __DIR__."/db.php";

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user['username'];
            header("Location: dashboard.php");
            exit();
        } else {
            $error = "Wrong Password!";
        }
    } else {
        $error = "User not found!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #667eea, #764ba2);
            height: 100vh;
        }
        .card {
            border-radius: 15px;
        }
        .form-control {
            border-radius: 10px;
        }
        .btn {
            border-radius: 10px;
        }
    </style>
</head>

<body class="d-flex justify-content-center align-items-center">

<div class="card shadow p-4" style="width: 350px;">
    <h3 class="text-center mb-3">🔐 Login</h3>

    <?php if(isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>

    <form method="POST">
        <input type="email" name="email" class="form-control mb-3" placeholder="Enter Email" required>
        <input type="password" name="password" class="form-control mb-3" placeholder="Enter Password" required>
        <button name="login" class="btn btn-primary w-100">Login</button>
    </form>

    <p class="text-center mt-3">
        Don't have an account? <a href="register.php">Register</a>
    </p>
</div>

</body>
</html>