<?php
$db=new mysqli("localhost","root","","bug_tracking");

if(!$db)
{
die(mysqli_error($db));
}

?>