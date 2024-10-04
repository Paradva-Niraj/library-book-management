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
     <title>book return</title> 
    </head>
    <body> 
        <header>
            <?php  
                include('userfile/user_header.php');
                $author="SELECT * FROM `issuebook` where `returnstatus`=0 and `sid`='$id'";
                $result=mysqli_query($conn,$author);
                $count_book=mysqli_num_rows($result);
}            ?>
        </header>
                <h4>return report</h4>
                
                <div class="mythought-table">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <th>issue id</th>
                <th>book isbn number</th>
                <th>issue date</th>
            </thead>
            <tbody id="search-data">
                <?php
                     while ($row = mysqli_fetch_assoc($result)) 
                     {
                         ?>
                            <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['bookid']; ?></td>
                            <td><?php echo $row['issuedate']; ?></td>
                     </tr>
                         <?php
                     }
                ?>
            </tbody>
            </table>
        </div>
</body>

</html>