<?php
ob_start();
session_start();
// if(!isset($_SESSION['login_user'])) {
//     header("Location: login.php");
//     exit;
// }
include('header.php');
 ?>

<div class="row">
    <div class="col-lg-6 mb-4" >
        <?php if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'tester') : ?>

            <a href="project.php"></a>
            <div class="card bg-primary text-white shadow">
                <div class="card-body">
                    <a class="text-white"  href="tester_project.php">Tester Project</a> 

                   <div class=" text-white">

                        <?php 
                            require_once('config.php');

                        $query="select id from tester_project";
                        $result=mysqli_query($db,$query);
                        $row=mysqli_num_rows($result);
                        echo $row;
                         ?>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-6 mb-4">
            <div class="card bg-secondary text-white shadow">
                <div class="card-body">
                    <a class="text-white"  href="bug.php">Bugs</a> 
                    <div class=" text-white">
                        <?php 
                            require_once('config.php');

                        $query="select id from bugs";
                        $result=mysqli_query($db,$query);
                        $row=mysqli_num_rows($result);
                        echo $row;
                         ?>
                    </div>
                </div>
            </div>
        </div> 
    <?php endif; ?>

     <div class="col-lg-6 mb-4" >
        <?php if ( $_SESSION['role'] == 'tester') : ?>
        <a href="project.php"></a>
        <div class="card bg-danger text-white shadow">
            <div class="card-body">
                <!-- <a class="text-white"  href="developer_project.php">Project Name</a>  -->
                <a class="text-white"  href="pending_tes_project.php">Pending Project:</a> 


               <div class=" text-white">

                    <?php 
                        require_once('config.php');

                    $query="SELECT * FROM tester_project WHERE status='pending'";
                    $result=mysqli_query($db,$query);
                    $row=mysqli_num_rows($result);
                    echo $row;
                     ?>

                        <?php 
                      $ad_id="select * from developer_project";
                      $query=mysqli_query($db,$ad_id);
                      if (mysqli_num_rows($query) >0)
                       {
                            ?>
                            <div class="form-group">
                                <!-- <label>Project Name :</label> -->
                               <!--  <select name="project_name" class="form-select" id="project_name">
                                    <option value="">select to project <i class="fa fa-arrow-down" aria-hidden="true"></i></option> -->

                                    <?php
                                        foreach ($query as $val)
                                            {
                                    ?>
                             
                                    <!-- <option value="<?php echo  $val['id'];  ?>"><?php echo  $val['project_name'];  ?>
                                    </option> -->
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
            </div>
        </div>
    </div>
    <?php endif; ?> 

         <div class="col-lg-6 mb-4" >
        <?php if ( $_SESSION['role'] == 'tester') : ?>
        <a href="project.php"></a>
        <div class="card bg-warning text-white shadow">
            <div class="card-body">
                <!-- <a class="text-white"  href="developer_project.php">Project Name</a>  -->
                <a class="text-white"  href="progress_tes_project.php">In Progress Project:</a> 


               <div class=" text-white">

                    <?php 
                        require_once('config.php');

                    $query="SELECT * FROM tester_project WHERE status='process on'";

                    $result=mysqli_query($db,$query);
                    $row=mysqli_num_rows($result);
                    echo $row;
                     ?>

                        <?php 
                      $ad_id="select * from developer_project";
                      $query=mysqli_query($db,$ad_id);
                      if (mysqli_num_rows($query) >0)
                       {
                            ?>
                            <div class="form-group">
                                <!-- <label>Project Name :</label> -->
                               <!--  <select name="project_name" class="form-select" id="project_name">
                                    <option value="">select to project <i class="fa fa-arrow-down" aria-hidden="true"></i></option> -->

                                    <?php
                                        foreach ($query as $val)
                                            {
                                    ?>
                             
                                    <!-- <option value="<?php echo  $val['id'];  ?>"><?php echo  $val['project_name'];  ?>
                                    </option> -->
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
            </div>
        </div>
    </div>
    <?php endif; ?> 

    <div class="col-lg-6 mb-4" >
        <?php if ( $_SESSION['role'] == 'tester') : ?>
        <a href="project.php"></a>
        <div class="card bg-success text-white shadow">
            <div class="card-body">
                <!-- <a class="text-white"  href="developer_project.php">Project Name</a>  -->
                <a class="text-white"  href="done_tes_project.php">Done Project:</a> 


               <div class=" text-white">

                    <?php 
                        require_once('config.php');
                    $query="SELECT * FROM tester_project WHERE status='sucess'";

                    
                    $result=mysqli_query($db,$query);
                    $row=mysqli_num_rows($result);
                    echo $row;
                     ?>

                        <?php 
                      $ad_id="select * from developer_project";
                      $query=mysqli_query($db,$ad_id);
                      if (mysqli_num_rows($query) >0)
                       {
                            ?>
                            <div class="form-group">
                                <!-- <label>Project Name :</label> -->
                               <!--  <select name="project_name" class="form-select" id="project_name">
                                    <option value="">select to project <i class="fa fa-arrow-down" aria-hidden="true"></i></option> -->

                                    <?php
                                        foreach ($query as $val)
                                            {
                                    ?>
                             
                                    <!-- <option value="<?php echo  $val['id'];  ?>"><?php echo  $val['project_name'];  ?>
                                    </option> -->
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
            </div>
        </div>
    </div>
    <?php endif; ?>
          
 <?php 
include('footer.php');
 ?>
