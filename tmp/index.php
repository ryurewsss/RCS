<?php

    session_start();
    require_once('dbconnect.php');

    if (isset($_SESSION['user'])) { 
        header('Location: home.php');
    }
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $result = $db->users->findOne(array('username' => $username, 'password' => $password));
    
        if (!$result) {

        }else {
            $_SESSION['user'] = $result->_id;
            header('Location: home.php');
        }
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twiiter Clone</title>
    <h3>Login</h3>
</head>

<body>
    <form method="POST" action="index.php">
        <fieldest>
            <label for="username">USERNAME: </label><input type="text" name="username"><br><br>
            <label for="password">PASSWORD: </label><input type="text" name="password"><br><br>
            <input type="submit" name="login">
        </fieldest>
    </form>
    <br>
    <a href="register.php">Register Here!</a>
</body>

</html>