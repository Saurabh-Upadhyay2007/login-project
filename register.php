<?php
require __DIR__."/db.php";

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, password)
            VALUES ('$username', '$email', '$password')";

    if ($conn->query($sql)) {
        $success = "Registered Successfully!";
    } else {
        $error = "Error!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-primary d-flex justify-content-center align-items-center" style="height:100vh;">

<div class="card p-4 shadow" style="width: 350px;">
    <h3 class="text-center mb-3">Register</h3>

    <?php if(isset($success)) echo "<div class='alert alert-success'>$success</div>"; ?>
    <?php if(isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>

    <form method="POST">
        <input type="text" name="username" class="form-control mb-3" placeholder="Username" required>
        <input type="email" name="email" class="form-control mb-3" placeholder="Email" required>
        <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
        <button name="register" class="btn btn-dark w-100">Register</button>
    </form>

    <p class="text-center mt-3">
        Already have an account? <a href="index.php">Login</a>
    </p>
</div>

</body>
</html>