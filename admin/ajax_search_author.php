<?php
$search_val=$_POST['search'];
include('../connection.php');

if($search_val!='')
{
    $sql="SELECT * from author where author_name like '%{$search_val}%'";
    $result=mysqli_query($conn,$sql);
}
else{
    $sql="select * from author";
    $result=mysqli_query($conn,$sql);
}
$output="";
if(mysqli_num_rows($result)>0){
    while ($row = mysqli_fetch_assoc($result)) 
        {
            $output = $output . "<tr><td>{$row['id']}</td>
            <td>{$row['author_name']}</td>
            <td>{$row['creation_date']}</td>
            <td><a href='delete_author.php?id={$row['id']}' id='delete-thought'
            class='btn btn-danger'>delete</a></td>";
        }
        echo $output;
}
else{
    echo "no record";
}
?>