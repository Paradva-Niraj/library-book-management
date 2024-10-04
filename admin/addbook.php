<?php
include('../connection.php');
session_start();
// error_reporting(0);
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
     <title>add book</title> 
    </head>
    <body> 
        <header>
            <?php  
                include('./adminfile/admin_header.php');
}  
            
            ?>
        </header>
                <h4>add new book</h4>
        
        <div class="thought">
            <form action="#" method="POST" enctype="multipart/form-data">
                
                <label>book name </label><br>
                <input type="text" class="title form-control" name="title" placeholder="enter title" required=""><br>
                
                <label>categories </label><br>
                <select name="cat" id="" class="form-control" style="width:90%; margin-left:3vw">
                    <?php 
                        $sql="select * from categories";
                        $results=mysqli_query($conn,$sql);
                        foreach($results as $result)
                        {               ?>  
                        <option value="<?php echo $result['id']?>"><?php echo $result['c_name']?></option>
                        <?php } ?> 
                        
                </select><br><br>
                <label>author  </label><br>
                <select name="author" id="" class="form-control" style="width:90%; margin-left:3vw">
                    <?php 
                        $sql="select * from author";
                        $results=mysqli_query($conn,$sql);
                        foreach($results as $result)
                        {               ?>  
                        <option value="<?php echo $result['id']?>"><?php echo $result['author_name']?></option>
                        <?php } ?> 
                        
                </select><br><br>
                <label>isbn number </label><br>
                <input type="number" class="title form-control" name="isbn" placeholder="enter book isbn" required=""><br>
            
                <label>price </label><br>
                <input type="number" class="title form-control" name="price" placeholder="enter book price" required=""><br>
            
                <label>image </label><br>
                <input type="file" class="title form-control" name="image" required=""><br>
                         
            <input type="submit" value="publish" name="publish" class="btn btn-success" style="width:10vw; margin-left:45vw;margin-bottom:2vh;">
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
            $filename=  $_FILES["image"]["name"];
            $tmpname =$_FILES["image"]["tmp_name"];
            $folder = "./books/".$filename;
            move_uploaded_file($tmpname,$folder);

            $sql="INSERT into books (`book_name`,`catid`,`authorid`,`isbnno`,`price`,`image`,`isissue`,`reg_date`) VALUES ('$title','$cat','$author','$isbn','$price','$folder',0,now())";
                $ans=mysqli_query($conn,$sql);
                if($ans){
                    // echo "<script>alert('your thought listen successfully,see on index page');</script>";
                    header('location:./books.php');
                }
                else{
                    echo "<script>alert('Something went wrong. Please try again');</script>";
                } 
        
        }
?>