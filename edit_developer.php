
<?php
ob_start();
include('header.php');

require_once('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = md5($password);  
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $number = $_POST['number'];

    $skill = $_POST['skill'];



    // Check if a new image is uploaded
    if ($_FILES["image"]["name"]) {
        $targetDir = "image/";
        // $fileName = basename($_FILES["image"]["name"]);
        $fileName = md5(uniqid($_FILES["image"]["name"], true)); 
        $targetFilePath = $targetDir . $fileName;


        move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath);

        // Update developer information with new image
        // $password = md5($password);  

        $sql = "UPDATE developer SET name='$name', email='$email',password='$password',age='$age',gender='$gender',number='$number',skill='$skill', image='$fileName' WHERE id=$id";
    } else {
        // Update developer information without changing the image
        $sql = "UPDATE developer SET name='$name', email='$email', password='$password',age='$age',gender='$gender',number='$number',skill='$skill' WHERE id=$id";
    }

    if ($db->query($sql) === true) {
         echo '<script>alert("Data updated successfully"); window.location.href = "developer.php";</script>';
        // header("Location: developer.php");
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }
}

$id = $_GET['id'];
$sql = "SELECT * FROM developer WHERE id=$id";
$result = $db->query($sql);
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Developer</title>
</head>
<style type="text/css">
    a{
    
    color: #696cff;
    font-size: x-large;
}

</style>
<body>
    <div class="container mt-5">
        <div class="w3-padding-64 w3-content w3-text-grey" id="contact"> 
          <a href="developer.php"><i class="fa-regular fa-circle-left"></i></a>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form class="border shadow p-3" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                    <h2 align="center">Edit Developer</h2>

                    <input type="hidden" name="id" class="form-control" value="<?php echo $row['id']; ?>">
                    <label>Name:</label><br>
                    <input type="text" name="name"  class="form-control" value="<?php echo $row['name']; ?>"><br>
                    <label>Email:</label><br>
                    <input type="email" name="email" class="form-control" value="<?php echo $row['email']; ?>"><br>
                     <label>Password:</label><br>
                    <input type="password" name="password" class="form-control" value="<?php echo $row['password']; ?>"><br>
                    <label> Age:</label><br>
                    <input type="number" name="age" class="form-control" min="0" oninput="validity.valid||(value='');" value="<?php echo $row['age']; ?>"><br>
                    <!-- <label>Gender:</label><br> -->
                     Gender: <select name='gender'class="form-control" >
                            <option value='gender' selected>select gender</option>
                            <option value='male'<?php if ($row['gender']=='male') { echo 'selected'; } ?>>Male</option>
                            <option value='female'<?php if ($row['gender']=='female') { echo 'selected'; } ?>>Female</option>
                            <option value='other'<?php if ($row['gender']=='other') { echo 'selected'; } ?>>Other</option>
                            

                            </select><br>
                    <label>Mobile No:</label><br>
                    <input type="number" name="number" class="form-control" min="0" oninput="validity.valid||(value='');" value="<?php echo $row['number']; ?>"><br>
                    <label>Skill:</label><br>
                    <input type="text" name="skill" class="form-control" value="<?php echo $row['skill']; ?>"><br>
                    <label>Current Image:</label><br>
                    <img src="image/<?php echo $row['image']; ?>" width="50" height="50"><br>
                    <label>New Image:</label><br>
                    <input type="file" name="image"><br><br>
                    <input type="submit" class="btn btn-primary" value="Update Developer">
                    <a href="developer.php" class="btn btn-secondary">Cancel</a>

                </form>
            </div>
        </div>
    </div>
</body>
</html>


<?php include('footer.php');?>
