<?php

    //ESTE NO ES EL LOGIN BUENO
    
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
        
        
        //echo "Conexion exitosa";
        $email_login=$_POST["email"];
        $pass_login=$_POST["password"];
        $pass_login_encrypted=password_hash($pass_sign_teacher, PASSWORD_DEFAULT);
             
        //query 
        $sql="SELECT * FROM users WHERE user_email='$email_login' AND user_password='$pass_login_encrypted '";
        

        
        //query 2 
        $query=$conn->prepare($sql);
        $query->execute();
        $query->setFetchMode(PDO::FETCH_ASSOC);


    }
    catch(PDOException $err){
        //mandar error
        echo "Error: ".$err->getMessage();
    }
?>

