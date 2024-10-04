<?php
$search_val=$_POST['search'];
include('../connection.php');

if($search_val!='')
{
    $sql="SELECT * from register_student where fname like '%{$search_val}%' or lname like '%{$search_val}%' or id like '%{$search_val}%'";
    $result=mysqli_query($conn,$sql);
}
else{
    $sql="select * from register_student";
    $result=mysqli_query($conn,$sql);
}
$output="";
if(mysqli_num_rows($result)>0){
    while ($row = mysqli_fetch_assoc($result)) 
        {
            $state="";
            if($row['status']){
                $state="active";
            }
            else{
                $state="diactive";
            }
            $output = $output . "<tr><td>{$row['id']}</td>
            <td>{$row['fname']}{$row['lname']}</td>
            <td>{$row['gender']}</td><td>{$row['dob']}</td>
            <td>{$row['contact']}</td><td>{$row['address']}</td>
            <td>{$state}</td>
            <td><a href='change_status.php?id={$row['id']}&status={$row['status']}' id='delete-thought'
            class='btn btn-primary'>change status</a>
            <a href='delete_student.php?id={$row['id']} id='delete-thought'
            class='btn btn-danger'>delete</a></td>";
        }
        echo $output;
}
else{
    echo "no record";
}
?>