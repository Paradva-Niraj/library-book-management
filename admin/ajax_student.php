<?php
$search_val=$_POST['search'];
include('../connection.php');

if($search_val=='')
{
    // $sql="SELECT * from books where book_name like '%{$search_val}%'";
    // $result=mysqli_query($conn,$sql);
    // echo "no record";
    
$output="";
        echo $output;
}
else{
    $sql="SELECT * from register_student where id like '%{$search_val}%' or fname like '%{$search_val}%' or lname like '%{$search_val}%'";
    $result=mysqli_query($conn,$sql);

$output="";
if(mysqli_num_rows($result)>0){
    while ($row = mysqli_fetch_assoc($result)) 
        {
            $isissue="";
            $output = $output . "<table class='table table-hover'>
            <tr><td>id - {$row['id']}</td>
            <td>name - {$row['fname']}{$row['lname']}</td>
            <td>gender - {$row['gender']}</td>
            <td>email - {$row['email']}</td>
            <td>contact - {$row['contact']}</td>

           
           <td>status - {$row['status']}</td></table>
           ";
        }
        echo $output;
}
else{
    echo "no record";
}
}
?>