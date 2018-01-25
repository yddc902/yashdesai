<!--
    This code is resposible for the connection established with mysql.
-->


<?php
    $db_server = 'localhost';
    $db_user = 'root';
    $db_pass = '';
    $db_name = 'yashdesai';

    //connection to mysql and database
    $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

/*---------------------------------------------------------------------------------------*/
//    Uncommemmnt the below 'if' block to check whether connection was established or not.
/*---------------------------------------------------------------------------------------*/

    /*
    if(!$conn)
    {
        echo "Could not connect to database.";
    }

    echo "Successfully connected to databse !";
    */
 ?>
