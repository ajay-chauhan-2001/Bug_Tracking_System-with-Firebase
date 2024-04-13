<?php
require_once('config.php');

$id = $_GET['id'];
$sql = "update  tester_project set active=0  WHERE id=$id";

if ($db->query($sql) === TRUE) {
    header("Location: tester_project.php");
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}

$db->close();
?>
