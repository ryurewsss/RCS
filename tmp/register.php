<?php 

    session_start();
    require_once('dbconnect.php');

    if(isset($_SESSION['user'])){
        header('Location: home.php');
    }
    if(isset($_POST['username']) && ($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $result = $db->users->insertOne(array('username' => $username, 'password' => $password));

        header('Location: index.php');
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Twiiter Clone</title>
    <h3>Register</h3>
</head>
<body>
    <form method="POST" action="register.php">
        <fieldest>
            <label for="username">USERNAME: </label><input type="text" name="username"><br><br>
            <label for="password">PASSWORD: </label><input type="text" name="password"><br><br>
            <input type="submit" name="Sign Up">
        </fieldest>
    </form>
    <br>
    <a href="index.php">Login Again!</a>
    
</body>
</html>