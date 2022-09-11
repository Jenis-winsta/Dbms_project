<?php
include('conn.php');
session_start();
$id=$_SESSION['username'];
$sql="SELECT * from comp_details where Cno=$id";
$result=mysqli_query($con,$sql);
$rows=mysqli_fetch_assoc($result);
if(isset($_POST['vacancy'])){
    echo "reached here";
    $_SESSION['Cno']=$rows['Cno'];
    header('location: vacancy.php');
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
    <title>home for Company</title>
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
    Company profile
    <span style="position:absolute; right:0px;">
        <button class="loginbutton" onclick="logout()">Log Out</button>
    </span>
</div>

<div class="container">
    <form action="" method="POST">
    <div class="row h5  mt-3">
        <div class="col-sm-3"></div>
        <div class="col-sm-3">Cno:</div>
        <div class="col-sm-3"><?php echo $rows['Cno'];?></div>
        <div class="col-sm-3"></div>
    </div>
    <div class="row h5  mt-3">
        <div class="col-sm-3"></div>
        <div class="col-sm-3">CName:</div>
        <div class="col-sm-3"><?php echo $rows['Cname'];?></div>
        <div class="col-sm-3"></div>
    </div>
    <div class="row h5 ">
        <div class="col-sm-3"></div>
        <div class="col-sm-3">Location:</div>
        <div class="col-sm-3"><?php echo $rows['loc'];?></div>
        <div class="col-sm-3"></div>
    </div>
    
    <div class="row h5">
        <div class="col-sm-3"></div>
        <div class="col-sm-3">Contact:</div>
        <div class="col-sm-3"><?php echo $rows['Contact_email'];?></div>
        <div class="col-sm-3"></div>
    </div>
    
    </div>
    <div class="row h5">
        <div class="col-sm-3"></div>
        <div class="col-sm-3">Address:</div>
        <div class="col-sm-3"><?php echo $rows['_Address'];?></div>
        <div class="col-sm-3"></div>
    </div>
    <div class="row h5">
        <div class="col-sm-3"></div>
        <div class="col-sm-3">Mission Statement:</div>
        <div class="col-sm-3"><?php echo $rows['mission'];?></div>
        <div class="col-sm-3"></div>
    </div>
    <div class="row h5">
        <div class="col-sm-3"></div>
        <div class="col-sm-3">Basic Information:</div>
        <div class="col-sm-3"><?php echo $rows['Basic_info'];?></div>
        <div class="col-sm-3"></div>
    
    <div class="row mt-5"><!--row 11 begins-->
        <div class="col-sm-3"></div>
        <div class="col-sm-3">
            <button type="submit" name="vacancy" class="button"> Post vacancy</button>
        </div>
        <!-- <div class="col-sm-3">
            <button type="submit" name="see_emp_details" class="button"> See Employees</button>
        </div> -->
        <div class="col-sm-3"></div>
    </div>
    </form>
</div>
</body>
</html>