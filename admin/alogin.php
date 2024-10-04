<?php
    session_start();
    error_reporting(0);
    include('../connection.php');
    if($_SESSION['login']==''){
        $_SESSION['login']=1;
    }
    if(isset($_POST['submit']))
    {
            $name=$_POST['admin'];
            $pass=$_POST['password'];
            
            $sql ="SELECT id,`name`,`password` FROM `admin` WHERE name='$name' and `password`='$pass'";
            $ans=mysqli_query($conn,$sql);
    
            while ($row = mysqli_fetch_assoc($ans)) 
            {
                $id=$row['id'];
                $check_username = $row['name'];
                $check_password = $row['password'];
            } 
            if ($name == $check_username && $pass == $check_password) 
            {  
                        $_SESSION["id"] = $id;                    
                    echo "<script type='text/javascript'> document.location ='./admin_dashboard.php'; </script>";
            }
            else
            {
                $message = "check username and password!";
                echo "<script type='text/javascript'>alert('$message');</script>";  
                echo "<script type='text/javascript'> document.location ='../adminlogin.php'; </script>";
            }
    }
?>