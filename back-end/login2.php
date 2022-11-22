<?php

 //Variables 
 $server='localhost';
 $user='root';
 $password='';
 $db='Prior_php_tests_2';
 
 //conexion
 try{
     $conn=new PDO("mysql:host=$server; dbname=$db", $user, $password);
     
     //conf variables en caso de erroreS
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

     $email_login=$_POST["email"];
     $pass_login=$_POST["password"];
     $pass_login_encrypted=password_hash($pass_sign_teacher, PASSWORD_DEFAULT);
    
     
    session_start();
    $_SESSION['email']=$email_login;

    $query="SELECT * FROM users WHERE user_email='$email_login' AND user_password='$pass_login_encrypted '";
    $query_result=mysqli_query($conn, $query);

    $rows=mysqli_num_rows($query_result);

    if ($rows) {
        header("location: ..Pages/home.php");
    }    
    else{
        ?>
        <?php 
        header("Location: ../Pages/login.php");
        ?>
        <h1>ERROR EN LA AUTENTICACIÓN</h1>
        <?php
    }
    }
    catch(PDOException $err){
        //mandar error
        echo "Error: ".$err->getMessage();
    }



?>