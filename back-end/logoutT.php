<?php 
    //Variables 
    $server='localhost';
    $user='root';
    $password='';
    $db='Prior_php_tests_2';
    
    //conexion
    try{
        $conn=new PDO("mysql:host=$server; dbname=$db", $user, $password);
        
        //conf variables en caso de erroreS
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        
        session_start();

        session_unset();

        session_destroy();

        header("Location: ../teacherPages/loginTeachers.php");
    }
    catch(PDOException $err){
        //mandar error
        echo "Error: ".$err->getMessage();
    }


?>