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
     <link rel="icon" href="projectimg/icon.png" type="image/x-icon">
     <link rel="stylesheet" href=".\bootstrap\css\bootstrap.min.css">
     <link rel="stylesheet" href="./css/student_dashboard.css">
     <title>my profile | student</title> 
    </head>
    <body> 
        <header>
            <?php  
                include('userfile/user_header.php');
}       
            $id=$_SESSION['id'];
            $sql="SELECT  id,fname,lname,dob,email,contact,address,status from register_student where id=$id";
            $result=mysqli_query($conn,$sql);
            while($row = mysqli_fetch_assoc($result))
            {
                $id = $row['id'];
                $fname = $row['fname'];
                $lname = $row['lname'];
                $dob = $row['dob'];
                $email = $row['email'];
                $contact = $row['contact'];
                $address = $row['address'];
                $status = $row['status'];
            }
            ?>
        </header>
        <h4>my profile</h4>
        <div class="myprofile">
            <div class="view mythought-table" >
                <form method="POST" action="#">
                    <table class="table table-striped table-hover">
                        <tr>
                            <td>
                                <label>student id:</label>
                            </td>
                            <td>
                                <?php echo $id; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>profile status:</label>
                            </td>
                            <td>
                                <?php 
                            if($status)
                            {
                                echo "active";
                            }
                            else{
                                echo "diactive";
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>first name </label>
                        </td>
                        <td>
                            <input type="text" name="fname" id="" class="form-control" required="" value="<?php echo $fname; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>last name </label>
                        </td>
                        <td>
                            <input type="text" name="lname" id="" class="form-control" required="" value="<?php echo $lname; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>address</label>
                        </td>
                        <td>
                            <input type="text" name="address" class="form-control" required="" required="" value="<?php echo $address; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>date of birth</label>
                        </td>
                        <td>
                            <input type="date" name="dob" id="" class="form-control" required="" value="<?php echo $dob; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>email</label>
                        </td>
                        <td>
                            <input type="email" name="mail" class="form-control" id="" required="" value="<?php echo $email; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>contact</label>
                        </td>
                        <td>
                            <input type="text" name="contact" class="form-control" required="" id="" value="<?php echo $contact; ?>">
                        </td>
                    </tr>
                </table>
                <input type="submit" class="btn btn-primary" name="update">
            </form>
            </div>
        </div>
</body>
</html>
<?php
    if(isset($_POST["update"]))
    {
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $dob=$_POST['dob'];
        $email=$_POST['mail'];
        $contact=$_POST['contact'];
        $address=$_POST['address'];

        $sql="UPDATE register_student set fname='$fname',lname='$lname',dob='$dob',email='$email',contact='$contact',`address`='$address' where id='$id'";
        $result=mysqli_query($conn,$sql);
        if($result)
        {
            echo "<script type='text/javascript'> document.location ='profile.php'; </script>";
        }
        else{
            echo "<script>alert('something you missed please check');</script>";
        }
    }
?>