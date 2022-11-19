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
        $name_teacher=$_POST["fullname-teacher"];
        $email_teacher=$_POST["new-email-teacher"];        
        $pass_sign_teacher=$_POST["new-password-teacher"];
        $confirm_password_teacher=$_POST["new-password-confirm-teacher"];
        $group_teacher=$_POST["teacher-career-reg"];
        
        //cifrar password
        $password_cifrada=password_hash($pass_sign_teacher, PASSWORD_DEFAULT);
        
        //Insert en la tabla
        $query=$conn->prepare("INSERT INTO user(Username, user_email, user_password, id_type_user, id_group, active, created_at, updated_at) VALUES (?,?,?,2,?,1,now(),now()");
        
        //Datos
        $query->bindParam(1, $name_teacher, PDO::PARAM_STR, 255);
        $query->bindParam(2, $email_teacher, PDO::PARAM_STR, 255);
        $query->bindParam(3, $password_cifrada, PDO::PARAM_STR, 255);
        $query->bindParam(5, $group_teacher, PDO::PARAM_STR, 255);
    
        //ejecutar
        $query->execute();

        //cerrar conexion
        $conn=null;

        //confirmar a usuario
        echo "Felicidades shinji";

        //redireccion
        header('location:../pages/login.html');

    }
    catch(PDOException $err){
        //mandar error
        echo "Error: ".$err->getMessage();
    }
?>