<?php include('../Bug_Tracking_System/links.php'); ?>
<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
<?php include('header.php');?>


<?php
include('Config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{ 
    $project_name = $_POST['project_name'];
    $ad_id = $_POST['ad_id'];
    $tester_id = $_POST['tester_id'];
    // $task_name = $_POST['task_name'];
    $create_on = $_POST['create_on'];
    $close_on = $_POST['close_on'];
    $desc = $_POST['description'];

    $status = $_POST['status'];

    
    $sql = "INSERT INTO `tester_project` (`project_name`,`ad_id`, `tester_id`,`create_on`,
    `close_on`, `description`, `status`,`active`) VALUES ('$project_name','$ad_id', '$tester_id', '$create_on','$close_on','$desc', '$status',1)";

 // $sql = "INSERT INTO `tester_project` (`project_name`,`ad_id`, `tester_id`, `task_name`,`create_on`,
 //    `close_on`, `description`, `status`) VALUES ('$project_name','$ad_id', '$tester_id', '$task_name', '$create_on','$close_on','$desc', '$status')";
 //    echo $sql; die();

      // echo $sql;die();

if ($db->query($sql) === true) {
        // echo "yes";
        echo '<script>alert("Project successfully created"); window.location.href = "tester_project.php";</script>';
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
          <a href="tester_project.php"><i class="fa-regular fa-circle-left"></i></a>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
              
               <form id="addTesterProjectForm" class="border shadow p-3" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">

                      <h2 align="center">Add Tester Project </h2>
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
                             
                                    <option value="<?php echo  $val['id'];  ?>"><?php echo  $val['project_name'];  ?>
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

                       
                     <?php 
                      $dev_id="select * from admin";
                      $query=mysqli_query($db,$dev_id);
                      if (mysqli_num_rows($query) >0)
                       {
                            ?>
                            <div class="form-group">
                                <label>Created By</label>
                                <select name="ad_id" class="form-select">
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
                    
                            <!-- tester id -->

                    <?php 
                      $tes_id="select * from tester";
                      $query=mysqli_query($db,$tes_id);
                      if (mysqli_num_rows($query) >0)
                       {
                            ?>
                            <div class="form-group">
                                <label>Assign_to Tester</label>
                                <select name="tester_id" class="form-select">
                                    <option value="">select tester to assign bug <i class="fa fa-arrow-down" aria-hidden="true"></i></option>

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

                   <!--  <div class="form-group">
                        <label for="email">Task_Name</label>
                        <input type="text" name="task_name" class="form-control" required>
                    </div> -->
                    
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
                    <a href="tester_project.php" class="btn btn-secondary">Cancel</a>

                     
                </form>
            </div>
        </div>
       
    </div>
 <?php include('footer.php');?>
 <script>
    function validateForm() {
    var project_name = document.forms["addTesterProjectForm"]["project_name"].value;
    var createdBy = document.forms["addTesterProjectForm"]["ad_id"].value;
    var assignedToTester = document.forms["addTesterProjectForm"]["tester_id"].value;
    var createOn = document.forms["addTesterProjectForm"]["create_on"].value;
    var closeOn = document.forms["addTesterProjectForm"]["close_on"].value;
    var description = document.forms["addTesterProjectForm"]["description"].value;
    var status = document.forms["addTesterProjectForm"]["status"].value;

        if (project_name == "") {
            alert("Project Name must be filled out");
            return false;
        }
        if (createdBy == "") {
            alert("Created By must be selected");
            return false;
        }
        if (assignedToTester == "") {
            alert("Assign to Tester must be selected");
            return false;
        }
        if (createOn == "") {
            alert("Create On date must be selected");
            return false;
        }
        if (closeOn == "") {
            alert("Close On date must be selected");
            return false;
        }
        if (description == "") {
            alert("Description must be filled out");
            return false;
        }
        if (status == "select Status") {
            alert("Status must be selected");
            return false;
        }
    }
</script>
