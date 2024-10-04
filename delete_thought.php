<?php
    include('connection.php');

    $id=$_GET['id'];

    $sql="DELETE from thought where id='$id' ";
    $ans=mysqli_query($conn,$sql);
    if($ans){
        // echo "success";
        header('location:mythought.php');
    }
    else{
        echo "fail delete opration !! retry";
    }
?>