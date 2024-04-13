<?php
session_start();
    include('Config.php');
   include('header.php');
  
  
       $id = $_GET['id'];
       // echo $id;die();

  $sql = "SELECT * FROM users WHERE id = '$id'";
  $result = mysqli_query($db, $sql);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

  $existing_image = $row['image'];
  if(isset($_POST['Update']))
    { 
       // $id = $_GET['id'];
       // echo $id;die();

        $name = $_POST['name']; 
        // echo $name;die();
        $email = $_POST['email']; 
        // echo $email;die();

        $password = $_POST['password'];
        // echo $password;die();

        $number = $_POST['number'];
        $birth_date = $_POST['birth_date'];

        if($_FILES["image"]["name"])
        {
          $filename = $_FILES["image"]["name"];
          $tempname = $_FILES["image"]["tmp_name"];
          $folder = "image/".$filename;
        // echo $folder;die();

        }
        else
        {
          $filename = $existing_image;
        }
        
     
        $sql = "update `users` set `name`='$name',`email`='$email',`image`='$filename',`password`='$password',`number` = '$number',`birth_date` = '$birth_date' where id = '$id'";
        
        if(mysqli_query($db,$sql))
        {
                 echo "<h3> Data Updated successfully!</h3>";

            if($_FILES["image"]["name"])
            {
              move_uploaded_file($tempname,$filename);
            }
            
                 // echo "<h3> Image uploaded successfully!</h3>";
                 // header("location:dashboard.php");
               // echo "inserted";
               echo "<script>
                window.loacation('dashboard.php');
               </script>";
        }
       else
        {
            echo "something went wrong. please try again later";
        }
      }  
  ?>
  
<html>
<head>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
<div class="container-xl px-4 mt-4">
    <div class="row">
        <div class="col-xl-4">
            <div class="card mb-4 mb-xl-0">
               <div class="card-header">Profile Picture</div>
                <div class="card-body text-center">
                  <img class="rounded-circle mt-5" src="image/<?php echo $row['image'];?>">
                 <!--  <span class="font-weight-bold"><h1><?php echo $row['name'];?></h1></span> -->

                </div>
            </div>
        </div>

        <!-- // -->
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Edit Profile</div>
                <div class="card-body">
                     <form  action="edit_profile.php?id=<?php echo  $id;?>" method="post" enctype="multipart/form-data">
                        
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName">Name</label>
                                <input type="name" class="form-control" name="name" placeholder="enter  your name" value="<?php echo $row['name'] ;?>">
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName">Email Id</label>
                               <input type="email" class="form-control" name="email" placeholder="enter email id" value="<?php echo $row['email'] ;?>">
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputOrgName">Password</label>
                                <input type="text" class="form-control"  name="password" placeholder="enter Password" value="<?php echo $row['password'];?>">
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLocation">Phone Number</label>
                                <input type="text" class="form-control" name ="number" placeholder="enter Phoneno" value="<?php echo $row['number'];?>">
                            </div>

                        </div>
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputOrgName">Birth Date</label>
                                <input type="date" class="form-control"  name="birth_date" placeholder="enter birth_date" value="<?php echo $row['birth_date'];?>">
                            </div>
                            
                            
                        </div>
                         <input type="file" class="form-control" name="image" value="<?php echo $row['image'];?>"><br>
                         <input type="submit" class="btn btn-primary" value="Save changes" name="Update">
                          <?php if ($_SESSION['role'] == 'admin') : ?>
                          <a href="dashboard.php" class="btn btn-secondary">Cancel</a>
                          <?php endif; ?>


                          <?php if ($_SESSION['role'] == 'developer') : ?>
                          <a href="developer_dashboard.php" class="btn btn-secondary">Cancel</a>
                          <?php endif; ?>
                          <?php if ($_SESSION['role'] == 'tester') : ?>
                          <a href="tester_dashboard.php" class="btn btn-secondary">Cancel</a>
                          <?php endif; ?>                              
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('footer1.php'); ?>
