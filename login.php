<?php

    // we need a file which holds the configurations of database connectivity
    require_once('connection.php');

/*
    logic for checking user availability or user authentication from database
    and then redirect to welcome page.
*/
    if(isset($_POST['login']))
    {
        // storing the html imput values to php variables
        $username = $_POST['username'];
        $password = $_POST['password'];

        // this is the sql 'select' statement(query) string for `users` table
        $select_query = "SELECT `un`, `pass` FROM `users` WHERE `un` = '$username' AND `pass` = '$password'";

        // fires the qyery to mysql, you can see the function's parameters where $conn is the connection string we made
        // and $select_query is the query string
        $select_run = mysqli_query($conn, $select_query);

        // fethcing rows from table as associative array and store it to php array variable ($select_row)
        $select_row = mysqli_fetch_array($select_run, MYSQLI_ASSOC);

        // storing table rows to php variables
        // here 'un' and 'pass' are field (column) names of table `users`
        // and '$user' and '$pass' are php variables
        $user = $select_row['un'];
        $pass = $select_row['pass'];

        // logic to match html inputs and database records
        if($username == $user && $password == $pass)
        {
            // redirect to welcome page
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

            <!-- In input tag there are attributes like 'placeholder', 'required' and 'autofocus'
                    here 'placeholder' is used as one kind of hint for inputs,
                    'required' enables the validation that particular input must not be empty
                    and 'autofocus' enables the focus to that particular input as the page loads
            -->
            <input type="text" name="username" value="" placeholder="Username" required autofocus>
            <input type="password" name="password" value="" placeholder="Password" required>
            <input type="submit" name="login" value="Login">
        </form>
    </body>
</html>
