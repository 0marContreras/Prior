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
        $email=$_SESSION['email'];
        //Variables
        $tname = $_POST['new-team-name'];
        $description=$_POST['new-team-description'];
        $picture=file_get_contents($_FILES['new-team-logo']['tmp_name'], 'rb');
        
        
        $query_getIdTeam="SELECT id_team FROM users WHERE user_email='$email'";
        $query_getIdTeam_ex=$conn->query($query_getIdTeam);
        $query_getIdTeam_ex->setFetchMode(PDO::FETCH_ASSOC);
        while ($row = $query_getIdTeam_ex->fetch()):
            $id_team=$row['id_team'];
        endwhile;

        $query_insert="UPDATE team SET name_team = ?, description_team = ?, logo = ? WHERE id_Team = ?";

        $query_insert_prepare=$conn->prepare($query_insert);

        $query_insert_prepare->execute([$tname, $description, $picture, $id_team]);


        header("location: ../Pages/myteam.php");

    }
    catch(PDOException $err){
        //mandar error
        echo "Error: ".$err->getMessage();
    }
?>