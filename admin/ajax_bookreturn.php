<?php
$search_val=$_POST['search'];
include('../connection.php');

if($search_val!='')
{
    $sql="SELECT distinct i.* from issuebook i where i.returnstatus=0 and sid like '%{$search_val}%'";
    $result=mysqli_query($conn,$sql);
}
else{
    $sql="SELECT i.* from issuebook i where i.returnstatus=0 ";
    $result=mysqli_query($conn,$sql);
}
$output="";
if(mysqli_num_rows($result)>0){
    while ($row = mysqli_fetch_assoc($result)) 
        {
            $state="";
            if($row['returnstatus']){
                $state="returned";
            }
            else{
                $state="not return";
            }
            $output = $output . "<tr><td>{$row['id']}</td>
            <td>{$row['bookid']}</td>
            <td>{$row['sid']}</td><td>{$row['issuedate']}</td>
            <td>{$row['returndate']}</td>
            <td>{$state}</td>
            <td><a href='book_return.php?bid={$row['bookid']}&sid={$row['sid']}' id='delete-thought'
            class='btn btn-primary'>book return</a>";
        }
        echo $output;
}
else{
    echo "no record";
}
?>