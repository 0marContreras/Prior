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

    //TODO ESTO PARA OBTENER UN MUGROSO DATO DE LA BASE DE DATOS
    $getiduser="SELECT id_user FROM users WHERE user_email='$email'";
    $getiduser_ex=$conn->query($getiduser);
    $getiduser_ex->setFetchMode(PDO::FETCH_ASSOC);
    while ($row = $getiduser_ex->fetch()):
    $id_user=$row['id_user'];
    endwhile;

   
    $comment='not set yet';
    $title=$_POST['idea-title'];
    $stars=0;
    $active=1;
    $created_at=date("Y-m-d");
    $updated_at=date("Y-m-d H:i:s");
    $description=$_POST['idea-description'];



    //Insert en la tabla
    $query=$conn->prepare("INSERT INTO rain_ideas(comment, title, id_user, stars, active, created_at, updated_at, description) VALUES (?,?,?,?,?,?,?,?)");
        
    //Datos
    $query->bindParam(1,$comment,PDO::PARAM_STR,255);
    $query->bindParam(2,$title,PDO::PARAM_STR,255);
    $query->bindParam(3,$id_user, PDO::PARAM_STR,255);
    $query->bindParam(4,$stars,PDO::PARAM_INT);
    $query->bindParam(5,$active,PDO::PARAM_STR, 255);
    $query->bindParam(6,$created_at, PDO::PARAM_STR, 255);
    $query->bindParam(7,$updated_at, PDO::PARAM_STR, 255);
    $query->bindParam(8,$description, PDO::PARAM_STR, 255);

    

    //ejecutar
    $query->execute();

    header("location: ../Pages/ideas.php");
    
    
    }
    //Catch de toda la vida que nos manda error si valió todo 
    catch(PDOException $err){
        //mandar error
        echo "Error: ".$err->getMessage();
    }



?>