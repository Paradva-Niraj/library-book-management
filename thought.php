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
     <title>enter thought | student</title> 
     
	<script>
		$(document).ready(function(){
			var title=$("#etitle").attr("maxlength");
			$("#etitle").keyup(function(){
				var titlelength=title-$(this).val().length;
				$("#title").text("charecter remain "+titlelength);
			})
			var writing=$("#eeassy").attr("maxlength");
			$("#eeassy").keyup(function(){
				var writinglength=writing-$(this).val().length;
				$("#eassy").text("charecter remain "+writinglength);
			})
		})
	</script>
    </head>
    <body> 
        <header>
            <?php  
                include('userfile/user_header.php');
                // echo $_SESSION['id'];
    }
            ?>
        </header>
        <h4 style="margin-bottom:3vh;">add your thought</h4>
        <div class="view-thought">
            <a href="./mythought.php" class="mythought">my thought</a>
        </div>
        <div class="thought">
            <form action="#" method="POST" enctype="multipart/form-data">
                <?php if(!empty($statusmsg)){ ?>
                    <p class="status <?php echo $status; ?>"> <?php echo $statusmsg; ?></p>
                <?php } ?>
                <label>thought title </label><br>
                <input type="text" class="title form-control" name="title" placeholder="type title" id="etitle" col="25" maxlength="50" required=""><br>
                <div id="title"></div>
                <label class="form-label">chose image for thought</label><br>
                <input type="file" name="t-image" id="" required=""><br><br>
			<label>write your thought</label>
			<input type="text" class="desc form-control" name="thought" placeholder="type description" id="eeassy" maxlength="255" col="25" rows="5" required="">       
			<div id="eassy"></div>
            <input type="submit" value="publish" name="publish" class="btn btn-success" style="width:10vw; margin-left:45vw; margin-top:3vh;">
            </form> 
        </div>
    </body>
    
    </html>
    <?php
        if(isset($_POST['publish']))
        {
            
            $image=$_FILES["t-image"];
            $title=$_POST['title'];
            $description=$_POST['thought'];
            $uid=$_SESSION['id'];

            $filename=  $_FILES["t-image"]["name"];
            $tmpname =$_FILES["t-image"]["tmp_name"];
            $folder = "./bookimg/".$filename;
            move_uploaded_file($tmpname,$folder);

            $sql="INSERT into thought (`image`,`title`,`description`,`user_id`) VALUES ('$folder','$title','$description','$uid')";
                $ans=mysqli_query($conn,$sql);
                if($ans){
                    // echo "<script>alert('your thought listen successfully,see on index page');</script>";
                    header('location:mythought.php');
                }
                else{
                    echo "<script>alert('Something went wrong. Please try again');</script>";
                } 


        }   
    ?>