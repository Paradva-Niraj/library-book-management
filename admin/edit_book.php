<?php
include('../connection.php');
session_start();
error_reporting(0);
if(strlen($_SESSION['login'])==0)
{ 
  header('location:../index.php');
}
// if(isset($_SESSION['id']))
else
{
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script src="../jquery/jquery.js"></script>
     <link rel="icon" href="../projectimg/icon.png" type="image/x-icon">
     <link rel="stylesheet" href="..\bootstrap\css\bootstrap.min.css">
     <link rel="stylesheet" href="./css/admin_dashboard.css">
     <title>book edit</title> 
    </head>
    <body> 
        <header>
            <?php  
					include('./adminfile/admin_header.php');
}          
                $id=$_GET['id'];
                $sql="select * from books where id='$id'";
                $results=mysqli_query($conn,$sql);
                foreach($results as $result)
                {
                    $id=$result['id'];
                    $name=$result['book_name'];
                    $cat=$result['catid'];
                    $author=$result['authorid'];
                    $isbnno=$result['isbnno'];
                    $price=$result['price'];
                    $image=$result['image'];
                }
            ?>
        </header>
                <h4>edit books</h4>
            <div class="thought"><br>
                <form action="#" method="POST" enctype="multipart/form-data">
                <table class="table table-hover">
                    <tr>
                <td><label>book id : </label>
                </td>
                <td>
                <?php echo $id ?><br>
                </td>                
            </tr>
            <tr>
                <td><label>book name </label></td>
                <td>
                <input type="text" class="title form-control" value="<?php echo $name ?>" name="title" placeholder="enter title" required="">
            </td>
                </tr>
                <tr>
                    <td>
                <label>categories </label>
                <td>
                <select name="cat" id="" class="form-control" style="width:90%; margin-left:3vw">
                <?php 
                        $c="select * from categories";
                        $r=mysqli_query($conn,$c);
                        foreach($r as $re)
                        {               ?>  
                        <option value="<?php echo $re['id']?>" <?php  
                            if($cat==$re['id']){
                             echo "selected";
                            }
                        ?>><?php echo $re['c_name']?></option>
                        <?php } ?> 
                </select></td>
                        </tr>
                        <tr><td>
                <label>author  </label>
                        </td><td>
                <select name="author" id="" class="form-control" style="width:90%; margin-left:3vw">
                <?php 
                        $c="select * from author";
                        $r=mysqli_query($conn,$c);
                        foreach($r as $re)
                        {               ?>  
                        <option value="<?php echo $re['id']?>" <?php  
                            if($author==$re['id']){
                             echo "selected";
                            }
                        ?>><?php echo $re['author_name']?></option>
                        <?php } ?> 
                </select></td>
                        </tr>
                        <tr>
                            <td>
                <label>isbn number </label></td><td>
                <input type="number" class="title form-control" value="<?php echo $isbnno; ?>" name="isbn" placeholder="enter book price" required=""></td>
                        </tr>
                        <tr>
                            <td>
                <label>price </label></td><td>
                <input type="number" class="title form-control" name="price" value="<?php echo $price;?>" placeholder="enter book price" required=""></td>
                        </tr>
                        <tr><td>
                <label>image </label></td>
                <td>
                <img src="<?php echo $image ?>" height="200px">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                <label>change image</label>
                <input type="file" name="t-image" id="">
                        </td></tr>
                        </table>
            <input type="submit" value="update" name="publish" class="btn btn-success" style="width:10vw; margin-left:45vw;margin-bottom:2vh;"></td>
                            
        
            </form> 
                        </div>
</body>
</html>
<?php  
    if(isset($_POST['publish']))
    {
        $title=$_POST['title'];
        $cat=$_POST['cat'];
        $author=$_POST['author'];
        $isbn=$_POST['isbn'];
        $price=$_POST['price'];

        if($_FILES["t-image"]["name"])
        {
            $filename=$_FILES["t-image"]["name"];
            $tmpname =$_FILES["t-image"]["tmp_name"];
            $folder = "./books/" . $filename;
            move_uploaded_file($tmpname,$folder);  
        }
        else{
            $folder=$image;
        }   
            $sql="UPDATE books set `book_name`='$title',`catid`='$cat',`authorid`='$author',`isbnno`='$isbn',`price`='$price',`image`='$folder' where id='$id'";
            $ans=mysqli_query($conn,$sql);
            if($ans)
            {
                echo "<script>window.location.href='books.php';</script>";
                exit;
            }
            else{
                echo "<script>alert('try again! check it');</script>";
            }
         
    }
    else{
        
    }
    
?>