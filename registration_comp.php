<?php
if(isset($_POST['register'])){
    $cname=$_POST['cname'];
    $loc=$_POST['location'];
    $contact=$_POST['contact'];
    $address=$_POST['address'];
    $mission=$_POST['mission'];
    $basic_info=$_POST['basic_info'];
    //connecting to database
    $con=mysqli_connect('localhost','root','abcd','project');

    $sql1="INSERT INTO `comp_details` (`Cno`, `Cname`, `loc`, `_Address`, `mission`, `Basic_info`, `Contact_email`) 
    VALUES (NULL, '$cname', '$loc', '$address', '$mission', '$basic_info', '$contact');";
    $result= mysqli_query($con,$sql1);
    //To fetch cno
    $query="SELECT * from `comp_details` where Cname='$cname' and Contact_email='$contact'";
    $result1=mysqli_query($con,$query);
    
    $rows=mysqli_fetch_assoc($result1);
    $num=intval($rows['Cno']);
    if($result){
        echo "Registered successfully<br>";
        $sql2="INSERT INTO `user_pass` (`id`, `pass`, `Emp_or_com`) VALUES ($num, 'password', 'comp');";
        $result2= mysqli_query($con,$sql2);
    }
    echo "Username(id): ".$rows['Cno']." <br>Password: password";
    //ALTER TABLE `comp_details` ADD UNIQUE( `Contact_email`);
    
    
  
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
    <link rel="stylesheet" href="style.css">
    <title>Company Registration form</title>
    <script>
        function login(){
            //alert("login clicked");
            window.location.href="login.php";
            //window.loction.replace("/login.php");

        }
    </script>
</head>
<body>
<div class="container-fluid p-3 test_bg text-white text-center" style="position:relative;"><!--p-4 is padding -->
  <h1>Company Registration Form
    <span style="position:absolute; right:0px;">
        <button class="loginbutton" onclick="login()">Login</button>
    </span>
  </h1>
  <!--/*<p>Resize this responsive page to see the effect!</p> 
*/-->
</div>
<form action="registration_comp.php" method="POST">
<div class="container">
    <div class="row"> &nbsp;</div>
    <div class="row text">
        <div class="col-sm-3"></div>
        <div class="col-sm-3 ">
            <label>Company Name:</label>
        </div>
        <div class="col-sm-3">
            <input type="text" id="name" name="cname" class="form-control">
        </div>
        <div class="col-sm-3"></div>
    </div><!--row 2 ends-->
    <br>
    <div class="row text">
        <div class="col-sm-3"></div>
        <div class="col-sm-3 ">
            <label>Location:</label>
        </div>
        <div class="col-sm-3">
            <input type="text" id="name" name="location" class="form-control">
        </div>
        <div class="col-sm-3"></div>
    </div><!--row 2 ends-->     
    <br>
    <div class="row text">  <!--row 5 begins-->
        <div class="col-sm-3"></div>
        <div class="col-sm-3">
            <label>Contact Info:</label>
        </div>
        <div class="col-sm-3">
            <input type="email" id="email" name="contact" placeholder="Email" class="form-control">
        </div>
        <div class="col-sm-3"></div>
    </div><!--row 5 ends-->
    <br>
    <div class="row text"><!--row 8 begins-->
        <div class="col-sm-3"></div>
        <div class="col-sm-3">
            <label>Address: </label>
        </div>
        <div class="col-sm-3">
            <textarea name="address" class="form-control"></textarea>
        </div>
        <div class="col-sm-3"></div>
    </div><!--row 8 ends-->
    <br>
    <div class="row text"><!--row 8 begins-->
        <div class="col-sm-3"></div>
        <div class="col-sm-3">
            <label>Mission statement </label>
        </div>
        <div class="col-sm-3">
            <textarea name="mission" class="form-control"></textarea>
        </div>
        <div class="col-sm-3"></div>
    </div><!--row 8 ends-->
    <br>
    <div class="row text"><!--row 9 begins-->
        <div class="col-sm-3"></div>
        <div class="col-sm-3">
            <label>Basic info of the company: </label>
        </div>
        <div class="col-sm-3">
            <textarea name="basic_info" class="form-control"></textarea>
        </div>
        <div class="col-sm-3"></div>
    </div><!--row 9 ends-->
    <br>
    <div class="row"><!--row 11 begins-->
        <div class="col-sm-3"></div>
        <div class="col-sm-3">
            <input type="submit" value="Register" name="register" class="button">
        </div>
        <div class="col-sm-3">
            <input type="reset" class="button">
        </div>
        <div class="col-sm-3"></div>
    </div><!--row 11 ends-->
       
</div>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
