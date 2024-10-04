<?php 
    include('../connection.php');
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        // echo $_GET['id'];
        $sql="DELETE from books where id='$id'";
        $result=mysqli_query($conn,$sql);
        if($result)
        {
            echo "<script>alert('book delete successfully');</script>";
            header('location:books.php');
        }
    }
    else{
        echo "<script>alert('somthing error! try again');</script>";
    }
?>