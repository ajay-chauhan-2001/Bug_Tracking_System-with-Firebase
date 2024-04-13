<?php 
session_start();
ob_start(); 
   include('./session.php');

// $_SESSION['user_id'];
 ?>
<?php
include('header.php');

require_once('config.php');

$id=$_GET["id"];
$sql="select * from project where id=$id";
$result=mysqli_query($db,$sql);
$row=mysqli_fetch_array($result);

$project_name = $row['project_name'];
// echo $project_name."<br>";

$dev_id = $row['dev_id'];
// echo $dev_id."<br>";

$task_name = $row['task_name'];
// echo $task_name."<br>";

$create_on = $row['create_on'];
// echo $create_on."<br>";

$close_on = $row['close_on'];
// echo $close_on."<br>";
// $et= $_POST['estimated_time'];

$description = $row['description'];
// echo  $description;die();
$status = $row['status'];
// echo $status."<br>";


if (isset($_POST["submit"]))
{
  $project_name = $_POST['project_name'];
    // echo $project_name;die();
    $dev_id = $_POST['dev_id'];
    $task_name = $_POST['task_name'];
    $create_on = $_POST['create_on'];
    // $et= $_POST['estimated_time'];
    $close_on = $_POST['close_on'];

    $description = $_POST['description'];
    // echo $desc;die();
// echo  $description;die();

    $status = $_POST['status'];

  $sql ="UPDATE `project` SET  `project_name`='$project_name',`dev_id`='$dev_id',`task_name`='$task_name',`create_on`='$create_on',`close_on`='$close_on',`estimated_time`='$et',`description`='$description',`status`='$status' WHERE id=$id";
    // echo $sql;die();
  $result = mysqli_query($db ,$sql);
  if($result){
//   echo "data  updated successfully ";
    echo '<script>alert("Data updated successfully"); window.location.href = "project.php";</script>';

  // header("location:project.php");
  }
  else
  {
    die(mysqli_error($db));
  }

}
?>



<!DOCTYPE html>
<html>
<head>
    <title>Edit Developer</title>
</head>
<body>
<div class="container mt-5">
 <div class="w3-padding-64 w3-content w3-text-grey" id="contact"> 
          <a href="project.php" class="btn btn-primary"><i class="fa-regular fa-circle-left"></i></a>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form class="border shadow p-3" method="post" action="edit_project.php?id=<?php echo  $id;?>" enctype="multipart/form-data">
                    <h2 align="center">Edit Project Details</h2>
                     <!-- <input type="hidden" name="id" class="form-control" value="<?php echo $row['id']; ?>"> -->

                     <div class="form-group">
                        <label for="">Project Name</label>
                        <input type="text" name="project_name" class="form-control" value="<?php echo $row['project_name']; ?>">
                    </div>

                     <?php 
                      $project="select * from developer";
                      $query=mysqli_query($db,$project);
                      if (mysqli_num_rows($query) > 0)
                       {
                            ?>
                            <div class="form-group">
                                <label>Assign_to Developer</label>
                                <select name="dev_id" id="" class="form-control">
                                    <option value="">select developer to assign project <i class="fa fa-arrow-down" aria-hidden="true"></i></option>

                                    <?php
                                        foreach ($query as $val)
                                            {
                                    ?>
                             
                                    <option value="<?php echo  $val['id']; ?>" <?php if ($val['id']==  $row['dev_id']) { echo 'selected'; } ?>><?php echo  $val['name'];  ?>
                                    </option>
                                    <?php } ?>

                                </select>
                                
                            </div>
                           
                         
                           
                           <?php
                      }
                      else
                      {
                        echo "no data found";
                      }
                      
                       ?>
                    

                    <div class="form-group">
                        <label for="">Task_Name</label>
                        <input type="text" name="task_name" class="form-control"value="<?php echo $row['task_name']; ?>">
                    </div>
                   
                    
                    <div class="form-group">
                        <label for="">Create On</label>
                        <input type="date" name="create_on" class="form-control"value="<?php echo $row['create_on']; ?>"><br>
                    </div>
                    <div class="form-group">
                        <label for="">Close On</label>
                        <input type="date" name="close_on" min="<?php echo date("Y-m-d"); ?>" class="form-control"value="<?php echo $row['close_on']; ?>"><br>
                    </div>

                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea type="text" name="description" class="form-control"value=""><?php echo $row['description']; ?></textarea>
                        <br>
                    </div>

                    <div class="mb-3">
                <label f class="form-label">Status</label>
                <select class="form-control" name="status" value="<?php echo $row['status']; ?>">
                  <option>select Status</option>
                   <option value="pending"<?php if ($row['status']=='pending') { echo 'selected'; } ?>>Pending</option>
                    <option value="process on" <?php if ($row['status']=='process on') { echo 'selected'; } ?>>Process On</option>
                    <option value="sucess"<?php if ($row['status']=='sucess') { echo 'selected'; } ?>>Sucess</option>
                    <option value="difer"<?php if ($row['status']=='difer') { echo 'selected'; } ?>>Difer</option>
                </select>
              </div>
              
              
                    <input type="submit" name="submit" class="btn btn-primary" value="Update Project">
                    <a href="project.php" class="btn btn-secondary">Cancel</a>






                    
                </form>
            </div>
        </div>
    </div>
</body>
</html>


<?php include('footer.php');?>
