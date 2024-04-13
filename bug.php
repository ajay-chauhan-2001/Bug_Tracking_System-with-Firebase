<?php include('../Bug_Tracking_System/links.php'); ?>
 <?php 
 include('header.php');
 include('Config.php');
 ?>

<!DOCTYPE html>
<html lang="en">
<head>  
  <title> Bootstrap 4 Footer with Social icons </title>  
  <meta charset="utf-8">  
  <meta name="viewport" content="width=device-width, initial-scale=1">  
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bug CRUD</title>
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
      <h1><i class="fa fa-list "></i> Bug List</h1>
        
            
              
              <!-- <a href="add_bug1.php">bugs</a> -->

               <div class="card shadow mb-4"> 

                <div class="card-body">

                    <div class="table-responsive">
                        <button type="submit" class="btn btn-primary my-3" name="submit"><a href="add_bug.php" class="text-white"><i class="fa fa-plus"></i>Add Bug</a>    
              </button>

                        <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">

                          <thead>
                            <tr>
                              <th scope="col">Sr no</th>
                              <th scope="col">Created By</th>
                              <th scope="col">Project Name</th>
                              <!-- <th scope="col">Assign to Tester</th> -->
                              <th scope="col">create BY Developer Name</th>
                              <th scope="col">Bug Name</th>
                              <th scope="col">Page Url</th>
                              <th scope="col">Create Date</th>
                              <th scope="col">Due Date</th>
                              <th scope="col">Description</th>
                              <th scope="col">status</th>
                              <th scope="col">Image</th>

                              <th scope="col">Action</th>


                            </tr>
                          </thead>

                          <tbody>

                          
                            <?php

                              $sql="select * from bugs where active=1";
                              $result = mysqli_query($db,$sql);
                              
                            
                                  if ($result->num_rows > 0) {
                                      $i=1;
                                      while ($row = $result->fetch_assoc()) 
                                      { 
                                        $ad_id=$row['admin_id'];
                                        $tes_id=$row['tester_id'];
                                        $dev_id=$row['dev_id'];
                                        $pro_id=$row['project_id'];

                                        $ad="select * from admin where id= '$ad_id'";
                                        $tes="select * from tester where id= '$tes_id'";
                                        $dev="select * from developer where id= '$dev_id' ";
                                        $pro="select * from developer_project where id= '$pro_id'";

                                        $ad_query=mysqli_query($db,$ad);
                                        $tes_query=mysqli_query($db,$tes);
                                        $dev_query=mysqli_query($db,$dev);
                                        $pro_query=mysqli_query($db,$pro);

                                        ?>
                                          <tr>
                                              <td><?php echo $i++; ?></td>

                                              <td>
                                                <?php foreach ($ad_query as $ad_val) {echo $ad_val['name']; }  ?>
                                              </td>

                                              <td>
                                                <?php foreach ($pro_query as $pro_val) {echo $pro_val['project_name']; }  ?>
                                                
                                              </td>

                                              <!-- <td>
                                                <?php foreach ($tes_query as $val) {echo $val['name']; }  ?>
                                              </td> -->

                                              <td>
                                                <?php foreach ($dev_query as $val) {echo $val['name']; }  ?>

                                              </td>
                                              <td><?php echo $row['bug_name']; ?></td>
                                              <td><?php echo $row['page_url']; ?></td>
                                              <td><?php echo $row['create_on']; ?></td>
                                              <td><?php echo $row['close_on']; ?></td>

                                              <td><?php echo $row['description']; ?></td>
                                              <td><?php echo $row['status']; ?></td>

                                              <td>
                                                      <img src="../Bug_Tracking_System/image/<?php echo $row['image']; ?>" width="50" height="50">
                                              </td>

                                              <td>
                                                  <a href="edit_bug.php?id=<?php echo $row['id']; ?>"
                                                    style="color: #3260cb !important;"><i class="bx bx-edit"></i></a>
                                                  <a style="color: #3260cb !important;" href="delete_bug.php?id=<?php echo $row['id']; ?>">
                                                    <i class="fa fa-trash " aria-hidden="true"></i></a>
                                              </td>
                                          </tr>
                                      <?php }
                                  } else {
                                      echo "<tr><td colspan='4'>No bugs found</td></tr>";
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
<?php include('footer.php'); ?>
