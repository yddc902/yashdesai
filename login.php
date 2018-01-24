<?php
    require_once('connection.php');

    if(isset($_POST['login']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $select_query = "SELECT `un`, `pass` FROM `users` WHERE `un` = '$username' AND `pass` = '$password'";
        $select_run = mysqli_query($conn, $select_query);
        $select_row = mysqli_fetch_array($select_run,MYSQLI_ASSOC);

        $user = $select_row['un'];
        $pass = $select_row['pass'];

        if($username == $user && $password == $pass)
        {
            header('location:welcome.php');
        }

        echo "Invalid username or password.";
    }
 ?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
    </head>
    <body>
        <form action="" method="post">
            <input type="text" name="username" value="" placeholder="Username" required autofocus>
            <input type="password" name="password" value="" placeholder="Password" required>
            <input type="submit" name="login" value="Login">
        </form>
    </body>
</html>
