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
        //$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); 
        
        //traer variables
        $name=$_POST["fullname"];
        $email=$_POST["new-email"];        
        $pass_sign_student=md5($_POST["new-password"]);
        $group=$_POST["student-group-reg"];
        $type_user=1;
        $id_team=7;
        $active=1;
        $created_at=date("Y-m-d");
        $updated_at=date("Y-m-d H:i:s");
        $description="Not set yet";
        $pictures="Not set yet";


        
        //Insert en la tabla
        $query=$conn->prepare("INSERT INTO users(Username, user_email, user_password, id_type_user, id_group, id_team, active, created_at, updated_at, descriptions, pictures) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
        
        //Datos
        $query->bindParam(1,$name,PDO::PARAM_STR,255);
        $query->bindParam(2,$email,PDO::PARAM_STR,255);
        $query->bindParam(3,$pass_sign_student, PDO::PARAM_STR,255);
        $query->bindParam(4,$type_user,PDO::PARAM_INT);
        $query->bindParam(5,$group,PDO::PARAM_INT);
        $query->bindParam(6,$id_team,PDO::PARAM_INT);
        $query->bindParam(7,$active,PDO::PARAM_INT);
        $query->bindParam(8, $created_at, PDO::PARAM_STR, 255);
        $query->bindParam(9, $updated_at, PDO::PARAM_STR, 255);
        $query->bindParam(10, $description, PDO::PARAM_STR, 255);
        $query->bindParam(11, $pictures, PDO::PARAM_STR, 255);
        
    
        //ejecutar
        $query->execute();

        //cerrar conexion
        $conn=null;

        //confirmar a usuario
        echo "Felicidades shinji";

        //redireccion
        header('location:../Pages/login.php'); 

    }
    catch(PDOException $err){
        //mandar error
        echo "Error: ".$err->getMessage();
    }
?>