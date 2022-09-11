<?php
if(isset($_POST['register'])){
    $fname=$_POST['fname'];
    $mname=$_POST['mname'];
    $lname=$_POST['lname'];
    $gender=$_POST['gender'];
    $DOB=$_POST['DOB'];
    $email=$_POST['email'];
    $edu=$_POST['edu'];
    $contact=$_POST['contact'];
    $address=$_POST['address'];
    $optional=$_POST['optional'];
    //connecting to database
    $con=mysqli_connect('localhost','root','abcd','project');

    $sql1="INSERT INTO `emp_details` (`eno`, `fname`, `mname`, `lname`, `gender`, `DOB`, `email`, `education`, `contact`, `_Address`, `cover_letter`, `resume_`) 
    VALUES (NULL, '$fname', '$mname', '$lname', '$gender', '$DOB','$email', '$edu', '$contact', '$address', '$optional', 1);";
    $result= mysqli_query($con,$sql1);

    $query="SELECT * from emp_details where fname='$fname' and mname='$mname' and lname='$lname'";
    $result1=mysqli_query($con,$query);
    $rows=mysqli_fetch_assoc($result1);
    $num=intval($rows['eno']);
    if($result){
        echo "Registered successfully<br>";
        $sql2="INSERT INTO `user_pass` (`id`, `pass`, `Emp_or_com`) VALUES ($num, 'password', 'emp');";
        $result2= mysqli_query($con,$sql2);
    }
    echo "Username(id): ".$rows['eno']." <br>Password: password";
    
    
    
  
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
    <title>Employee Registration form</title>
    <script>
        function login(){
            window.location.href="login.php";
            //window.loction.replace("/login.php");
        }
    </script>
</head>
<body>
<div class="container-fluid p-3 test_bg text-white text-center"><!--p-4 is padding -->
  <h1>Employee Registration Form
    <span style="position:absolute; right:0px;">
        <button class="loginbutton" onclick="login()">Login</button>
    </span>
  </h1>
  <!--/*<p>Resize this responsive page to see the effect!</p> 
*/-->
</div>
<form action="registration_emp.php" method="POST">
<div class="container">
    <div class="row"> &nbsp;</div>
    <div class="row text">
            <div class="col-sm-3"></div>
            <div class="col-sm-3 ">
                <label>Name:</label>
            </div>
            <div class="col-sm-3">
                <input type="text" id="name" name="fname" class="form-control" placeholder="First name">
                <input type="text" id="name" name="mname" class="form-control" placeholder="middle name">
                <input type="text" id="name" name="lname" class="form-control" placeholder="last name">
            </div>
            <div class="col-sm-3"></div>
        </div><!--row 2 ends-->
        <br>
        <div class="row text">
            <div class="col-sm-3"></div>
            <div class="col-sm-3">
                <label>Gender</label>
            </div>
            <div class="col-sm-3">
                <input type="radio" id="gender" name="gender" value="Male">Male<br>
                <input type="radio" id="gender" name="gender" value="Female">Female
            </div>
            <div class="col-sm-3"></div>
        </div><!--row 3 ends-->
        <br>
        <div class="row text">  <!--row 4 begins-->
            <div class="col-sm-3"></div>
            <div class="col-sm-3">
                <label>Date of Birth:</label>
            </div>
            <div class="col-sm-3">
                <input type="date" id="DOB" name="DOB"><br>
            </div>
            <div class="col-sm-3"></div>
        </div><!--row 4 ends-->
        <br>
        <div class="row text">  <!--row 5 begins-->
            <div class="col-sm-3"></div>
            <div class="col-sm-3">
                <label>Email:</label>
            </div>
            <div class="col-sm-3">
                <input type="email" id="email" name="email">
            </div>
            <div class="col-sm-3"></div>
        </div><!--row 5 ends-->
        <br>
        <div class="row text">  <!--row 6 begins-->
            <div class="col-sm-3"></div>
            <div class="col-sm-3">
                <label>Education:</label>
            </div>
            <div class="col-sm-3">
                <select class="form-select" id="edu" name="edu">
                    <option>12th</option>
                    <option>graduate</option>
                    <option>post graduate</option>
                    <option>other(diplomo)</option>
                </select>
            </div>
            <div class="col-sm-3"></div>
        </div><!--row 6 ends-->
        <br>
        <div class="row "> <!--row 7 begins-->
            <div class="col-sm-3"></div>
            <div class="col-sm-3  text">
                <label>Contact: </label>
            </div>
            <div class="col-sm-3">
                <input type="number" name="contact">
            </div>
            <div class="col-sm-3"></div>
        </div><!--row 7 ends-->
        <br>
        <div class="row text"><!--row 8 begins-->
            <div class="col-sm-3"></div>
            <div class="col-sm-3">
                <label>Address: </label>
            </div>
            <div class="col-sm-3">
                <textarea name="address"></textarea>
            </div>
            <div class="col-sm-3"></div>
        </div><!--row 8 ends-->
        <br>
        <div class="row text"><!--row 9 begins-->
            <div class="col-sm-3"></div>
            <div class="col-sm-3">
                <label>Any extra: </label>
            </div>
            <div class="col-sm-3">
                <textarea name="optional"></textarea>
            </div>
            <div class="col-sm-3"></div>
        </div><!--row 9 ends-->
        <br>
        <!--
        <div class="row"> row 10 begins
            <div class="col-sm-3"></div>
            <div class="col-sm-3">
                <lable>Resume: </lable>
            </div>
            <div class="col-sm-3">
                <input type="file">
            </div>
            <div class="col-sm-3"></div>
        </div>row 10 ends-->
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
</div>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
