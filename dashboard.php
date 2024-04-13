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
    <?php if ($_SESSION['role'] == 'admin' ) : ?>
    <div class="col-lg-6 mb-4">
        <div class="card bg-primary text-white shadow">
            <div class="card-body">
                Admin
        <div class=" text-white">
                    <?php 
                        require_once('config.php');

                    $query="select id from admin";
                    $result=mysqli_query($db,$query);
                    $row=mysqli_num_rows($result);
                    echo $row;
                     ?>
                </div>
            </div>
        </div>
    </div>


    <div class="col-lg-6 mb-4">

        <div class="card bg-success text-white shadow">
            <div class="card-body">
            <a class="text-white"  href="developer.php">Developer</a> 

                
               <div class="text-white">
                    <?php 
                        require_once('config.php');

                    $query="select id from developer";
                    $result=mysqli_query($db,$query);
                    $row=mysqli_num_rows($result);
                    echo $row;
                     ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 mb-4">
        <div class="card bg-info text-white shadow">
            <div class="card-body">
            <a class="text-white"  href="tester.php">Tester</a> 

               <div class=" text-white">
                    <?php 
                        require_once('config.php');

                    $query="select id from tester";
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
        <?php if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'developer') : ?>
        <a href="project.php"></a>
        <div class="card bg-warning text-white shadow">
            <div class="card-body">
                <a class="text-white"  href="developer_project.php">Developer Task</a> 

               <div class=" text-white">

                    <?php 
                        require_once('config.php');

                    $query="select id from developer_project";
                    $result=mysqli_query($db,$query);
                    $row=mysqli_num_rows($result);
                    echo $row."<br>";
                     ?>
          

                </div>
            </div>
            <!-- <div align="center">
            <a href="developer_project.php" class="bg-white text-dark">view <i class="fa fa-arrow-right" aria-hidden="true"></i></a>    
            </div> -->
            

        </div>
    </div>
    <?php endif; ?>

    

    <?php if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'tester') : ?>
    <div class="col-lg-6 mb-4" >
        <a href="project.php"></a>
        <div class="card bg-dark text-white shadow">
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

</div>
					
 <?php 
include('footer.php');
 ?>
