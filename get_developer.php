<?php
include "Config.php";
$dev_id = $_POST["dev_id"];
$result = mysqli_query($db, "SELECT id,name FROM developer where id = (SELECT dev_id FROM developer_project where id = $dev_id)");


if ($result) {
    // Fetch the result as an associative array
    $developerData = mysqli_fetch_assoc($result);

    // Check if data was found
    if ($developerData) {
        // Return the data as JSON
        echo json_encode($developerData);
    } else {
        // Return a message indicating no data found
        echo json_encode(array("message" => "No data found for the given dev_id."));
    }
} else {
    // Return an error message if the query fails
    echo json_encode(array("error" => mysqli_error($db)));
}
?>

