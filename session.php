<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<?php
   include('Config.php');
   
 $user_check = $_SESSION['login_user'];

 $id = $_SESSION['user_id'];
   

$ses_sql = mysqli_query($db,"select * from admin where email = '$user_check' ");
   
$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
// $login_session = $row['email'];


   
   if(!isset($_SESSION['login_user'])){
    header("location:./login.php");
      die();
   }
?>