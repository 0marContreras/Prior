<?php
    //Variables 
    $server='localhost';
    $user='root';
    $password='';
    $db='Prior_php_tests_2';
    
    //conexion
    try{
        $conn=new PDO("mysql:host=$server;dbname=$db", $user, $password);
        

        //config variables en caso de errores
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //traer variables
        $name=$_POST["fullname"];
        $email=$_POST["new-email"];        
        $pass_sign_student=$_POST["new-password"];
        $group=$_POST["student-group-reg"];
        $created_at=date("YYYY-mm-dd");
        $updated_at=date("YYYY-mm-dd HH:ii:ss");
        
        //cifrar password
        $password_cifrada=password_hash($pass_sign_student, PASSWORD_DEFAULT);
        
        //Insert en la tabla
        $query=$conn->prepare("INSERT INTO user(Username, user_email, user_password, id_type_user, id_group, id_team, active, created_at, updated_at) VALUES (?,?,?,1,?,'null',1,?,?");
        
        //Datos
        $query->bindParam(1, $name, PDO::PARAM_STR, 255);
        $query->bindParam(2, $email, PDO::PARAM_STR, 255);
        $query->bindParam(3, $password_cifrada, PDO::PARAM_STR, 255);
        $query->bindParam(5, $group, PDO::PARAM_STR, 255);
        $query->bindParam(8, $created_at, PDO::PARAM_STR, 255);
        $query->bindParam(9, $updated_at, PDO::PARAM_STR, 255);
    
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