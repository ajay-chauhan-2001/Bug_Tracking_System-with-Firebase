<?php
require_once('config.php');

$id = $_GET['id'];
$sql = "update  developer_project set active=0 WHERE id=$id";

if ($db->query($sql) === true) {
    header("Location: developer_project.php");
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}

$db->close();
?>
