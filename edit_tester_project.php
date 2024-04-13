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
$sql="select * from tester_project where id=$id";
$result=mysqli_query($db,$sql);
$row=mysqli_fetch_array($result);

$project_name = $row['project_name'];
// echo $project_name."<br>";

$tester_id = $row['tester_id'];
// echo $dev_id."<br>";

// $task_name = $row['task_name'];
// echo $task_name."<br>";

$create_on = $row['create_on'];
// echo $create_on."<br>";

$close_on = $row['close_on'];
// echo $close_on."<br>";
// $et= $_POST['estimated_time'];

$description = $row['description'];
// echo  $description;die();
$status = $row['status'];
$dev_comment = $row['developer_comment'];

// echo $status."<br>";


if (isset($_POST["submit"]))
{
  $project_name = $_POST['project_name'];
    // echo $project_name;die();
    $tester_id = $_POST['tester_id'];
    // $task_name = $_POST['task_name'];
    $create_on = $_POST['create_on'];
    // $et= $_POST['estimated_time'];
    $close_on = $_POST['close_on'];

    $description = $_POST['description'];
    // echo $desc;die();
// echo  $description;die();

    $status = $_POST['status'];
    $dev_comment = $_POST['dev_comment'];


  // $sql ="UPDATE `tester_project` SET  `project_name`='$project_name',`tester_id`='$tester_id',`task_name`='$task_name',`create_on`='$create_on',`close_on`='$close_on',`estimated_time`='$et',`description`='$description',`status`='$status' WHERE id=$id";

   $sql ="UPDATE `tester_project` SET  `project_name`='$project_name',`tester_id`='$tester_id',`create_on`='$create_on',`close_on`='$close_on',`description`='$description',`status`='$status',`developer_comment`='$dev_comment' WHERE id=$id";

    // $sql ="UPDATE `tester_project` SET  `project_name`='$project_name',`tester_id`='$tester_id',`create_on`='$create_on',`close_on`='$close_on',`description`='$description',`status`='$status' WHERE id=$id";
    // echo $sql;die();
  $result = mysqli_query($db ,$sql);
  if($result){
//   echo "data  updated successfully ";
    echo '<script>alert("Data updated successfully"); window.location.href = "tester_project.php";</script>';

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
    <title>Edit tester project</title>
</head>
<style type="text/css">
    a{
    
    color: #696cff;
    font-size: x-large;
}

</style>
<body>
<div class="container mt-5">
 <div class="w3-padding-64 w3-content w3-text-grey" id="contact"> 
          <a href="tester_project.php" ><i class="fa-regular fa-circle-left"></i></a>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form class="border shadow p-3" method="post" action="edit_tester_project.php?id=<?php echo  $id;?>" enctype="multipart/form-data">
                    <h2 align="center">Edit Tester Project Details</h2>
                     <!-- <input type="hidden" name="id" class="form-control" value="<?php echo $row['id']; ?>"> -->

                     <div class="form-group">

                        <?php 
                      $ad_id="select * from developer_project";
                      $query=mysqli_query($db,$ad_id);
                      if (mysqli_num_rows($query) >0)
                       {
                            ?>
                            <div class="form-group">
                                <label>Project Name :</label>
                                <select name="project_name" class="form-select" id="project_name">
                                    <option value="">select to project <i class="fa fa-arrow-down" aria-hidden="true"></i></option>

                                    <?php
                                        foreach ($query as $val)
                                            {
                                    ?>
                                     <option value="<?php echo  $val['id']; ?>" <?php if ($val['id']==  $row['project_name']) { echo 'selected'; } ?>><?php echo  $val['project_name'];  ?>
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
                        
                    </div>

                     <?php 
                      $project="select * from tester";
                      $query=mysqli_query($db,$project);
                      if (mysqli_num_rows($query) > 0)
                       {
                            ?>
                            <div class="form-group">
                                <label> Tester Name :</label>
                                <select name="tester_id" id="" class="form-control">
                                    <option value="">select developer to assign project <i class="fa fa-arrow-down" aria-hidden="true"></i></option>

                                    <?php
                                        foreach ($query as $val)
                                            {
                                    ?>
                             
                                    <option value="<?php echo  $val['id']; ?>" <?php if ($val['id']==  $row['tester_id']) { echo 'selected'; } ?>><?php echo  $val['name'];  ?>
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
                    

                    <!-- <div class="form-group">
                        <label for="">Task_Name</label>
                        <input type="text" name="task_name" class="form-control"value="<?php echo $row['task_name']; ?>">
                    </div> -->
                   
                    
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

                     
                     <div class="form-group">
                       <!-- only for edit the developer and tester comment -->
                      <?php if ($_SESSION['role'] == 'developer' || $_SESSION['role'] == 'tester') : ?>

                        <!-- <h2>Add Comment</h2> -->
                            <label for="">Add Comment for Developer</label>

                        <!-- <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"> -->
                            <!-- <input type="text" name="tester_comment" value="<?php echo $tester_comment; ?>"> -->
                            <textarea name="dev_comment" rows="4" cols="50" ><?php echo $row['developer_comment']; ?></textarea><br>
                            <!-- <input type="submit" value="submit"><br><br> -->
                        <!-- </form> -->
                     </div>


                    <div class="mb-3">
                      <label  class="form-label">Status</label>
                      <select class="form-control" name="status" value="<?php echo $row['status']; ?>">
                        <option>select Status</option>
                         <option value="pending"<?php if ($row['status']=='pending') { echo 'selected'; } ?>>Pending</option>
                          <option value="process on" <?php if ($row['status']=='process on') { echo 'selected'; } ?>>Process On</option>
                          <option value="sucess"<?php if ($row['status']=='sucess') { echo 'selected'; } ?>>Sucess</option>
                          <option value="difer"<?php if ($row['status']=='difer') { echo 'selected'; } ?>>Difer</option>
                          <option value="not about"<?php if ($row['status']=='not about') { echo 'selected'; } ?>>Not About</option>
                      </select>
                        <?php endif; ?>

                    </div>
              
              
                    <input type="submit" name="submit" class="btn btn-primary" value="Update Project">
                    <a href="tester_project.php" class="btn btn-secondary">Cancel</a>

                
                </form>
            </div>
        </div>
    </div>
</body>
</html>


<?php include('footer.php');?>
