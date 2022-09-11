<?php
session_start();
mysqli_select_db($con,'project');
$name=$_POST['name'];
$gender=$_POST['gender'];
$DOB=$_POST['DOB'];
$email=$_POST['email'];
$edu=$_POST['edu'];
$contact=$_POST['contact'];
$address=$_POST['address'];
$optional=$_POST['optional'];
$con= mysqli_connect('localhost','root','abcd');
if($con->connect_error){
    die('Connection Failed :'.$con->connect_error);
}else{
    $stmt= $conn->prepare("insert into emp_details(fname,gender,DOB, email, education,contact,_Address,cover_letter)
        values(?,?,?,?,?,?,?,?)");

}




?>