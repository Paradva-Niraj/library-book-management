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
     <title>add categories</title> 
    </head>
    <body> 
        <header>
            <?php  
                include('./adminfile/admin_header.php');
}
            ?>
        </header>
                <h4>add categories</h4>
        <form action="#" method="POST" class="form">
            <div class="add-author">
                <label for="">enter name</label>
                <input type="text" name="cat" id="" placeholder="enter categorie name" class="form-control" required=""><br>
                <input type="submit" value="add categorie" name="add-cat" class="btn btn-success">
            </div>
        </form>   
</body>
</html>
<?php
    if(isset($_POST['add-cat']))
    {
        if(isset($_POST['add-cat']))
        {
            $name=$_POST['cat'];
            $sql="INSERT into categories (`c_name`,`creation_date`) values ('$name',now())";
            $ans=mysqli_query($conn,$sql);
            header('location:categories.php');
        }
        else{
            echo "<script>alert('somrthin error please try again');</script>";
       }
    }
?>