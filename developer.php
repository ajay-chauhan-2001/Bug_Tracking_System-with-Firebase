<?php
        include('../Bug_Tracking_System/links.php');
        session_start();
        
// if (!isset($_SESSION['user_id'])) {
//     header("Location: login.php");
//     exit;
// }

        ?>
<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <?php include('header.php');
            include('Config.php');?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Developer CRUD</title>
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
      <div>
       <!--  <div class="card-header">
      <h1><i class="fa fa-user"></i>Developer List</h1>
          
        </div> -->
      </div>
      <h1><i class="fa fa-user"></i> Developer List</h1>
      
      <div class="card shadow mb-4">
        
        <div class=" card-body">
         
          <div  class="table-responsive">
            <button type="submit" class="btn btn-primary my-3" name="submit"><a href=" add_developer.php" class="text-white"><i class="fa fa-plus "></i>Add Developer</a>    
            </button>
            <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th scope="col">Sr no</th>
                          <th scope="col">Name</th>
                          <th scope="col">Email</th>
                          <th scope="col">Age</th>
                          <th scope="col">Gender</th>
                          <th scope="col">Mobile</th>
                          <th scope="col">Skill</th>

                          <th scope="col">Image</th>
                          <th scope="colspan">Action</th>


                </tr>
              </thead>
              <tbody>

              
              <?php

                $sql="select * from developer where active = 1";
                $result = mysqli_query($db,$sql);
                
              
                    if ($result->num_rows > 0) {
                        $i=1;
                        while ($row = $result->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['age']; ?></td>
                                        <td><?php echo $row['gender']; ?></td>
                                        <td><?php echo $row['number']; ?></td>
                                        <td><?php echo $row['skill']; ?></td>


                                        <td>
                                          <img src="image/<?php echo $row['image']; ?>" width="50" height="50">
                                        </td>
                                         <td>
                                            <a href="edit_developer.php?id=<?php echo $row['id']; ?>"style="color: #3260cb !important;"><i class="fa fa-edit"></i></a>
                                            <a href="delete_developer.php?id=<?php echo $row['id']; ?>"style="color: #3260cb !important;"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        </td>
                            </tr>
                        <?php }
                    } else {
                        echo "<tr><td colspan='4'>No developers found</td></tr>";
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
