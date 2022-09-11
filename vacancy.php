<?php
include('conn.php');
session_start();
$Cno = $_SESSION['Cno'];
$insert= false;
$update=false;
$delete=false;
if(isset($_GET['delete'])){
    $vac_id=$_GET['delete'];
    $delete=true;
    $sql="DELETE FROM `vacancy` WHERE `vac_id`= '$vac_id';";
    $result= mysqli_query($con,$sql);
    if($result){
        $delete = true;
    }else{
        echo mysqli_error($con);
    }
}

if(isset($_POST['update'])){
    $vac_id=$_POST['vac_idEdit'];
    $position=$_POST['positionEdit'];
    $edu_req=$_POST['edu_qulEdit'];
    $exp=$_POST['expEdit'];
    $short_des=$_POST['short_desEdit'];
    $person_req=$_POST['person_reqEdit'];
  
    $sql="UPDATE `vacancy` SET `short_des` = '$short_des' , `_position` = '$position' , `edu_req` = '$edu_req' , `exp_req` = '$exp' , `person_req` = $person_req 
    WHERE `vacancy`.`vac_id` = $vac_id;";
    $result= mysqli_query($con,$sql);
    if($result){
        $update = true;
    }else{
        echo mysqli_error($con);
    }
}
if(isset($_POST['vacancy'])){
    $position=$_POST['position'];
    $edu_req=$_POST['edu_qul'];
    $exp=$_POST['exp'];
    $short_des=$_POST['short_des'];
    $person_req=$_POST['person_req'];

    $sql="INSERT INTO `vacancy` (`cno`,`vac_id`, `_position`, `edu_req`, `exp_req`, `short_des`, `person_req`,`person_applied`) 
    VALUES ('$Cno',NULL, '$position', '$edu_req', '$exp', '$short_des', '$person_req',1);";
    $result= mysqli_query($con,$sql);
    if($result){
        $insert = true;
    }else{
        echo mysqli_error($con);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
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
    <title>Vacancy Post</title>
    <script>
        function logout(){
            window.location.href="login.php";
        }
    </script>
</head>
<body>
<!--edit Modal -->
<div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Record</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="">
            <input type="hidden" id="vac_idEdit" name="vac_idEdit">
            <label>Position: </label>
            <input name="positionEdit" id="positionEdit" type="text"><br>
            <label>Education Qulification:</label>
            <input name="edu_qulEdit" id="edu_qulEdit" type="text"><br>
            <label>Work Experience: </label>
            <input name="expEdit" id="expEdit" type="text"><br>
            <label>Short descritption:</label>
                <textarea name="short_desEdit" id="short_desEdit" class="form-control"></textarea><br> 
            <label>No. of person required:</label>
                <input name="person_reqEdit" id="person_reqEdit" type="number"><br>
            <button type="submit" class="btn btn-primary" name="update">Update</button><br>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>


<div class="container-fluid p-3 test_bg text-white text-center h2">
    Post your Vacancy
    <span style="position:absolute; right:0px;">
        <button class="loginbutton" onclick="logout()">Log Out</button>
    </span>
</div>
    <?php 
    if($insert){
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Success!</strong> Vacancy posted successfully
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
    }
    if($update){
        echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>Success!</strong> Updated successfully
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
    } 
    if($delete){
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>Success!</strong> Deleted successfully
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
    }   
    ?>
<div class="container-fluid">
    <div class="row ">
        <form method="post" action="">
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                <label>Cno.:</label>
                    <input class="form-control width" type="text" value="<?php echo $Cno ?>" readonly >
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                
                    <label>Position: </label>
                        <input class="form-control width" name="position" type="text">&nbsp;&nbsp;&nbsp;&nbsp;
                    <label>Education Qulification:</label>
                        <input class="form-control width" name="edu_qul" type="text">&nbsp;&nbsp;&nbsp;&nbsp;
                    <label>Work Experience: </label>
                        <input class="form-control width" name="exp" type="text">&nbsp;&nbsp;&nbsp;&nbsp;                    
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                <label>Short descritption:</label>
                <textarea name="short_des"  class="form-control"></textarea>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                <label>No. of person required:</label>
                    <input class="form-control width" name="person_req" type="number">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                <button class="button" name="vacancy">Post Vacancy</button>
                </div>
            </div>
            
        </form>
    </div>
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
                    <td>  <button class='edit btn btn-sm btn-primary' id=".$row['vac_id'].">Edit</button> 
                    <button class='delete  btn btn-sm btn-primary' id=d".$row['vac_id'].">Delete</button> </td>
                </tr>";
                
                }
            ?>
        </tbody>
    </table>
        
    </div>
    <!--`vac_id`, `_position`, `edu_req`, `exp_req`, `short_des`, `person_req`-->
    <script>
        edits=document.getElementsByClassName('edit');
        Array.from(edits).forEach((element)=>{
            element.addEventListener("click",(e)=>{
                console.log("edit",);
                tr= e.target.parentNode.parentNode;
                position=tr.getElementsByTagName("td")[0].innerText;
                edu_qul=tr.getElementsByTagName("td")[1].innerText;
                exp=tr.getElementsByTagName("td")[2].innerText;
                short_des=tr.getElementsByTagName("td")[3].innerText;
                person_req=tr.getElementsByTagName("td")[4].innerText;
                console.log(position, edu_qul, exp, short_des, person_req);
                
                positionEdit.value= position;
                edu_qulEdit.value=edu_qul;
                expEdit.value=exp;
                short_desEdit.value=short_des;
                person_reqEdit.value=person_req;
                vac_idEdit.value= e.target.id;
                console.log(e.target.id);
                $('#editModal').modal('toggle');

            })
        })

        deletes=document.getElementsByClassName('delete');
        Array.from(deletes).forEach((element)=>{
            element.addEventListener("click",(e)=>{
                console.log("delete",);
                vac_id=e.target.id.substr(1,);
                
                if(confirm("Are you sure want to delete this record?")){
                    window.location=`/project/vacancy.php?delete=${vac_id}`;
                }else{
                    console.log("no");
                }
            })
        })
    </script>
   

</body>
</html>
