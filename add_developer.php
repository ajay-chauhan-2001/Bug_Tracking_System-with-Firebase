<?php include('../Bug_Tracking_System/links.php'); ?>
<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
<?php include('header.php');?>

<?php
include('Config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    // echo $name;die();
    $email = $_POST['email'];
    $password = $_POST['password'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $number = $_POST['number'];
    $skill = $_POST['skill'];

    $image = $_FILES['image']['name'];
    $target_dir = "image/";
    $target_file =$target_dir. md5(uniqid($_FILES["image"]["name"], true)); 
    // $target_file = $target_dir . basename($_FILES["image"]["name"]);
 
    $email_sql="select * from developer where email='$email'";
    $es= mysqli_query($db,$email_sql);
    $emild=mysqli_num_rows($es);


    if ($emild>0) 
    {
        echo '<script>alert("Already Existing Email"); window.location.href = "add_developer.php";</script>';
       // $error = "Already Existing Email";
       // $_SESSION["email"]='1';
    }
    else{
         $sql = "INSERT INTO developer (name, email, password,age,gender,number,skill,image,active) VALUES ('$name', '$email', '$password','$age','$gender', '$number','$skill', '$image',1)";
         if ($db->query($sql) === true) {
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        echo '<script>alert("Add Developer successfully"); window.location.href = "developer.php";</script>';
    } else {
        echo '<script>alert("Error: ' . $db->error . '");</script>';
    }


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
     <div class="w3-padding-64 w3-content w3-text-grey" id="contact"> 
          <a href="developer.php"><i class="fa-regular fa-circle-left"></i></a>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <!-- <?php if(isset($error)) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error; ?>
            </div>
        <?php } ?> -->
              
                <form id="adddeveloper" class="border shadow p-3" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
                      <h2 align="center">Add Developer</h2>

                    <div class="form-group">
                        <label for="username">Name</label>
                        <input type="text" name="name" class="form-control">
                         <?php if(isset($error['n'])) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $error['n']; ?>
                            </div>
                         <?php } ?>

                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control">
                         <!-- <p class="text-denger"><?php if(isset($error['e'])) echo $error['e'];?> -->
                         <?php if(isset($error['e'])) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $error['e']; ?>
                            </div>
                         <?php } ?>
                        <!-- </p> -->
                    </div>

                    <div class="form-group">
                        <label for="email">Password</label>
                        <input type="password" name="password" class="form-control">
                          <?php if(isset($error['p'])) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $error['p']; ?>
                            </div>
                         <?php } ?>
                        <!-- <i class="fa-solid fa-circle-check"></i> -->

                    </div>
                    <div class="form-group">
                        <label for="number">Age</label>
                        <input type="number" name="age" class="form-control" min="0" oninput="validity.valid||(value='');">
                         <!--  <?php if(isset($error['no'])) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $error['no']; ?>
                            </div>
                         <?php } ?> -->
                    </div>

                    <div class="form-group">
                        Gender:
                        <input type="radio" name="gender"
                        <?php if (isset($gender) && $gender=="male") echo "checked";?>
                        value="male">Male
                        <input type="radio" name="gender"
                        <?php if (isset($gender) && $gender=="female") echo "checked";?>
                        value="female">Female
                        <input type="radio" name="gender"
                        <?php if (isset($gender) && $gender=="other") echo "checked";?>
                        value="other">Other
                    </div>
                    
                    <div class="form-group">
                        <label for="number">Number</label>
                        <input type="number" name="number" class="form-control" min="0" oninput="validity.valid||(value='');">
                          
                    </div>

                    <div class="form-group">
                        <label for="number">Skill</label>
                        <input type="text" name="skill" class="form-control">
                          <!-- <?php if(isset($error['no'])) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $error['no']; ?>
                            </div>
                         <?php } ?> -->
                    </div>

                    <div class="form-group">
                        <!-- <label for="image">Image</label><br> -->
                        <input type="file" name="image" class="form-control-file">
                         <?php if(isset($error['img'])) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $error['img']; ?>
                            </div>
                         <?php } ?>
                    </div>
                    <button type="submit" class="btn btn-primary" >Add Developer</button>
                    <a href="developer.php" class="btn btn-secondary">Cancel</a>
                     
                </form>
            </div>
        </div>
    </div>
 <?php include('footer.php');?>
 <script>
    function validateForm() {
        var name = document.forms["adddeveloper"]["name"].value;
        var email = document.forms["adddeveloper"]["email"].value;
        var password = document.forms["adddeveloper"]["password"].value;
        var age = document.forms["adddeveloper"]["age"].value;
        var gender = document.forms["adddeveloper"]["gender"].value;
        var number = document.forms["adddeveloper"]["number"].value;
        var skill  = document.forms["adddeveloper"]["skill"].value;
        var image = document.forms["adddeveloper"]["image"].value;

        if (name == "")
        {
            alert("Name must be filled out");
            return false;
        }
        if (email == "") 
        {
            alert("Email must be filled out");
            return false;
        }
        if (password == "") 
        {
            alert("Password must be filled out");
            return false;
        }
        if (age == "") 
        {
            alert("Age must be filled out");
            return false;
        }
        if (gender == "") 
        {
            alert("Gender must be selected");
            return false;
        }
        if (number == "") 
        {
            alert("Number must be filled out");
            return false;
        }
        if (skill == "") 
        {
            alert("skill must be filled out");
            return false;
        }
        if (image == "") 
        {
            alert("Image must be selected");
            return false;
        }
    }
</script>