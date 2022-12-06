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
    //Variables
    $pname = $_POST['new-project-name'];
    $description=$_POST['new-project-description'];
    $picture=file_get_contents($_FILES['new-project-logo']['tmp_name'], 'rb');
    
    
    $query_get_idteam="SELECT id_team FROM users WHERE user_email='$email'";
    $query_get_idteam_ex=$conn->query($query_get_idteam);
    $query_get_idteam_ex->setFetchMode(PDO::FETCH_ASSOC);
    while ($row = $query_get_idteam_ex->fetch()):
        $id_team=$row['id_team'];
    endwhile;

    $query_get_project="SELECT id_project FROM project WHERE id_Team = '$id_team'";
    $query_get_project_ex=$conn->query($query_get_project);
    $query_get_project_ex->setFetchMode(PDO::FETCH_ASSOC);
    while ($row1 = $query_get_project_ex->fetch()):
        $id_project=$row1['id_project'];
    endwhile;

    $query_insert="UPDATE project SET project_name = ?, Description = ?, Logotipos = ? WHERE id_project = ?";

    $query_insert_prepare=$conn->prepare($query_insert);

    $query_insert_prepare->execute([$pname, $description, $picture, $id_project]);


    header("location: ../Pages/myproject.php");

}
catch(PDOException $err){
    //mandar error
    echo "Error: ".$err->getMessage();
}
?>