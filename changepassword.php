<?php
include('connection.php');
session_start();
error_reporting(0);
if(strlen($_SESSION['login'])==0)
{ 
  header('location:index.php');
}

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
     <title>student dashbord | home</title> 
    </head>
    <body> 
        <header>
            <?php  
                include('userfile/user_header.php');
}
            ?>
        </header>
        <h4>change your password</h4>
        <div class="mythought-table pass">
            <form action="#" method="POST" class="">
                
                <div class="form-group">
                <label>Current Password</label>
                <input class="form-control" type="password" name="password" autocomplete="off" required  />
                </div>

                <div class="form-group">
                <label>Enter Password</label>
                <input class="form-control" type="password" name="newpassword" id="pass" autocomplete="off" required  />
                </div>

                <div class="form-group">
                <label>Confirm Password </label>
                <input class="form-control"  type="password" name="confirmpassword" id="cpass" autocomplete="off" onKeyUp="return checkpass();" required  />
                </div>
                <input type="submit" id="change" name="change" value="change my password" class="btn btn-primary"> 
            </form> 
        </div>
</body>
<script>
    function checkpass() 
    {
        var pass= document.getElementById("pass").value;
        var cpass= document.getElementById("cpass").value;
        if(pass != cpass)
        {
            document.getElementById("change").disabled = true;
            return false;
        }
        else
        {
            document.getElementById("change").disabled = false;
            return true;
        }
    }
</script>
</html>

<?php
    if(isset($_POST["change"]))
    {
        $opass=$_POST['password'];
        $npass=$_POST['newpassword'];
        $cpass=$_POST['confirmpassword'];
        $id=$_SESSION['id'];
        $query="select password from register_student where id='$id'";
        $ans=mysqli_query($conn,$query);
        while($row =mysqli_fetch_assoc($ans))
        {
            $oldpass=$row['password'];
        }
        // echo "<script>alert('$oldpass+$opass');</script>";
        if($oldpass==$opass)
        {
            $sql="UPDATE register_student set `password`='$cpass' where id='$id'";
            $result=mysqli_query($conn,$sql);
            if($result)
            {
                echo "<script type='text/javascript'> document.location ='student_dashboard.php'; </script>";
            }
            else{
                echo "<script>alert('something you missed please check');</script>";
            }
            // echo "<script>alert('ok');</script>";
        }
        else{
            echo "<script>alert('check old password');</script>";
        }
    }
?>