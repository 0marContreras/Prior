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
     $pass_login_encrypted=password_hash($pass_login, PASSWORD_DEFAULT);
    
     
    session_start();
    
    $_SESSION['email']=$email_login;

    $query="SELECT COUNT(*) FROM users WHERE user_email='$email_login' AND user_password='$pass_login_encrypted '";
    
    $query_result=$conn->query($query);

    $count=$query_result->fetchColumn();

    if ($count === 1) {
        echo "Felicidades shinji";
    }    
    else{
        echo "Subete al EVA shinji";
    }
    }
    catch(PDOException $err){
        //mandar error
        echo "Error: ".$err->getMessage();
    }



?>