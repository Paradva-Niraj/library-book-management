<?php
$search_val=$_POST['search'];
include('../connection.php');

if($search_val!='')
{
    $sql="SELECT * from issuebook where bookid like '%{$search_val}%'";
    $result=mysqli_query($conn,$sql);
}
else{
    $sql="select * from issuebook";
    $result=mysqli_query($conn,$sql);
}
$output="";
if(mysqli_num_rows($result)>0){
    while ($row = mysqli_fetch_assoc($result)) 
        {
            $output = $output . "<tr><td>{$row['id']}</td>

            <td>{$row['bookid']}</td>
            <td>{$row['sid']}</td>
            <td>{$row['issuedate']}</td>
            <td>{$row['returndate']}</td>
            ";
        }
        echo $output;
}
else{
    echo "no record";
}
?>