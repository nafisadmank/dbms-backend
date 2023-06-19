<?php
    require 'config.php';
    if(!empty($_SESSION['id'])){
        $id = $_SESSION['id'];
        $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = $id");
        $row = mysqli_fetch_assoc($result);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Index</title>
</head>
<body>
    <h1>Welcome </h1>
    <a href="pizza_index.php">Guest Mode</a>
    <a href="logout.php">Logout</a>
</body>
</html>