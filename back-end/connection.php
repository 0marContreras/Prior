<?php
    //Variables 
    $server='localhost';
    $user='root';
    $password='';
    $db='Prior_php_tests_2';
    
    //conexion
    try{
        $conn=new PDO("mysql:host=$server;dbname=$db", $user, $password);
        
        //conf variables en caso de errores
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //traer variables
        $name=$_POST["name-sign"];
        $email=$_POST["email-sign"];        
        $pass_sign=$_POST["pwd-sign"];
        
        //cifrar password
        $password_cifrada=password_hash($password, PASSWORD_DEFAULT);
        
        //Insert en la tabla
        $query=$conn->prepare("INSERT INTO user(name_, email, password_) VALUES (?,?,?)");
        
        //Datos
        $query->bindParam(1, $name, PDO::PARAM_STR, 255);
        $query->bindParam(2, $email, PDO::PARAM_STR, 255);
        $query->bindParam(3, $password_cifrada, PDO::PARAM_STR, 255);

        //ejecutar
        $query->execute();

        //cerrar conexion
        $conn=null;

        //confirmar a usuario
        echo "Felicidades shinji";

        //redireccion
        header('location:../html/login.html');

    }
    catch(PDOException $err){
        //mandar error
        echo "Su conexion ha fallado por ".$err->getMessage();
    }
?>