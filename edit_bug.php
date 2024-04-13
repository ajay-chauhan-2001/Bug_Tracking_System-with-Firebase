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
$sql="select * from bugs where id=$id";
$result=mysqli_query($db,$sql);
$row=mysqli_fetch_array($result);

$project_id = $row['project_id'];
// echo $project_name."<br>";

$dev_id = $row['dev_id'];
// echo $dev_id."<br>";

$page_url = $row['page_url'];
// echo $task_name."<br>";

$create_on = $row['create_on'];
// echo $create_on."<br>";
$close_on = $row['close_on'];


$bug_name = $row['bug_name'];
// echo $bug_name."<br>";die();
// $et= $_POST['estimated_time'];

$description = $row['description'];
// echo  $desc;
$status = $row['status'];
// echo $status."<br>";


if (isset($_POST["submit"]))
{
   $project_id = $_POST['project_id'];
    // $admin_id = $_POST['admin_id'];
    $dev_id = $_POST['dev_id'];
    // $tester_id = $_POST['tester_id'];
    $bug_name = $_POST['bug_name'];
    $create_on = $_POST['create_on'];
    $close_on = $_POST['close_on'];
    $page_url = $_POST['page_url'];
    $description = $_POST['description'];
    $status = $_POST['status'];

    if ($_FILES["image"]["name"]) {
        $targetDir = "image/";
        $fileName = basename($_FILES["image"]["name"]);

        $targetFilePath = $targetDir . $fileName;
        move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath);

        // Update developer information with new image
       $sql ="UPDATE `bugs` SET  `project_id`='$project_id',`dev_id`='$dev_id',`bug_name`='$bug_name',`page_url`='$page_url',`create_on`='$create_on',`close_on`='$close_on',`description`='$description',`status`='$status',`image`='$fileName' WHERE id=$id";
    } else {
        // Update developer information without changing the image
       $sql ="UPDATE `bugs` SET  `project_id`='$project_id',`dev_id`='$dev_id',`bug_name`='$bug_name',`page_url`='$page_url',`create_on`='$create_on',`close_on`='$close_on',`description`='$description',`status`='$status' WHERE id=$id";
    }


  // $sql ="UPDATE `bugs` SET  `project_id`='$project_id',`dev_id`='$dev_id',`page_url`='$page_url',`create_on`='$create_on',`description`='$description',`status`='$status',`image`='$image' WHERE id=$id";
    // echo $sql;die();
  $result = mysqli_query($db ,$sql);
  if($result){
//   echo "data  updated successfully ";
    echo '<script>alert("Data updated successfully"); window.location.href = "bug.php";</script>';

  // header("location:bug.php");
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
    <title>Edit Bug</title>
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
              <a href="bug.php"><i class="fa-regular fa-circle-left"></i></a>
        </div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form class="border shadow p-3" method="post" action="edit_bug.php?id=<?php echo  $id;?>" enctype="multipart/form-data">
                        <h2 align="center">Edit Bug Details</h2>
                         <!-- <input type="hidden" name="id" class="form-control" value="<?php echo $row['id']; ?>"> -->

                         <!-- project id  -->
                         <?php 
                          $project="select * from developer_project";
                          $query=mysqli_query($db,$project);
                          if (mysqli_num_rows($query) > 0)
                           {
                                ?>
                                <div class="form-group">
                                    <label>Project Name</label>
                                    <select name="project_id" id="" class="form-control">
                                        <option value="">select developer to project <i class="fa fa-arrow-down" aria-hidden="true"></i></option>

                                        <?php
                                            foreach ($query as $val)
                                                {
                                        ?>
                                 
                                        <option value="<?php echo  $val['id']; ?>" <?php if ($val['id']==  $row['project_id']) { echo 'selected'; } ?>><?php echo  $val['project_name'];  ?>
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
                        
                           <!-- tester id -->

                          <!--   <?php 
                          $project="select * from tester";
                          $query=mysqli_query($db,$project);
                          if (mysqli_num_rows($query) > 0)
                           {
                                ?>
                                <div class="form-group">
                                    <label>Select Tester</label>
                                    <select name="tester_id" id="" class="form-control">
                                        <option value="">select tester to assign bug <i class="fa fa-arrow-down" aria-hidden="true"></i></option>

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
                          
                           ?> -->
                        

                        <!-- developer id -->

                         <?php 
                          $project="select * from developer";
                          $query=mysqli_query($db,$project);
                          if (mysqli_num_rows($query) > 0)
                           {
                                ?>
                                <div class="form-group">
                                    <label>Select Developer</label>
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
                            <label for="">Bug Name </label>
                            <input type="text" name="bug_name" class="form-control"value="<?php echo $row['bug_name']; ?>">
                        </div>

                        <div class="form-group">
                            <label for="">Create On</label>
                            <input type="date" name="create_on" class="form-control"value="<?php echo $row['create_on']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Close On</label>
                            <input type="date" name="close_on" min="<?php echo date("Y-m-d"); ?>" class="form-control"value="<?php echo $row['close_on']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Page Url</label>
                            <input type="text" name="page_url" class="form-control"value="<?php echo $row['page_url']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea type="text" name="description" class="form-control"value=""><?php if (!empty($description)) echo $description; ?></textarea>
                            
                        </div>

                         <!-- <div class="form-group">
                            <label for="">Description</label>
                            <textarea type="text" name="description" class="form-control"value=" <?php if ($row['description']==  $row['description']) { echo 'selected'; } ?>>"></textarea>
                            
                        </div> -->

                        <div class="mb-3">
                    <label f class="form-label">Status</label>
                    <select class="form-control" name="status" value="<?php echo $row['status']; ?>">
                      <option>select Status</option>
                       <option value="pending"<?php if ($row['status']=='pending') { echo 'selected'; } ?>>Pending</option>
                        <option value="process on" <?php if ($row['status']=='process on') { echo 'selected'; } ?>>Process On</option>
                        <option value="sucess"<?php if ($row['status']=='sucess') { echo 'selected'; } ?>>Sucess</option>
                        <option value="difer"<?php if ($row['status']=='difer') { echo 'selected'; } ?>>Difer</option>
                         <option value="not about"<?php if ($row['status']=='not about') { echo 'selected'; } ?>>Not About</option>
                    </select>
                  </div>
                   <label>Current Image:</label><br>
                        <img src="image/<?php echo $row['image']; ?>" width="50" height="50"><br>
                        <label>New Image:</label><br>
                        <input type="file" name="image"><br><br>

                        <input type="submit" name="submit" class="btn btn-primary" value="Update">
                        <a href="bug.php" class="btn btn-secondary">Cancel</a>



                        
                        
                    </form>
                </div>
            </div>
  </div>
</body>
</html>


<?php include('footer.php');?>
