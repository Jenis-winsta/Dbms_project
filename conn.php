<?php

/*$sql="INSERT INTO `comp_details` (`Cno`, `Cname`, `loc`, `_Address`, `mission`, `Basic_info`) 
        VALUES (NULL, 'companyname', 'location', 'address', 'mission', 'basic_info');";

$fname=$_POST['fname'];
$mname=$_POST['mname'];
$lname=$_POST['lname'];
$gender=$_POST['gender'];
$DOB=$_POST['DOB'];
$email=$_POST['email'];
$edu=$_POST['edu'];
$contact=$_POST['contact'];
$address=$_POST['address'];
$optional=$_POST['optional'];*/
//connecting to database
$con=mysqli_connect('localhost','root','abcd','project');

/*$sql1="INSERT INTO `emp_details` (`eno`, `fname`, `mname`, `lname`, `gender`, `DOB`, `email`, `education`, `contact`, `_Address`, `cover_letter`, `resume_`) 
VALUES (NULL, '$fname', '$mname', '$lname', '$gender', '$DOB','$email', '$edu', '$contact', '$address', '$optional', 1);";
$result= mysqli_query($con,$sql1);

if($result){
    echo "value inserted";
}
else{
    echo $DOB;
    mysqli_error($con);
    echo mysqli_error($con);
    //echo $_POST['gender'];
}



?>*/