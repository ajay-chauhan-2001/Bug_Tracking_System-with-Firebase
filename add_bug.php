<?php include('../Bug_Tracking_System/links.php'); ?>
<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
<?php include('header.php');?>


<?php
include('Config.php');

 if (isset($_POST['submit'])) 
 {
   $project_id = $_POST['project_id'];
    $admin_id = $_POST['admin_id'];
    $dev_id = $_POST['devloper_id'];
    // $tester_id = $_POST['tester_id'];
    $bug_name = $_POST['bug_name'];
    $create_on = $_POST['create_on'];
    $close_on = $_POST['close_on'];

    $page_url = $_POST['page_url'];
    $description = $_POST['description'];
    $status = $_POST['status'];
     $image = $_FILES['image']['name'];

    $target_dir = "image/";
    $target_file =$target_dir. md5(uniqid($_FILES["image"]["name"], true)); 
  //  $sql = "INSERT INTO `bugs` (`admin_id`, `project_id`, `tester_id`,`bug_name`, `status`, `create_on`,`close_on`, `dev_id`, `page_url`, `description`,`image`)
  // VALUES ('$admin_id', '$project_id', '$tester_id','$bug_name', '$status', '$create_on', '$close_on', '$dev_id', '$page_url', '$description','$image')";

   $sql = "INSERT INTO `bugs` (`admin_id`, `project_id`,`bug_name`, `status`, `create_on`,`close_on`, `dev_id`, `page_url`, `description`,`image`,`active`)
    VALUES ('$admin_id', '$project_id','$bug_name', '$status', '$create_on', '$close_on', '$dev_id', '$page_url', '$description','$image',1)";

      // echo $sql;die();

// echo "hello"."<br>";

if ($db->query($sql) === true) 
    {
        // echo "yes";
        echo '<script>alert("Bug created successfully"); window.location.href = "bug.php";</script>';
    } else 
    {
        // echo "no";
        echo '<script>alert("Error: ' . $db->error . '");</script>';
    }

    
 }
?>

 <!-- <?php
$projectDevelopers = array(
    // "Project 1" => "Developer 1",
    // "Project 2" => "Developer 2"
);

if(isset($_POST['project_id']) && isset($projectDevelopers[$_POST['project_id']])) {
    $developer = $projectDevelopers[$_POST['project_id']];
} else {
    $developer = ""; // Default value if no project is selected or mapping is not found
}
?>
 -->


<div class="container mt-5">
<!-- <button onclick="history.back()">Go Back</button> -->
 <div class="w3-padding-64 w3-content w3-text-white" id="contact"> 
          <a href="bug.php" ><i class="fa-regular fa-circle-left"></i></a>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
              
                <form id="addbug" class="border shadow p-3" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
                      <h2 align="center">Add New Bug </h2>

                      <!-- project id -->
                      <?php 
                      $ad_id="select * from developer_project";
                      $query=mysqli_query($db,$ad_id);
                      if (mysqli_num_rows($query) >0)
                       {
                            ?>
                            <div class="form-group">
                                <label>Project Name :</label>
                                <select name="project_id" class="form-select" id="project_id">
                                    <option value="">select to project <i class="fa fa-arrow-down" aria-hidden="true"></i></option>

                                    <?php
                                        foreach ($query as $val)
                                            {
                                    ?>
                             
                                    <option value="<?php echo  $val['id']; ?>"><?php echo  $val['project_name'];  ?>
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

                        <label for="developer">Developer Name:</label>
                        <input type="text" class="form-control" id="dev_id" name="dev_id" >
                         <input type="hidden" class="form-control" id="devloper_id" name="devloper_id"><br>
                       
            
                       <script>
                            $(document).ready(function() {
                                $('#project_id').on('change', function() {
                                    var dev_id = this.value;
                                    $.ajax({
                                        url: "get_developer.php",
                                        type: "POST",
                                        data: {
                                            dev_id: dev_id
                                        },
                                        cache: false,
                                        success: function(result) {
                               var developerData = JSON.parse(result);
                              var developerId = developerData.id;
                              var developerName = developerData.name;
                              document.getElementById("dev_id").value = developerName;
                              document.getElementById("devloper_id").value = developerId;
                                           
                                        }
                                    });
                                });
                            });
                       </script>
                         <!-- admin id -->

                     <?php 
                      $ad_id="select * from admin";
                      $query=mysqli_query($db,$ad_id);
                      if (mysqli_num_rows($query) >0)
                       {
                            ?>
                            <div class="form-group">
                                <label>Created By</label>
                                <select name="admin_id" class="form-select">
                                    <option value="">select to  <i class="fa fa-arrow-down" aria-hidden="true"></i></option>

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

                    <!-- <?php 
                      $tes_id="select * from tester";
                      $query=mysqli_query($db,$tes_id);
                      if (mysqli_num_rows($query) >0)
                       {
                            ?>
                            <div class="form-group">
                                <label>Assign_to Tester</label>
                                <select name="tester_id" class="form-select" required>
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
                      
                       ?> -->
                    
                    <div class="form-group">
                        <label>Bug Name :</label>
                        <textarea  type="text" name="bug_name" class="form-control"></textarea>
                        <!-- <input type="text" name="bug_name" class="form-control" required> -->
                    </div>

                    <div class="form-group">
                        <label >Page Url</label>
                        <input type="text" name="page_url" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="">Create On</label>
                        <input type="date" name="create_on" class="form-control">
                    </div>

                     <div class="form-group">
                        <label for="">Close On</label>
                        <input type="date" name="close_on" min="<?php echo date("Y-m-d"); ?>" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea type="text" name="description" class="form-control"></textarea>
                        
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Status</label>
                        <select class="form-select" name="status">
                          <option>select Status</option>
                          <option value="new">New</option>
                          <option value="process on">Process On</option>
                          <option value="defer">Difer</option>
                          <option value="qaready">Qa ready</option>

                          <option value="fail">Fail</option>
                          <option value="sucess">Sucess</option>


                        </select>
                    </div>
                     <div class="form-group">
                        <input type="file" name="image" class="form-control">
                    </div>
                    
                    

                    <button type="submit" class="btn btn-primary" name="submit">Save</button>
                    <a href="bug.php" class="btn btn-secondary">Cancel</a>

                     
                </form>
            </div>
        </div>
       
    </div>
 <?php include('footer.php');?>
 <script>
        function validateForm() {
            var prnm = document.forms["addbug"]["project_id"].value;
            var dev_id = document.forms["addbug"]["dev_id"].value;
            // var admin_id = document.forms["addbug"]["admin_id"].value;
            var bug_name = document.forms["addbug"]["bug_name"].value;
            // var page_url = document.forms["addbug"]["page_url"].value;
            var createOn = document.forms["addbug"]["create_on"].value;
            var closeOn = document.forms["addbug"]["close_on"].value;
            var description = document.forms["addbug"]["description"].value;
            var status = document.forms["addbug"]["status"].value;
            // var image = document.forms["addbug"]["image"].value;
            
            if (prnm == "") {
                alert("Project name is required");
                return false;
            }

            // if (admin_id == "") {
            //     alert("Created by is required");
            //     return false;
            // }

            if (bug_name == "") {
                alert("Bug name is required");
                return false;
            }

            // if (page_url == "") {
            //     alert("page url is required");
            //     return false;
            // }

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

        // if (image == "") 
        // {
        //     alert("Image must be selected");
        //     return false;
        // }
    }

    </script>
</body>

<style type="text/css">
    a{
    
    color: #696cff;
    font-size: x-large;
}

</style>