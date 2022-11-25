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
   
    $project_name=$_POST['project-name'];
    $description=$_POST['project-description'];
    $logotipos=$_POST['project-logo'];
    $id_team=rand(1000, 9999);
    $score='not set yet';
    $num_score=0;
    $stars=0;
    $created_at=date("Y-m-d");
    $updated_at=date("Y-m-d H:i:s");


    //Insert en la tabla
    $query=$conn->prepare("INSERT INTO project(project_name, Description, Logotipos, id_team, Score, num_score, stars, Created_at, Updated_at) VALUES (?,?,?,?,?,?,?,?,?)");
        
    //Datos
    $query->bindParam(1,$project_name,PDO::PARAM_STR,255);
    $query->bindParam(2,$description,PDO::PARAM_STR,255);
    $query->bindParam(3,$logotipos, PDO::PARAM_STR,255);
    $query->bindParam(4,$id_team,PDO::PARAM_INT);
    $query->bindParam(5,$score,PDO::PARAM_STR, 255);
    $query->bindParam(6,$num_score,PDO::PARAM_INT);
    $query->bindParam(7,$stars,PDO::PARAM_INT);
    $query->bindParam(8, $created_at, PDO::PARAM_STR, 255);
    $query->bindParam(9, $updated_at, PDO::PARAM_STR, 255);

    

    //ejecutar
    $query->execute();

    header("location: ../Pages/myproject.php");
    
    
    }
    //Catch de toda la vida que nos manda error si valió todo 
    catch(PDOException $err){
        //mandar error
        echo "Error: ".$err->getMessage();
    }



?>