<?php

    // we need a file which holds the configurations of database connectivity
    require_once ('connection.php');

/*
    logic for creating new user account
*/
    if(isset($_POST['signup']))
    {
        // storing the html imput values to php variables
        $fn = $_POST['fname'];
        $ln = $_POST['lname'];
        $un = $_POST['uname'];
        $pass = $_POST['pass1'];
        $pass2 = $_POST['pass2'];

        // checking the Password must be same.' validation of html 'password inputs'
        if($pass!=$pass2)
        {
            echo "Password mismatched.";
        }
        else
        {

            // this is the sql 'insert' statement (query) string for `users` table
            $insert_query = "INSERT INTO `users` (`fn`, `ln`, `un`, `pass`) VALUES('$fn', '$ln', '$un', '$pass')";

            // if the above query is valid enough for mysql then stores it to databse
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

            <!-- In input tag there are attributes like 'placeholder', 'required' and 'autofocus'
                    here 'placeholder' is used as one kind of hint for inputs,
                    'required' enables the validation that particular input must not be empty
                    and 'autofocus' enables the focus to that particular input as the page loads
            -->

            First Name: <input type="text" name="fname" value="" required autofocus><br>
            Last Name: <input type="text" name="lname" value="" required><br>
            Username: <input type="text" name="uname" value="" required><br>
            Password: <input type="password" name="pass1" value="" required><br>
            Confirm Passwords: <input type="password" name="pass2" value="" required><br>
            <input type="submit" name="signup" value="Sign up"> <input type="reset" name="reset" value="Clear">
        </form>
    </body>
</html>
