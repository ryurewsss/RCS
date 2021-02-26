<?php 

    session_start();
    require_once('dbconnect.php');

    if(!isset($_SESSION['user'])){
        header('Location: index.php');
    }

    $userData = $db->users->findOne(array('_id' => $_SESSION['user']));
?>
<!DOCTYPE html>
<html>
<head>
    <title>Twiiter Clone</title>
</head>
<body>
    <?php include('header.php')?>
</body>
</html>