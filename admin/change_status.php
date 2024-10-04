<?php   
    include('../connection.php');
    $id=$_GET['id'];
    $s=$_GET['status'];
    if($s)
    {
        $sql="UPDATE register_student set status=0 where id='$id'";
        $ans=mysqli_query($conn,$sql);
        if($ans){
            header('location:registerstudent.php');
        }
        else{
            echo "error 0";
        }
    }
    else{
        $sql="UPDATE register_student set status=1 where id='$id'";
        $ans=mysqli_query($conn,$sql);
        if($ans){
            header('location:registerstudent.php');
        }
        else{
            echo "error 1";
        }
    }
?>