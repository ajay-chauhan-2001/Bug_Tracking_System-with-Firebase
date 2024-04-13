
 <?php
        include('../Bug_Tracking_System/links.php');
        ?>
<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <?php include('header.php');
            include('Config.php');?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>DataTables example - Bootstrap 3</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">

  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>

  <script type="text/javascript">
  
$(document).ready(function() {
  $('#datatable').DataTable();
} );

  </script>
  <style type="text/css">
    .dataTables_info{
      margin-right: 35px;
    }
    .dataTables_filter{
      margin-left: 300px;
      margin-right: 150px;

    }
    .dataTables_length{
      margin-right: 290px;

    }
     #datatable_paginate{
      float: right !important;
    }
    #datatable_wrapper .row:nth-child(3){
       width: -webkit-fill-available;
    }
  </style>
</head>
<body>
  <div class="container-fluid">
      <h1><i class="fa fa-list"></i> Tester Project List</h1>

      <div class="card shadow mb-4">   
          <div class="card-body">
              <div class="table-responsive">
                    <!-- <button type="submit" class="btn btn-primary my-5" name="submit"><a href="add_project.php" class="text-white"><i class="fa fa-plus"></i>Add Developer Project</a>    
                    </button> -->
                    <!-- <button type="submit" class="btn btn-primary my-5" name="submit"><a href="add_developer_project.php" class="text-white"><i class="fa fa-plus"></i>Add Developer Project</a>    
                    </button> -->
                   <?php if ($_SESSION['role'] == 'admin') : ?>

                     <button type="submit" class="btn btn-primary my-3" name="submit"><a href="add_tester_project.php" class="text-white"><i class="fa fa-plus"></i>Add Tester Project</a>    
                    </button>
                    <?php endif; ?>

                  <table id="datatable" class="table table-striped table-bordered" cellspacing="0"           width=" 100%">
                      <!-- <a href="add_developer1.php">Add New Developer</a> -->

                      <thead>
                        <tr>
                          <th scope="col">Sr no</th>
                          <th scope="col">Created By</th>
                          <th scope="col">Project Name</th>
                          <th scope="col">Assign to Tester</th>
                          <!-- <th scope="col">Task Name</th> -->
                          <th scope="col">Create On</th>
                          <th scope="col">Due Date</th>
                          <th scope="col">Description</th>
                          <th scope="col">Developer Comment</th>
                          <th scope="col">Tester Comment</th>
                          <th scope="col">Developer status</th>
                          <th scope="col">Tester status</th>

                          <th scope="col">Action</th>
                        </tr>
                      </thead>

                      <tbody>

                      
                        <?php

                          $sql="select * from tester_project";
                          $result = mysqli_query($db,$sql);
                          
                        
                              if ($result->num_rows > 0) {
                                  $i=1;
                                  while ($row = $result->fetch_assoc()) 
                                  { 
                                    $tes_id=$row['tester_id'];
                                    $ad_id=$row['ad_id'];
                                    $pro_id=$row['project_name'];
                                    $comment_dev=$row['id'];
                                    $status=$row['id'];

                                     
                                    $res="select * from tester where id= '$tes_id'";
                                    $ad="select * from admin where id= '$ad_id'";
                                    $pro="select * from developer_project where id= '$pro_id'";
                                    $dev_comment="select * from developer_project where id= '$comment_dev' ";
                                     $status_sql="select * from developer_project where id= '$status' and  active=1";
                                   
                                    $query=mysqli_query($db,$res);
                                    $ad_query=mysqli_query($db,$ad);
                                    $pro_query=mysqli_query($db,$pro);
                                    $dev_query=mysqli_query($db,$dev_comment);
                                    $status_query=mysqli_query($db,$status_sql);

                                    ?>
                                      <tr>
                                          <td><?php echo $i++; ?></td>
                                          <td>
                                            <?php foreach ($ad_query as $ad_val) {echo $ad_val['name']; }  ?>
                                          </td>

                                          <td>
                                            <?php foreach ($pro_query as $ad_val) {echo $ad_val['project_name']; }  ?>
                                          </td>
                                          <td>
                                            <?php foreach ($query as $val) {echo $val['name']; }  ?>
                                          </td>
                                          <!-- <td><?php echo $row['task_name']; ?></td> -->
                                          <td><?php echo $row['create_on']; ?></td>
                                          <td><?php echo $row['close_on']; ?></td>
                                          <td><?php echo $row['description']; ?></td>
                                          <td>
                                                <?php foreach ($dev_query as $val) {
                                                  echo $val['tester_comment']; 

                                                }  ?>
                                          </td>
                                          <td><?php echo $row['developer_comment']; ?></td>
                                          
                                           <td>
                                         <?php foreach ($status_query as $val) {echo $val['status']; }  ?>
                                        
                                      </td>
                                          <td><?php echo $row['status']; ?></td>

                                          
                                           <td>
                                              <a href="edit_tester_project.php?id=<?php echo $row['id']; ?>"style="color: #3260cb !important;"><i class="fa fa-edit"></i></a>
                                              <?php if ($_SESSION['role'] == 'admin') : ?>
                                              <a href="delete_tester_project.php?id=<?php echo $row['id']; ?>"style="color: #3260cb !important;"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                              <?php endif; ?>

                                          </td>
                                      </tr>
                                  <?php }
                              } else {
                                  echo "<tr><td colspan='4'>No Projects Found</td></tr>";
                              }
                              ?>
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>
</body>
</html>



 <?php include('footer.php');?>