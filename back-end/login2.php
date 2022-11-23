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

    //Traer variables de el front
     $email_login=$_POST["email"];
     $pass_login=$_POST["password"];
     $pass_login_encrypted=password_hash($pass_login, PASSWORD_DEFAULT);
    
    //Iniciamos una session
    session_start();
    
    //Variables de Session
    $_SESSION['email']=$email_login;

    //query pa seleccionar email y password 
    $query="SELECT COUNT(*) FROM users WHERE user_email='$email_login'";
    //AND user_password='$pass_login_encrypted '
    
    //ejecutamos query
    $query_result=$conn->query($query);

    //contamos cuantas columnas nos da el query
    $count=$query_result->fetchColumn();

    //Si nos regresa una columa pa adelante caminante, si no pa atrás papa de regreso al login 
    if ($count === 1) {
        echo "Felicidades shinji";
    }    
    else{
        echo "Subete al EVA shinji";
    }
    }//Catch de toda la vida que nos manda error si valió todo 
    catch(PDOException $err){
        //mandar error
        echo "Error: ".$err->getMessage();
    }



?>