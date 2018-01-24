<?php
    require_once ('connection.php');

    if(isset($_POST['signup']))
    {
        $fn = $_POST['fname'];
        $ln = $_POST['lname'];
        $un = $_POST['uname'];
        $pass = $_POST['pass1'];
        $pass2 = $_POST['pass2'];

        if($pass!=$pass2)
        {
            echo "Password mismatched.";
        }
        else
        {
            $insert_query = "INSERT INTO `users` (`fn`, `ln`, `un`, `pass`) VALUES('$fn', '$ln', '$un', '$pass')";
            if($conn->query($insert_query) === TRUE)
            {
                echo "Your account has been created successfully !";
            }
            else
            {
                echo "Problem occurd during registration proccess.";
            }
        }

    }
?>
 <html>
    <head>
        <title>Sign Up</title>
    </head>
    <body>
        <form action="" method="post">
            First Name: <input type="text" name="fname" value="" required autofocus><br>
            Last Name: <input type="text" name="lname" value="" required><br>
            Username: <input type="text" name="uname" value="" required><br>
            Password: <input type="password" name="pass1" value="" required><br>
            Confirm Passwords: <input type="password" name="pass2" value="" required><br>
            <input type="submit" name="signup" value="Sign up"> <input type="reset" name="reset" value="Clear">
        </form>
    </body>
</html>
