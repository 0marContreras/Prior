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

    //Traer variables de el front
     $email_login=$_POST["email"];
     $pass_login=md5($_POST["password"]);
    
    //Iniciamos una session
    session_start();
    
    //Variables de Session
    $_SESSION['email']=$email_login;

    //query pa seleccionar email y password 
    $query="SELECT COUNT(*) FROM users WHERE user_email='$email_login' AND user_password='$pass_login' AND id_type_user=2";

    
    //ejecutamos query
    $query_result=$conn->query($query);

    //contamos cuantas columnas nos da el query
    $count=$query_result->fetchColumn();

    //Si nos regresa una row pa adelante caminante, si no pa atrás papa de regreso al login 
    if ($count === 1) {
        //echo "Felicidades shinji"."<br>";
        header("location: ../teacherPages/tHome.php");

    }    
    else{
        //echo "Subete al EVA shinji";
        ?>
        <?php
        include("../teacherPages/loginTeachers.php");
    
        echo'<script type="text/javascript">';
        echo'alert("Incorrect email or password")';
        echo'</script>';
    
    
        
    }
    }//Catch de toda la vida que nos manda error si valió todo 
    catch(PDOException $err){
        //mandar error
        echo "Error: ".$err->getMessage();
    }



?>