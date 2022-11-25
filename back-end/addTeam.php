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
    
    session_start();

    $email=$_SESSION['email'];

    /*
    //TODO ESTO PARA OBTENER UN DATO DE LA BASE DE DATOS
    $getiduser="SELECT id_user FROM users WHERE user_email='$email'";
    $getiduser_ex=$conn->query($getiduser);
    $getiduser_ex->setFetchMode(PDO::FETCH_ASSOC);
    while ($row = $getiduser_ex->fetch()):
    $id_user=$row['id_user'];
    endwhile;
    */
   
    $name_team=$_POST['team-name'];
    $description_team=$_POST['team-description'];
    $id_project=0;
    $id_career=$_POST['team-group-reg'];
    $logo=$_POST['team-logo'];
    $code=rand(1000,9999);
    $created_at=date("Y-m-d");
    $updated_at=date("Y-m-d H:i:s");




    //Insert en la tabla
    $query=$conn->prepare("INSERT INTO team(name_team, description_team, id_project, id_Career, logo, code_, created_at, updated_at) VALUES (?,?,?,?,?,?,?,?)");
        
    //Datos
    $query->bindParam(1,$name_team,PDO::PARAM_STR,255);
    $query->bindParam(2,$description_team,PDO::PARAM_STR,255);
    $query->bindParam(3,$id_project, PDO::PARAM_INT);
    $query->bindParam(4,$id_career,PDO::PARAM_INT);
    $query->bindParam(5,$logo,PDO::PARAM_STR, 255);
    $query->bindParam(6,$code,PDO::PARAM_INT);
    $query->bindParam(7,$created_at, PDO::PARAM_STR, 255);
    $query->bindParam(8,$updated_at, PDO::PARAM_STR, 255);


    

    //ejecutar
    $query->execute();

    header("location: ../Pages/myteam.php");
    
    
    }
    //Catch de toda la vida que nos manda error si valió todo 
    catch(PDOException $err){
        //mandar error
        echo "Error: ".$err->getMessage();
    }



?>