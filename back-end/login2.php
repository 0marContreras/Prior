<?php

 //Variables 
 $server='localhost'; //Nombre del servidor, en este caso como estamos emulando un servidor en xampp usamos localhost 
 $user='root'; //Usuario que se usara para modificar 
 $db='Prior_php_tests_2'; //Base de datos que utilizaremos 
 $password=""; //La contraseña de usuario que en este caso no hay
 
 //conexion 
 //Usamos un try and catch para hacernos la vida más fácil
 try{

    //Declaramos la conexión como PDO y le damos todas la variables
    $conn=new PDO("mysql:host=$server; dbname=$db", $user, $password);
     
     //config variables en caso de errores
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Traer variables de el front
     $email_login=$_POST["email"];
     $pass_login=md5($_POST["password"]); //Aquí nos traemos la password de el login y lo encriptamos con md5 
    
    //Iniciamos una session
    session_start();
    
    //Variables de Session
    $_SESSION['email']=$email_login;

    //query pa seleccionar email y password 
    $query="SELECT COUNT(*) FROM users WHERE user_email='$email_login' AND user_password='$pass_login' AND id_type_user=1";
    //AND user_password='$pass_login_encrypzted '
    
    //ejecutamos query
    $query_result=$conn->query($query);

    //contamos cuantas columnas nos da el query
    $count=$query_result->fetchColumn();


    //Si nos regresa una row pa adelante caminante, si no pa atrás papa de regreso al login 
    if ($count === 1) {
        //echo "Felicidades shinji"."<br>";
        header("location: ../Pages/home.php");

    }    
    else{
        //echo "Subete al EVA shinji";
        ?>
        <?php
        include("../Pages/login.php");
    
        echo'<script type="text/javascript">';
        echo'alert("Incorrect email or password")';
        echo'</script>';
    
    
        
    }
    }//Catch que nos manda el error si la conexión falla
    catch(PDOException $err){
        //mandar error
        echo "Error: ".$err->getMessage();
    }



?>