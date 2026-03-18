<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light text-center mt-5">

<div class="container">
    <div class="card p-4 mx-auto" style="width: 400px;">
        <h2>Welcome <?php echo $_SESSION['user']; ?> 🎉</h2>
        <a href="logout.php" class="btn btn-danger mt-3">Logout</a>
    </div>
</div>

</body>
</html>