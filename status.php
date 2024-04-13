<?php
include('../Bug_Tracking_System/links.php');

// Assuming Config.php contains database configuration and starts the session
include('Config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['new_status'])) {
    // Check if the form is submitted and new status is set

    $new_status = $_POST['new_status'];

    // Update status for all records
    $update_query = "UPDATE developer_project SET status = '$new_status' WHERE active=1";

    if (mysqli_query($db, $update_query)) {
        echo "<script>alert('Status updated successfully for all records');</script>";
    } else {
        echo "<script>alert('Error updating status: " . mysqli_error($db) . "');</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head content goes here -->
</head>
<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <?php include('header.php'); ?>

            <h1><i class="fa fa-list"></i> Developer Project List</h1>

            <?php if ($_SESSION['role'] == 'admin') : ?>
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="new_status">Change Status for All Records:</label>
                        <select class="form-control" id="new_status" name="new_status">
                            <option value="Pending">Pending</option>
                            <option value="In Progress">In Progress</option>
                            <option value="Completed">Completed</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Status</button>
                </form>
            <?php endif; ?>

            <!-- Table content goes here -->
        </div>
    </div>

    <!-- Additional scripts and footer -->
</body>
</html>

<?php include('footer.php');?>
