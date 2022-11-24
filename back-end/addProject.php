<?php

//Variables 
$server='localhost';
$user='root';
$password='';
$db='Prior_php_tests_2';
$errmsg="";

//conexion
try{
    $conn=new PDO("mysql:host=$server; dbname=$db", $user, $password);
    
    //conf variables en caso de erroreS
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
    $project_name=
    $description=
    $logotipos=
    $id_team=
    $score=
    $num_score=
    $stars=
    $created_at=date("Y-m-d");
    $updated_at=date("Y-m-d H:i:s");


    //Insert en la tabla
    $query=$conn->prepare("INSERT INTO users(project_name, Description, Logotipos, id_team, Score, num_score, stars, Created_at, Updated_at, descriptions, pictures) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
        
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
    
    
    }
    //Catch de toda la vida que nos manda error si valió todo 
    catch(PDOException $err){
        //mandar error
        echo "Error: ".$err->getMessage();
    }



?>