
<?php
// if(!isset($_SESSION['login_user'])) {
//     header("Location: login.php");
//     exit;
// }
include('header.php');
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project name list</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>



<script language="JavaScript" src="https://code.jquery.com/jquery-1.11.1.min.js" type="text/javascript"></script>
<!-- <script language="JavaScript" src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js" type="text/javascript"></script> -->
<!-- <script language="JavaScript" src="https://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script> -->
<!-- <link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"> -->

<!-- <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.css"> -->
<body>
    <h1><i class="fa fa-list"></i>  Project Name List</h1>

  <table id="datatable" class="table table-striped table-bordered" cellspacing="0"           width=" 100%">
      <!-- <a href="add_developer1.php">Add New Developer</a> -->

      <thead>
        <tr>
          <th scope="col">Sr no</th>
          <!-- <th scope="col">Created By</th> -->
          <th scope="col">Project Name</th>
          <th scope="col">Assign to Developer</th>
          <!-- <th scope="col">Task Name</th> -->
          <!-- <th scope="col">Create On</th>
          <th scope="col">Close On</th>
          <th scope="col">Description</th>
          <th scope="col">Tester Comment</th>
          <th scope="col">Developer Comment</th>

          <th scope="col">status</th>

          <th scope="col">Operations</th> -->


        </tr>
      </thead>

      <tbody>

      
        <?php

          $sql="select * from developer_project";
          $result = mysqli_query($db,$sql);
          
        
              if ($result->num_rows > 0) {
                  $i=1;
                  while ($row = $result->fetch_assoc()) 
                  { 
                    // $tes_id=$row['tester_id'];
                    // $ad_id=$row['ad_id'];
                    $pro_id=$row['id'];
                    $dev_id=$row['dev_id'];



                    // $res="select * from developer where id= '$tes_id'";
                    // $ad="select * from admin where id= '$ad_id'";
                    $pro="select project_name from developer_project where id= '$pro_id'";
                    $dev="select name from developer where id= '$dev_id'";


                    // $query=mysqli_query($db,$res);
                    // $ad_query=mysqli_query($db,$ad);
                    $pro_query=mysqli_query($db,$pro);
                    $dev_query=mysqli_query($db,$dev);





                    ?>
                      <tr>
                           <td><?php echo $i++; ?></td>
                         <!--  <td>
                            <?php foreach ($ad_query as $ad_val) {echo $ad_val['name']; }  ?>
                          </td> -->

                          <td>
                            <?php foreach ($pro_query as $ad_val) {echo $ad_val['project_name']; }  ?>
                          </td>
                          <td>
                              <?php foreach ($dev_query as $val) {echo $val['name']; }  ?>
                            </td>
                          <!-- <td>
                            <?php foreach ($query as $val) {echo $val['name']; }  ?>
                          </td> -->
                          <!-- <td><?php echo $row['task_name']; ?></td> -->
                          <!-- <td><?php echo $row['create_on']; ?></td>
                          <td><?php echo $row['close_on']; ?></td>
                          <td><?php echo $row['description']; ?></td>
                          <td><?php echo $row['tester_comment']; ?></td>
                          <td><?php echo $row['developer_comment']; ?></td>

                          <td><?php echo $row['status']; ?>
                            
                          </td>

                          
                           <td>
                              <a href="edit_tester_project.php?id=<?php echo $row['id']; ?>"><i class="fa fa-edit text-dark"></i></a>
                              <?php if ($_SESSION['role'] == 'admin') : ?>
                              <a href="delete_tester_project.php?id=<?php echo $row['id']; ?>"><i class="fa fa-trash text-dark" aria-hidden="true"></i></a>
                              <?php endif; ?>

                          </td> -->
                      </tr>
                  <?php }
              } else {
                  echo "<tr><td colspan='4'>No projects found</td></tr>";
              }
              ?>
      </tbody>
  </table>
</body>
</html>
                       
 <?php include('footer.php'); ?>