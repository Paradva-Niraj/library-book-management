<?php
include('connection.php');
session_start();
error_reporting(0);
if(strlen($_SESSION['login'])==0)
{ 
  header('location:index.php');
}
else
$id=$_SESSION['id'];
{
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script src="./jquery/jquery.js"></script>
     <link rel="icon" href="projectimg/icon.png" type="image/x-icon">
     <link rel="stylesheet" href=".\bootstrap\css\bootstrap.min.css">
     <link rel="stylesheet" href="./css/student_dashboard.css">
     <title>student dashbord | home</title> 
    </head>
    <body> 
        <header>
            <?php  
                include('userfile/user_header.php');
                $author="SELECT * FROM `books`";
                $result=mysqli_query($conn,$author);
                $count_book=mysqli_num_rows($result);
                $author="SELECT * FROM `issuebook` where `returnstatus`=0 and `sid`='$id'";
                $result=mysqli_query($conn,$author);
                $count_n_return=mysqli_num_rows($result);
                $author="SELECT * FROM `issuebook` where `sid`='$id'";
                $result=mysqli_query($conn,$author);
                $count_issue=mysqli_num_rows($result);
               
            ?>
        </header>
                <h4>user dashboard</h4>
                <div class="dash-info">
                    <a href="./books.php">
                    <div class="book-list">
                        <img src="./projectimg/booklist.png" class="dash-img" alt="" srcset="">
                        <h2><?php echo $count_book; ?></h2>
                        <h5>book list</h5>
                    </div>
                    </a>
                    <a href="./student_return.php">
                    <div class="book-n-return">
                        <img src="./projectimg/bookreturn.png" class="dash-img" alt="" srcset="">
                        <h2><?php echo $count_n_return; ?></h2>
                        <h5>book not return yet</h5>
                    </div>
                    </a>
                    <a href="./issuebyme.php">
                    <div class="book-issue">
                        <img src="./projectimg/bookissue.png" class="dash-img" alt="" srcset="">
                        <h2><?php echo $count_issue; ?></h2>
                        <h5>book issueed</h5>
                    </div>
                    </a>
                </div>
                <?php } ?>
    </body>
    </html>