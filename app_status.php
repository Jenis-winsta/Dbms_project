<?php 
include('conn.php');
session_start();
$eno = $_SESSION['eno'];
//echo $eno;
if(isset($_GET['apply'])){
    $vac_id=$_GET['apply'];
    $delete=true;
    echo "apply";
    $sql="DELETE FROM `vacancy` WHERE `vac_id`= '$vac_id';";
    $result= mysqli_query($con,$sql);
    if($result){
        $delete = true;
    }else{
        echo mysqli_error($con);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Application Status</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>

    <script>
        function logout(){
            window.location.href="login.php";
        }
    </script>
</head>
<body>
<div class="container-fluid p-3 test_bg text-white text-center h2">
    See Vacancy
    <span style="position:absolute; right:0px;">
        <button class="loginbutton" onclick="logout()">Log Out</button>
    </span>
</div>
<div class="container">
<table class="table" id="myTable">
        <thead>
            <tr>
            <th scope="col">Vac_id</th>
            <th scope="col">Position</th>
            <th scope="col">Education_req</th>
            <th scope="col">Experience</th>
            <th scope="col">Short description</th>
            <th scope="col">Person required</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql1 = "SELECT * FROM `project`.`vacancy` WHERE `Cno` = 5020";
                $result1= mysqli_query($con,$sql1);
                while($row = mysqli_fetch_assoc($result1)){
                    echo "<tr>
                    <th scope='row'>".$row['vac_id']."</th>
                    <td>".$row['_position']."</td>
                    <td>".$row['edu_req']."</td>
                    <td>".$row['exp_req']."</td>
                    <td>".$row['short_des']."</td>
                    <td>".$row['person_req']."</td>
                    <td>  <button class='apply btn btn-sm btn-primary' id=".$row['vac_id'].">Apply</button>  </td>
                </tr>";
                
                }
            ?>
        </tbody>
    </table>
</div>
    <script>
        applys=document.getElementsByClassName('apply');
        Array.from(applys).forEach((element)=>{
            element.addEventListener("click",(e)=>{
                console.log("apply",);
                vac_id=e.target.id;
                console.log(vac_id);
                
                if(confirm("Are you sure want to apply?")){
                    window.location=`/project/app_status.php?apply=${vac_id}`;
                }else{
                    console.log("no");
                }
            })
        })
    </script>
</body>
</html>