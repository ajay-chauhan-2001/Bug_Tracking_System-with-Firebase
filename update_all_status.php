<?php
include('Config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_status = $_POST['new_status'];

    $sql = "UPDATE developer_project SET status = '$new_status'";
    if ($db->query($sql) === TRUE) {
        echo "Status updated successfully for all records";
    } else {
        echo "Error updating status: " . $db->error;
    }
}
?>
