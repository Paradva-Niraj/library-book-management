<?php
    include('../connection.php');
    // error_reporting(0);
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $sql="DELETE from author where id='$id'";
        $result=mysqli_query($conn,$sql) or die(false);
        if($result)
        {
            echo "<script>alert('author delete successfully');</script>";
            header('location:author.php');
        }
        else{
            echo "<script>alert('author use some where delete this first');</script>";
        }
    }
    else{
        echo "<script>alert('somthing error! try again');</script>";
    }
?>