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
     <script src="./jquery/jquery.js"></script>
     <link rel="icon" href="../projectimg/icon.png" type="image/x-icon">
     <link rel="stylesheet" href="..\bootstrap\css\bootstrap.min.css">
     <link rel="stylesheet" href="./css/admin_dashboard.css">
     <title>admin dashbord | home</title> 
    </head>
    <body> 
        <header>
            <?php  
                include('./adminfile/admin_header.php');
                $author="SELECT * FROM `author`";
                $result=mysqli_query($conn,$author);
                $count_author=mysqli_num_rows($result);
                $author="SELECT * FROM `categories`";
                $result=mysqli_query($conn,$author);
                $count_cat=mysqli_num_rows($result);
                $author="SELECT * FROM `books`";
                $result=mysqli_query($conn,$author);
                $count_book=mysqli_num_rows($result);
                $author="SELECT * FROM `issuebook`";
                $result=mysqli_query($conn,$author);
                $count_issue=mysqli_num_rows($result);
                $sql="SELECT * from issuebook i where i.returnstatus=0 ";
                $result=mysqli_query($conn,$sql);
                $count_return=mysqli_num_rows($result);
}          
            ?>
        </header>
                <h4>admin dashboard</h4>
                <div class="dash-info">
                    <a href="books.php">
                    <div class="book-list">
                        <img src="../projectimg/booklist.png" class="dash-img" alt="" srcset="">
                        <h2><?php echo $count_book; ?></h2>
                        <h5>book manage</h5>
                    </div>
                    </a>
                    <a href="book_return.php">
                    <div class="book-n-return">
                        <img src="../projectimg/bookreturn.png" class="dash-img" alt="" srcset="">
                        <h2><?php echo $count_return; ?></h2>
                        <h5>book not return yet by student</h5>
                    </div>
</a>
                    <a href="./author.php">
                    <div class="book-author">
                        <img src="../projectimg/author.png" class="dash-img" alt="" srcset="">
                        <h2><?php echo $count_author; ?></h2>
                        <h5> manage author</h5>
                    </div></a><br />
                </div>
                <a href="./Categories.php">
                <div class="dash-info">
                    <div class="book-catagories">
                        <img src="../projectimg/catagories.png" class="dash-img" alt="" srcset="">
                        <h2><?php echo $count_cat; ?></h2>
                        <h5>manage Categories</h5>
                    </div></a> 
                    <!-- <a href="./bookissue.php"> -->
                    <a href="./book_issue_record.php">
                    <div class="book-issue">
                        <img src="../projectimg/bookissue.png" class="dash-img" alt="" srcset="">
                        
                        <h2><?php echo $count_issue; ?></h2>
                        <h5>book issue by student</h5>
                    </div>
                    </a>
                </div>
</body>
</html>