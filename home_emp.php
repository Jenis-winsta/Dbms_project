<?php
include('conn.php');
session_start();
//echo "welcome".$_SESSION['username'];
$id=$_SESSION['username'];
$sql="SELECT * from emp_details where eno=$id";
$result=mysqli_query($con,$sql);
$rows=mysqli_fetch_assoc($result);
if(isset($_POST['see_vacancy'])){
    $_SESSION['eno']=$rows['eno'];
    header('location: app_status.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>home for employee</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function logout(){
            window.location.href="login.php";
            //window.loction.replace("/login.php");

        }
    </script>
</head>
<body>

<div class="container-fluid p-3 test_bg text-white text-center h2">
    Your profile display
    <span style="position:absolute; right:0px;">
        <button class="loginbutton" onclick="logout()">Log Out</button>
    </span>
</div>

<div class="container">
    <form method="POST" action="">
    <div class="row h5  mt-3">
        <div class="col-sm-3"></div>
        <div class="col-sm-3">Eno:</div>
        <div class="col-sm-3"><?php echo $rows['eno'];?></div>
        <div class="col-sm-3"></div>
    </div>
    <div class="row h5  mt-3">
        <div class="col-sm-3"></div>
        <div class="col-sm-3">Name:</div>
        <div class="col-sm-3"><?php echo $rows['fname']." ".$rows['mname']." ".$rows['lname'];?></div>
        <div class="col-sm-3"></div>
    </div>
    <div class="row h5 ">
        <div class="col-sm-3"></div>
        <div class="col-sm-3">Gender:</div>
        <div class="col-sm-3"><?php echo $rows['gender'];?></div>
        <div class="col-sm-3"></div>
    </div>
    <div class="row h5">
        <div class="col-sm-3"></div>
        <div class="col-sm-3">Date of Birth:</div>
        <div class="col-sm-3"><?php echo $rows['DOB'];?></div>
        <div class="col-sm-3"></div>
    </div>
    <div class="row h5">
        <div class="col-sm-3"></div>
        <div class="col-sm-3">Email:</div>
        <div class="col-sm-3"><?php echo $rows['email'];?></div>
        <div class="col-sm-3"></div>
    </div>
    <div class="row h5">
        <div class="col-sm-3"></div>
        <div class="col-sm-3">Education:</div>
        <div class="col-sm-3"><?php echo $rows['education'];?></div>
        <div class="col-sm-3"></div>
    </div>
    <div class="row h5">
        <div class="col-sm-3"></div>
        <div class="col-sm-3">Contact:</div>
        <div class="col-sm-3"><?php echo $rows['contact'];?></div>
        <div class="col-sm-3"></div>
    </div>
    <div class="row h5">
        <div class="col-sm-3"></div>
        <div class="col-sm-3">Address:</div>
        <div class="col-sm-3"><?php echo $rows['_Address'];?></div>
        <div class="col-sm-3"></div>
    </div>
    
    <div class="row mt-5"><!--row 11 begins-->
        <div class="col-sm-3"></div>
        <div class="col-sm-3">
            <button type="submit" name="see_vacancy" class="button"> See vacancy</button>
        </div>
        <!-- <div class="col-sm-3">
            <button type="submit" name="vacancy" class="button"> See company</button>
        </div> -->
        <div class="col-sm-3"></div>
    </div>
    </form>
</div>
</body>
</html>
