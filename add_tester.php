<?php include('../Bug_Tracking_System/links.php'); ?>
<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
<?php include('header.php');?>

<?php
include('Config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];

    $number = $_POST['number'];
    $image = $_FILES['image']['name'];                                                                                                           
    $target_dir = "image/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);

    $email_sql="select * from tester where email='$email'";
    $es= mysqli_query($db,$email_sql);
    $emild=mysqli_num_rows($es);
    if ($emild>0) 
        {
           echo '<script>alert("already existing email"); window.location.href = "add_tester.php";</script>';
        }
     else
     {
        $sql = "INSERT INTO tester (name, email, password,age,gender, number, image,active) VALUES ('$name', '$email', '$password','$age','$gender', '$number',
     '$image',1)";
     if ($db->query($sql) === TRUE) {
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        echo '<script>alert("Add Tester successfully"); window.location.href = "tester.php";</script>';
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
          <a href="tester.php"><i class="fa-regular fa-circle-left"></i></a>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
              
               <form id="addTesterForm" class="border shadow p-3" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">

                      <h2 align="center">Add Tester </h2>
                    <div class="form-group">
                        <label for="username">Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" >
                    </div>

                    <div class="form-group">
                        <label for="email">Password</label>
                        <input type="password" name="password" class="form-control">
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
                        <input type="number" name="number" class="form-control" min="0" oninput="validity.valid||(value='');"><br>
                    </div>

                    <div class="form-group">
                        <!-- <label for="image">Image</label><br> -->
                        <input type="file" name="image" class="form-control-file">
                    </div>
                    <button type="submit" class="btn btn-primary" >Add Tester</button>
                    <a href="tester.php" class="btn btn-secondary">Cancel</a>
   
                </form>
            </div>
        </div>
    </div>
 <?php include('footer.php');?>
 <script>
    function validateForm() {
        var name = document.forms["addTesterForm"]["name"].value;
        var email = document.forms["addTesterForm"]["email"].value;
        var password = document.forms["addTesterForm"]["password"].value;
        var age = document.forms["addTesterForm"]["age"].value;
        var gender = document.forms["addTesterForm"]["gender"].value;
        var number = document.forms["addTesterForm"]["number"].value;
        var image = document.forms["addTesterForm"]["image"].value;

        if (name == "") {
            alert("Name must be filled out");
            return false;
        }
        if (email == "") {
            alert("Email must be filled out");
            return false;
        }
        if (password == "") {
            alert("Password must be filled out");
            return false;
        }
        if (age == "") {
            alert("Age must be filled out");
            return false;
        }
        if (gender == "") {
            alert("Gender must be selected");
            return false;
        }
        if (number == "") {
            alert("Number must be filled out");
            return false;
        }
        
        if (image == "") {
            alert("Image must be selected");
            return false;
        }
    }
</script>
