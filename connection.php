<?php

    $host="localhost";
    $user="root";
    $pass="";
    $db="book_motion_library";

    $conn=mysqli_connect($host,$user,$pass,$db);
    if($conn)
    {
        // echo "succeded db";
    }
    else
    {
        echo "fail";
    }
?>