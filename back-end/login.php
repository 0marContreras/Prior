<?php
    //Variables 
    $server='localhost';
    $user='root';
    $password='';
    $db='Prior_php_tests_2';
    
    //conexion
    try{
        $conn=new PDO("mysql:host=$server; dbname=$db", $user, $password);
        
        //conf variables en caso de errores
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //traer variables
        $email_login=$_POST["email"];
        $password_login=$_POST["password"];

        //cifrar password para comparar despues
        $password_cifrada=password_hash($password_login, PASSWORD_DEFAULT);

        //seleccionar datos de la tabla
        $query_compare->prepare("SELECT * FROM users WHERE user_email=$email_login AND user_password=$password_cifrada");

        //test
        $query_compare->execute();
        echo $query_compare;
        
        //checar que se 
        

    }
    catch(PDOException $err){
        //mandar error
        echo "Error: ".$err->getMessage();
    }
?>