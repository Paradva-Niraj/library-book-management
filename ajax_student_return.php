<?php
$search_val=$_POST['search'];
include('../connection.php');

if($search_val!='')
{
    $sql="SELECT b.*,i.* from books b,issuebook i where b.isissue=1 and i.returnstatus=0 ";
    $result=mysqli_query($conn,$sql);
}
else{
    $sql="SELECT b.*,i.* from books b,issuebook i where b.isissue=1 and i.returnstatus=0 ";
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
            <td><a href='book_return.php?bid={$row['bookid']}' id='delete-thought'
            class='btn btn-primary'>book return</a>";
        }
        echo $output;
}
else{
    echo "no record";
}
?>