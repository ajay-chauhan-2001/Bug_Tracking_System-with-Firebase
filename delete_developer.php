<?php
require_once('config.php');

$id = $_GET['id'];
$sql = "update  developer set active=0  WHERE id=$id";

if ($db->query($sql) === TRUE) {
    header("Location: developer.php");
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}

$db->close();
?>
