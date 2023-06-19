<?php
    require 'config.php';
    if(!empty($_SESSION['id'])){
        header("Location: index.php");
    }
?>

<?php
    if(isset($_POST['submit'])){
        $usernameemail = $_POST['usernameemail'];
        $password = $_POST['password'];
        $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$usernameemail' OR email = '$usernameemail'");
        $row = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result)>0){
            if($password==$row['password']){
                $_SESSION['login']=true;
                $_SESSION['id']=$row['id'];
                header("Location: pizza_index.php");
            }else{
                echo "<script> alert('Password does not match')</script>";
            }
        }else{
            echo "<script> alert('User Not Registered')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Log in</title>
</head>
<body>
    <h2>Login</h2>
    <form class="" action="" method="POST" autocomplete="off">
        <label for="usernameemail">Username or Email: </label>
        <input type="text" name="usernameemail" id="usernameemail" required value=""><br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required value=""><br>
        <button type="submit" name="submit">Login </button>
        <a href="registration.php">Registration</a>
    </form>
</body>
</html>