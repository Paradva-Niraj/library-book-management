<?php
    include('../connection.php');
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $sql="DELETE from categories where id='$id'";
        $result=mysqli_query($conn,$sql);
        if($result)
        {
            echo "<script>alert('categorie delete successfully');</script>";
            header('location:categories.php');
        }
    }
    else{
        echo "<script>alert('somthing error! try again');</script>";
    }
?>