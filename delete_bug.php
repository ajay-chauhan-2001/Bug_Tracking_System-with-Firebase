<?php
require_once('config.php');

$id = $_GET['id'];
$sql = "update  bugs set active=0  WHERE id=$id";

if ($db->query($sql) === TRUE) {
	echo '<script>alert("Bug deleted successfully"); window.location.href = "bug.php";</script>';
    // header("Location: bug.php");
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}

$db->close();
?>
