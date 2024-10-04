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
     <title>book issue list</title> 
    </head>
    <body> 
        <header>
            <?php  
                include('./adminfile/admin_header.php');
}          
            ?>
        </header>
                <h4>book issue list</h4>
                <div class="view-thought">
            <a href="./bookissue.php" class="mythought">issue book</a>
        </div>
                <div class="mythought-table">
            <div class="search">
                <div>
                    <h5>find books by id&nbsp&nbsp</h5>
                </div>
                <div>  
                    <input type="text" class="form-control" name="find" id="find">
                </div>
            </div>
            <table class="table table-striped table-hover">
            <thead class="table-dark">
                <th>issue id</th>
                <th>book id</th>
                <th>student id</th>
                <th>issue date</th>
                <th>return date</th>
                </thead>
            <tbody id="search-data">

                   <!-- <td><a href="change_status.php?id=<?php echo $id; ?>&status=<?php echo $status; ?>" id="delete-thought" class="btn btn-primary">status</a>&nbsp&nbsp
                    <a href="delete_student.php?id=<?php echo $id ?>" id="delete-thought" class="btn btn-danger">delete</a></td> -->
            </tbody>
            </table>
        </div>
</body>
<script>
    //live search
    $(document).ready(function () {
        var search_tun=$(this).val();
            $.ajax({
                url:"ajax_issue_record.php",
                type:"POST",
                data:{search:search_tun},
                success:function(data){
                    $('#search-data').html(data);
                }
            });
      $('#find').on("keyup",function () {
            var search_tun=$(this).val();
            $.ajax({
                url:"ajax_issue_record.php",
                type:"POST",
                data:{search:search_tun},
                success:function(data){
                    $('#search-data').html(data);
                }
            });
      });
    });
</script>
</html>