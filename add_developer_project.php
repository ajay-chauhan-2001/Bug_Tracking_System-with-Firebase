<?php include('../Bug_Tracking_System/links.php'); ?>
<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
<?php include('header.php');?>


<?php
include('Config.php');

 if (isset($_POST['submit'])) 
 {
    $project_name = $_POST['project_name'];
    $ad_id = $_POST['ad_id'];
    $dev_id = $_POST['dev_id'];
    $task_name = $_POST['task_name'];
    $bug_id = $_POST['bug_id'];
    // echo  $bug_id; die();
    $create_on = $_POST['create_on'];
    $close_on = $_POST['close_on'];
    $desc = $_POST['description'];

    $status = $_POST['status'];

    
    $sql = "INSERT INTO `developer_project` (`project_name`,`ad_id`, `dev_id`, `task_name`, `bug_id`,`create_on`,
    `close_on`, `description`, `status`,`active`) VALUES ('$project_name','$ad_id', '$dev_id', '$task_name','$bug_id', '$create_on','$close_on','$desc', '$status',1)";

    // $sql = "INSERT INTO `developer_project` (`project_name`,`ad_id`, `dev_id`, `task_name`,`create_on`,
    // `close_on`, `description`, `status`) VALUES ('$project_name','$ad_id', '$dev_id', '$task_name', '$create_on','$close_on','$desc', '$status')";

      // echo $sql;die();

// echo "hello"."<br>";
    
if ($db->query($sql) === true) {
        // echo "yes";
        echo '<script>alert("Project created successfully"); window.location.href = "developer_project.php";</script>';
    } else 
    {
        // echo "no";
        echo '<script>alert("Error: ' . $db->error . '");</script>';
    }

 }
?>

<style type="text/css">
    a{
    
    color: #696cff;
    font-size: x-large;
}

</style>

<div class="container mt-5">
<!-- <button onclick="history.back()">Go Back</button> -->
 <div class="w3-padding-64 w3-content w3-text-grey" id="contact"> 
          <a href="developer_project.php"><i class="fa-regular fa-circle-left"></i></a>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
              
                <form  class="border shadow p-3" method="post" enctype="multipart/form-data">
                      <h2 align="center">Add Developer Project </h2>
                    <div class="form-group">
                        <label for="">Project Name</label>
                        <input type="text" name="project_name" class="form-control"required>
                    </div>

                     <?php 
                      $dev_id="select * from admin";
                      $query=mysqli_query($db,$dev_id);
                      if (mysqli_num_rows($query) >0)
                       {
                            ?>
                            <div class="form-group">
                                <label>Created By</label>
                                <select name="ad_id" class="form-select" required>
                                    <option value="">select created person to <i class="fa fa-arrow-down" aria-hidden="true"></i></option>

                                    <?php
                                        foreach ($query as $val)
                                            {
                                    ?>
                             
                                    <option value="<?php echo  $val['id'];  ?>"><?php echo  $val['name'];  ?>
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
                    
                            <!-- developer id -->
                      <?php 
                      $dev_id="select * from developer";
                      $query=mysqli_query($db,$dev_id);
                      if (mysqli_num_rows($query) >0)
                       {
                            ?>
                            <div class="form-group">
                                <label>Assign_to Developer</label>
                                <select name="dev_id" class="form-select" required>
                                    <option value="">select developer to assign project <i class="fa fa-arrow-down" aria-hidden="true"></i></option>

                                    <?php
                                        foreach ($query as $row)
                                            {
                                    ?>
                             
                                    <option value="<?php echo  $row['id'];  ?>"><?php echo  $row['name'];  ?>
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
                        <label for="email">Task_Name</label>
                        <input type="text" name="task_name" class="form-control" required>
                    </div>
                    
                     <div class="form-group">
                        <label for="email">bug</label>
                        <input type="text" name="bug_id" class="form-control" >
                    </div>
                    
                    <div class="form-group">
                        <label for="">Create On</label>
                        <input type="date" name="create_on" class="form-control"><br>
                    </div>

                    <div class="form-group">
                        <label for="">Close On</label>
                        <input type="date" name="close_on" min="<?php echo date("Y-m-d"); ?>" class="form-control"><br>
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea type="text" name="description" class="form-control"></textarea>
                        <br>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Status</label>
                        <select class="form-select" name="status">
                          <option>select Status</option>
                          <option value="pending">Pending</option>
                          <option value="process on">Process On</option>
                          <option value="sucess">Sucess</option>
                          <option value="defer">Difer</option>
                          <option value="not about">Not About</option>

                        </select>
                    </div>
                    
                    <button type="submit" class="btn btn-primary" name="submit">Save</button>
                    <a href="developer_project.php" class="btn btn-secondary">Cancel</a>

                     
                </form>
            </div>
        </div>
       
    </div>
 <?php include('footer.php');?>