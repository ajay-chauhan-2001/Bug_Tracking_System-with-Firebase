<?php
require_once('config.php');

$id = $_GET['id'];
$sql = "update  tester set active=0  WHERE id=$id";

if ($db->query($sql) === TRUE) {
    header("Location: tester.php");
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}

$db->close();
?>
