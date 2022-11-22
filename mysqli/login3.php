<?php
include("back-end/conn_mysqli.php");

$email_login=$_POST["email"];
$pass_login=$_POST["password"];
$pass_login_encrypted=password_hash($pass_login, PASSWORD_DEFAULT);




session_start();
$_SESSION['email']=$email_login;




$query="SELECT * FROM users WHERE user_email='$email_login' AND user_password='$pass_login_encrypted '";
$query_result=mysqli_query($conn_mysqli, $query);

$rows=mysqli_num_rows($query_result);

//echo $email_login, $pass_login, $pass_login_encrypted;

if (!$rows) {
    header("location: Pages/home.php");
}    
else{
    include("Pages/login.php");
    echo "<h1>ERROR EN LA AUTENTICACIÓN</h1>";
    }
mysqli_free_result($query_result);
mysqli_close($conn_mysqli);

?>