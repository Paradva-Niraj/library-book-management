<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student register form</title>
    <link rel="stylesheet" href="./css/register.css">
    <script src="./jquery.js"></script>
    <link rel="icon" href="projectimg/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>

<body>
    <header></header>
    <main>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
        <div class="dark-main">
            <form action="#" method="POST">
                <div class="member">
                    <div class="abt">student membership form</div>
                    <div class="form-div">
                        <i class="fa-regular fa-user fa-sm" style="color: #000000;"></i>
                        <input type="text" class="inp" required="" name="fname" placeholder="first name" />
                        <i class="fa-regular fa-user fa-sm" style="color: #000000;"></i>
                        <input type="text" class="inp" required="" name="lname" placeholder="last name" />
                    </div>
                    <div class="form-div">
                        <label><i class="fa-solid fa-mars" style="color: #000000;"></i> male</label>
                        <input type="radio" name="gender" value="male" style="accent-color:#000000 ;" require="" />

                        <label class="g-label" style="margin-left: 8vw;"><i class="fa-solid fa-venus"
                                style="color: #000000;"></i>
                            female</label>
                        <input type="radio" name="gender" value="female" style="accent-color:#000000 ;" require=""/>
                        <label class="g-label" style="margin-left: 8vw;">
                            prefer not to say</label>
                        <input type="radio" name="gender" value="not say" style="accent-color:#000000 ;" require=""/>
                    </div>
                    <div class="form-div">
                        <i class="fa-solid fa-cake-candles" style="color: #000000;"></i>
                        <input type="date" id="dob" name="dob" class="inp" required="" />
                        <i class="fa-regular fa-envelope" style="color: #000000;"></i>
                        <input type="email" class="inp" name="email" required="" placeholder="email address" />

                    </div>
                    <div class="form-div">
                        <i class="fa-solid fa-phone fa-sm" style="color: #000000;"></i>
                        <input type="text" class="inp" required="" name="contact" placeholder="contact number" />
                        <i class="fa-solid fa-location-dot fa-sm" style="color: #000000;"></i>
                        <input type="text" class="inp" required="" name="address" placeholder="address" />
                    </div>
                    <div class="form-div">
                        <i class="fa-solid fa-lock fa-sm" style="color: #000000;"></i>
                        <input type="password" class="inp" name="password" id="pass" placeholder="password" required="" />
                        <i class="fa-solid fa-lock fa-sm" style="color: #000000;"></i>
                        <input type="password" class="inp" name="cpassword" id="cpass" onKeyUp="return checkpass();" placeholder="confirm password" required="" />
                    </div>
                    <div class="form-div btn">
                        <input type="submit" value="submit" class="btn" id="btn" name="btn" required=""/>
                    </div>

                </div>
            </form>

        </div>
    </main>
</body>
<script>
    //for pass validation
    function checkpass() 
    {
        var pass= document.getElementById("pass").value;
        var cpass= document.getElementById("cpass").value;
        if(pass != cpass)
        {
            document.getElementById("btn").disabled = true;
            return false;
        }
        else
        {
            document.getElementById("btn").disabled = false;
            return true;
        }
    }
</script>
</html>

<?php
    include "connection.php";
    if(isset($_POST["btn"]))
    {
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $gender=$_POST['gender'];
        $dob=$_POST['dob'];
        $email=$_POST['email'];
        $contact=$_POST['contact'];
        $address=$_POST['address'];
        $password=$_POST['password'];
        $status=1;
        //echo "$fname , $lname , $gender , $dob , $email , $contact , $address , $password";
        $sql = "INSERT INTO `register_student` (`fname`, `lname`, `gender`, `dob`, `email`, `contact`, `address`, `password`,`status`) VALUES ('$fname','$lname','$gender','$dob','$email','$contact','$address','$password','$status');";
        if ($conn->query($sql)==true)
        {
               
            echo "<script type='text/javascript'> document.location ='studentlogin.php'; </script>";
        }
        else
        {
            echo "<script>alert('something you missed please check');</script>";
        }
    }

?>