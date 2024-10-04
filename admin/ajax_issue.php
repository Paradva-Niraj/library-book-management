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
    $sql="SELECT * from books where book_name like '%{$search_val}%' or isbnno like '%{$search_val}%'";
    $result=mysqli_query($conn,$sql);

$output="";
if(mysqli_num_rows($result)>0){
    while ($row = mysqli_fetch_assoc($result)) 
        {
            $isissue="";
            if($row['isissue'])
            {
                $isissue="not avalable";
            }
            else{
                $isissue="avalable";
            }   
            $output = $output . "<table class='table table-hover'>
            <tr><td>id - {$row['id']}</td>
            <td><img src='{$row['image']}' height='100px' ></td>
            <td>name - {$row['book_name']}</td>
            <td>isbn - {$row['isbnno']}</td>
            <td>price - {$row['price']}</td>

           <td>{$isissue}</td>
           <td>{$row['reg_date']}</td></table>
           ";
        }
        echo $output;
}
else{
    echo "no record";
}
}
?>