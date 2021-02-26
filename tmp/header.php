<div> 
    <span> Welcome, <?php echo $userData['username'];?> !</span><br>
    [<a href="home.php">Home</a>]
    [<a href="profile.php?id=<? echo $_SESSION['user']; ?>">Profile</a>]
    [<a href="userlist.php">User Lists</a>]
    [<a href="logout.php">Log Out</a>]
</div>