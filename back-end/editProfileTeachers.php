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
        //Variables 
        $description=$_POST['user-description'];
        $picture=$_POST['user-pic'];
        $email=$_SESSION["email"];

        $query_insert="UPDATE users SET descriptions=?, pictures=? WHERE user_email=?";

        $query_insert_prepare=$conn->prepare($query_insert);

        $query_insert_prepare->execute([$description, $picture, $email]);

        //$query_insert->bindParam(1,$description,PDO::PARAM_STR,255);
        //$query_insert->bindParam(2,$picture,PDO::PARAM_STR,255);

        //$query_insert->execute();

        /*
        echo $description;
        echo $picture;
        echo $_SESSION["email"];
        echo "Felicidades Shinji";*/

        header("location: ../teacherPages/tMyuser.php");

    }
    catch(PDOException $err){
        //mandar error
        echo "Error: ".$err->getMessage();
    }
?>