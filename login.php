<?php
include('conn.php');
session_start();
if(isset($_POST['login'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $sql="SELECT * from user_pass where id='$username' and pass='$password'";
    $result=mysqli_query($con,$sql);
    $rows=mysqli_fetch_assoc($result);
    $user= $rows['Emp_or_com'];
    if(mysqli_num_rows($result)==1){
        echo "Successful";
        if($user=='emp'){
            echo "employee";
            $_SESSION['username']=$username;
            $_SESSION['password']=$password;
            header('location: home_emp.php');//landing page
        }else{
          $_SESSION['username']=$username;
            $_SESSION['password']=$password;
            header('location: home_comp.php');//landing page
        }
        

    }else{
        echo "wrong username or password";
        
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Login page</title>
    <!--
    <style>
        input[type="text"]{
            width: 500px;
        }
    </style>
    <link rel="stylesheet" href="style.css">-->
  </head>
  <body>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="login.php">Login page</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <!--
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact us</a>
        </li>-->
        
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
    <div class="container">
        <h1 align="center">Login page</h1>
        <form action="" method="POST">
        <div class="mb-3">
            <label for="username" class="form-label">Username: </label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="username">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
        </div>
        
        <button type="submit" class="btn btn-primary" name="login">Login</button>

        </form>
        <div class="mb-3">
            Register here for employees:<a href="registration_emp.php"> Employees</a><br>
            Register here for Company:<a href="registration_comp.php"> Company</a>
        </div>

    </div>
    
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>