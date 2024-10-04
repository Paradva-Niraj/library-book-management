<?php
include('./connection.php');
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
     <link rel="icon" href="./projectimg/icon.png" type="image/x-icon">
     <link rel="stylesheet" href=".\bootstrap\css\bootstrap.min.css">
     <link rel="stylesheet" href="./css/student_dashboard.css">
     <title>book listed</title> 
    </head>
    <body> 
        <header>
            <?php  
                include('./userfile/user_header.php');
                // $sql="select * from books";
                // $result=mysqli_query($conn,$sql);
}          
            ?>
        </header>
                <h4>book list</h4>
                
                <div class="mythought-table">
            <div class="search">
                <div>
                    <h5>find books&nbsp&nbsp</h5>
                </div>
                <div>  
                    <input type="text" class="form-control" name="find" id="find">
                </div>
            </div>
            <table class="table table-striped table-hover">
            <thead class="table-dark">
                <th>id</th>
                <th>image</th>
                <th>book name</th>
                <th>categorie</th>
                <th>author</th>
                <th>price</th>
                <th>isissue</th>
            </thead>
            <tbody id="search-data">

            </tbody>
            </table>
        </div>
</body>

<script>
    //live search
    $(document).ready(function () {
        var search_tun=$(this).val();
            $.ajax({
                url:"ajax_s_book.php",
                type:"POST",
                data:{search:search_tun},
                success:function(data){
                    $('#search-data').html(data);
                }
            });
      $('#find').on("keyup",function () {
            var search_tun=$(this).val();
            $.ajax({
                url:"ajax_s_book.php",
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