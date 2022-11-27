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

    $email=$_SESSION['email'];

    $get_code=$_POST['teamcode'];

    //Get IdTeam Para meterlo en users
    $query_getIdTeam="SELECT id_Team FROM team WHERE code_='$get_code'";
    $query_getIdTeam_ex=$conn->query($query_getIdTeam);
    $query_getIdTeam_ex->setFetchMode(PDO::FETCH_ASSOC);
    while ($row = $query_getIdTeam_ex->fetch()):
        $id_team_=$row['id_Team'];
    endwhile; 


    //Join team 
    $query_join_team="UPDATE users SET id_team=? WHERE user_email=?";
    
    $query_join_team_prepare=$conn->prepare($query_join_team);
    
    $query_join_team_prepare->execute([$id_team_, $email]);


    header("location: ../Pages/myteam.php");

    }
//Catch de toda la vida que nos manda error si valió todo 
catch(PDOException $err){
    //mandar error
    echo "Error: ".$err->getMessage();
}



?>