<?php
$search_val=$_POST['search'];
include('./connection.php');

if($search_val!='')
{
    $sql="SELECT DISTINCT b.*,c.c_name,a.author_name from books b,categories c,author a where b.catid=c.id and b.authorid=a.id and b.book_name like '%{$search_val}%'";
    $result=mysqli_query($conn,$sql);
}
else{
    $sql="SELECT DISTINCT b.*,c.c_name,a.author_name from books b,categories c,author a where b.catid=c.id and b.authorid=a.id";
    $result=mysqli_query($conn,$sql);
}
$output="";
if(mysqli_num_rows($result)>0){
    while ($row = mysqli_fetch_assoc($result)) 
        {
            $isissue="";
            if($row['isissue'])
            {
                $isissue="not available";
            }
            else{
                $isissue="available";
            }
            $image='./admin'.$row['image'];
            $output = $output . "<tr><td>{$row['id']}</td>
            
            <td><img src='{$image}' height='100px' ></td>
            <td>{$row['book_name']}</td>
            <td>{$row['c_name']}</td>
            <td>{$row['author_name']}</td>
            
            <td>{$row['price']}</td>

           <td>{$isissue}</td>";
        }
        echo $output;
}
else{
    echo "no record";
}
?>