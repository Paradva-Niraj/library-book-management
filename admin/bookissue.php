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
     <title>issue new book</title> 
    </head>
    <body> 
        <header>
            <?php  
                include('./adminfile/admin_header.php');
                
}          
            ?>
        </header>
                <h4>book issue</h4>
                <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                            </div>

</div>
<div class="row">
<div class="col-md-10 col-sm-6 col-xs-12 col-md-offset-1">
<div class="panel panel-info">

<div class="panel-body">
<form method="POST" action="#">

<div class="form-group">
<label>Srtudent id<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="sid" id="studentid" onBlur="getstudent()" autocomplete="off"  required />
<div class="form-group" id="student">

</div>

</div>

<div class="form-group">
<span id="get_student_name" style="font-size:16px;"></span> 
</div>
<div class="form-group">
<label>ENTER BOOK NAME<span style="color:red;">*</span></label>
<input class="form-control" type="text" id="bookid" keyup="getbook()"  required="required" />
</div>

 <div class="form-group" id="get_book_name">
     
 </div>
     <label>ENTER BOOK isbn number<span style="color:red;">*</span></label>
    <input class="form-control" type="text" name="bookisbn" id="bookid"  required="" /><br>
<input type="submit" name="issue" id="submit" class="btn btn-info" value="issue">

                                    </form>
                            </div>
                        </div>
                            </div>

        </div>
   
    </div>
    </div>

</body>
<script>
    //live search
    $(document).ready(function () {
        
      $('#bookid').on("keyup",function () {
            var search_tun=$(this).val();
            $.ajax({
                url:"ajax_issue.php",
                type:"POST",
                data:{search:search_tun},
                success:function(data){
                    $('#get_book_name').html(data);
                }
            })
      });
      $('#studentid').on("keyup",function () {
            var search_tun=$(this).val();
            $.ajax({
                url:"ajax_student.php",
                type:"POST",
                data:{search:search_tun},
                success:function(data){
                    $('#student').html(data);
                }
            })
      });
    })
</script>
</html>
<?php 
  if(isset($_POST['issue']))
  {
      $sid=$_POST['sid'];
      $bid=$_POST['bookisbn'];
      $sql="INSERT into issuebook (`bookid`,`sid`,`issuedate`,`returnstatus`) values ('$bid','$sid',now(),'0')";
      $result=mysqli_query($conn,$sql);
      if($result){
          $sql="UPDATE books set `isissue`=1 where `isbnno`='$bid'";
          $result=mysqli_query($conn,$sql);
          if($result)
          {
              echo "<script>alert('bookissue successfull')</script>";
              header('location:./book_issue_record.php');
          }
          else{
            echo "<script>alert('try again')</script>";
              
          }
      }
     
  }
   
?>