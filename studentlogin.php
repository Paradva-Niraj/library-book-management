<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student log in</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="./css/slogin.css">
    <script src="./jquery.js"></script>
    <link rel="icon" href="projectimg/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form action="#" method="POST">
        <h3>Login Here</h3>
        
        <label for="username">student mail</label>
        <input type="text" placeholder="Email" id="username" name="smail" required="" />

        <label for="password">Password</label>
        <input type="password" placeholder="Password" id="password" name="password" required="" />
        <!-- <a href="#" class="pass">forgot password</a> -->
        <input type="submit" value="submit" class="btn" id="btn" name="login"/>
        <div class="social">
          <div class="go"><a href="registerstudent.php">i am not a member</a></div>
        </div>
    </form>
</body>
<!-- <script>
    //for password show
    function showpass() {
        var x = document.getElementById("pass");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script> -->

</html>
<?php
    include "connection.php";
    session_start();
    error_reporting(0);
    //for back to dashboard page
    if($_SESSION['login']==''){
        $_SESSION['login']=1;
    }
    if(isset($_POST['login']))
    {
        if(isset($_POST['smail']) && isset($_POST['password']))
        {
            $smail=$_POST['smail'];
            $pass=$_POST['password'];
            
            $sql ="SELECT email,password,status FROM register_student WHERE email='$smail' and password='$pass'";
            $ans=mysqli_query($conn,$sql);
    
            while ($row = mysqli_fetch_assoc($ans)) 
            {
                $check_username = $row['email'];
                $check_password = $row['password'];
                $check_status=$row['status'];
            } 
                error_reporting(0);
                if ($smail == $check_username && $pass == $check_password) 
                {
                    if($check_status==1)
                    {
                        $sql ="SELECT id FROM register_student WHERE email='$smail' and password='$pass' and status=1";
                        $ans=mysqli_query($conn,$sql);
                        while ($row = mysqli_fetch_assoc($ans)) 
                        {
                            // echo $row['fname'];
                          
                            $_SESSION["id"] = $row['id'];   
                        }
                        echo "<script type='text/javascript'> document.location ='student_dashboard.php'; </script>";
                    }
                    else
                    {
                        $message = "your account hase been blocked contact admin!";
                        echo "<script type='text/javascript'>alert('$message');</script>";
                    }
                }
                else
                {
                    $message = "check username and password!";
                    echo "<script type='text/javascript'>alert('$message');</script>";     
                }
           
        }
    }
    
?>