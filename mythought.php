<?php
include('connection.php');
session_start();
error_reporting(0);
if(strlen($_SESSION['login'])==0)
{ 
  header('location:index.php');
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
     <link rel="icon" href="projectimg/icon.png" type="image/x-icon">
     <link rel="stylesheet" href=".\bootstrap\css\bootstrap.min.css">
     <link rel="stylesheet" href="./css/student_dashboard.css">
     <title>mythought | student</title> 
    </head>
    <body> 
        <header>
            <?php  
                include('userfile/user_header.php');
                $uid= $_SESSION['id'];
                $sql="SELECT * from thought where user_id=$uid";
                $result=mysqli_query($conn,$sql);
                // print_r ($result);
                // echo mysqli_num_rows($result);
    }
            ?>
        </header>
        <h4>my thoughts</h4>
        <div class="mythought-table">
            <table class="table table-striped table-hover">
                <tr>
                <th>image</th>
                <th>title</th>
                <th>description</th>
                <th>delete your thought</th>
            </tr>
            <tr>
                <?php 
                    while ($row = mysqli_fetch_assoc($result)) 
                    {
                        $id=$row['id'];
                        $image=$row['image'];
                        $title=$row['title'];
                        $desc=$row['description'];
                ?>
                    <td><img src="<?php echo $image; ?>" class="thought-img"></td>
                    <td><?php echo $title ?></td>
                    <td><?php echo $desc?></td>
                    <td><a href="delete_thought.php?id=<?php echo $id ?>" id="delete-thought" class="btn btn-danger">delete</a></td>
                </tr>
                <?php } ?>
            </table>
        </div>
        </body>    
</html>