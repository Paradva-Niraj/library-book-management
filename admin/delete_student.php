<?php
include('../connection.php');

$id=$_GET['id'];

$sql="DELETE from register_student where id='$id' ";
$ans=mysqli_query($conn,$sql);
if($ans){
    // echo "success";
    header('location:registerstudent.php');
}
else{
    echo "fail delete opration !! retry";
}

?>