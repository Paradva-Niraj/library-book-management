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
     <title>return book</title> 
    </head>
    <body> 
        <header>
            <?php  
                include('./adminfile/admin_header.php');
                // $sql="SELECT * from bookissue where retrunstatus=0";         
                // $result=mysqli_query($conn,$sql);
}          
            ?>
        </header>
                <h4>book return</h4>
                <div class="mythought-table">
            <div class="search">
                <div>
                    <h5>enter sid&nbsp&nbsp</h5>
                </div>
                <div>  
                    <input type="text" class="form-control" name="find" id="find">
                </div>
            </div>
            <table class="table table-striped table-hover">
            <thead class="table-dark">
                <th>issue id</th>
                <th>book isbn number</th>
                <th>student id</th>
                <th>issue date</th>
                <th>return date</th>
                <th>isissue</th>
                <th>action</th>
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
                url:"ajax_bookreturn.php",
                type:"POST",
                data:{search:search_tun},
                success:function(data){
                    $('#search-data').html(data);
                }
            });
      $('#find').on("keyup",function () {
            var search_tun=$(this).val();
            $.ajax({
                url:"ajax_bookreturn.php",
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
<?php
    if(isset($_GET['bid']))
    {
        // $id=$_GET['id'];
        $bid=$_GET['bid'];
        $sid=$_GET['sid'];
        $sql="UPDATE `issuebook` set `returnstatus`='1',`returndate`=now() where `bookid`='$bid' and `sid`='$sid'";
        $result=mysqli_query($conn,$sql);
        $sql="UPDATE `books` set `isissue`='0' where `isbnno`='$bid'";
        $result=mysqli_query($conn,$sql);
        // if($result)
        // {
        //     if($result){
        //         echo "<script>alert('return success!')</script>";
        //     }
        // }
    }

?>