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
        $name=$_POST["fullname"];
        $email=$_POST["new-email"];        
        $pass_sign_student=$_POST["new-password"];
        $confirm_password=$_POST["new-password-confirm"];
        $group=$_POST["student-group-reg"];
        
        //cifrar password
        $password_cifrada=password_hash($password, PASSWORD_DEFAULT);
        
        //Insert en la tabla
        $query=$conn->prepare("INSERT INTO user(Username, user_email, user_password, id_type_user, id_group, active, created_at, updated_at) VALUES (?,?,?,1,?, 1, now(), now()");
        
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