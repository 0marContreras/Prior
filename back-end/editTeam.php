<?php
    //---------------------------------------NO ACABADO-------------------------------------
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
        $tname = $_POST['new-team-name'] ;
        $description=$_POST['new-team-description'];
        $picture=file_get_contents($_FILES['new-team-logo']['tmp_name'], 'rb');
        $email=$_SESSION["email"];

        $query_insert="UPDATE team SET name_team=?,  description_team=?, logo=? WHERE user_email=?";

        $query_insert_prepare=$conn->prepare($query_insert);

        $query_insert_prepare->execute([$description, $picture, $email]);


        header("location: ../Pages/myuser.php");

    }
    catch(PDOException $err){
        //mandar error
        echo "Error: ".$err->getMessage();
    }
?>