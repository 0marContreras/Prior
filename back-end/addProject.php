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

    //Get id_team 
    $getidteam="SELECT id_team FROM users WHERE user_email='$email'";
    $getidteam_ex=$conn->query($getidteam);
    $getidteam_ex->setFetchMode(PDO::FETCH_ASSOC);
    while ($row = $getidteam_ex->fetch()):
    $id_team=$row['id_team'];
    endwhile;    

    $project_name=$_POST['project-name'];
    $description=$_POST['project-description'];
    $logotipos=file_get_contents($_FILES['project-logo']['tmp_name'], 'rb');
    $score='Not graded';
    $num_score=0;
    $stars=0;
    $created_at=date("Y-m-d");
    $updated_at=date("Y-m-d H:i:s");
    $group=$_POST['project-group-reg'];


    //Insert en la tabla
    $query=$conn->prepare("INSERT INTO project(project_name, Description, Logotipos, id_Team, Score, num_score, stars, Created_at, Updated_at, id_group) VALUES (?,?,?,?,?,?,?,?,?,?)");
        
    //Datos
    $query->bindParam(1,$project_name,PDO::PARAM_STR,255);
    $query->bindParam(2,$description,PDO::PARAM_STR,255);
    $query->bindParam(3,$logotipos, PDO::PARAM_LOB);
    $query->bindParam(4,$id_team,PDO::PARAM_INT);
    $query->bindParam(5,$score,PDO::PARAM_STR, 255);
    $query->bindParam(6,$num_score,PDO::PARAM_INT);
    $query->bindParam(7,$stars,PDO::PARAM_INT);
    $query->bindParam(8, $created_at, PDO::PARAM_STR, 255);
    $query->bindParam(9, $updated_at, PDO::PARAM_STR, 255);
    $query->bindParam(10,$group,PDO::PARAM_INT);

    //ejecutar
    $query->execute();

    $last_id=$conn->lastInsertId();

    $query_update_team="UPDATE team SET id_project=? WHERE id_team=?";

    $query_update_team_prepare=$conn->prepare($query_update_team);

    $query_update_team_prepare->execute([$last_id, $id_team]);


    header("location: ../Pages/myproject.php");
    
    
    }
    //Catch de toda la vida que nos manda error si valió todo 
    catch(PDOException $err){
        //mandar error
        echo "Error: ".$err->getMessage();
    }



?>