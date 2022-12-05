<?php

include('../back-end/PDO.php');
include('../Pages/home.php');

session_start();

$sesionE = $_SESSION['email'];

$query_usuario = "SELECT * FROM users WHERE user_email = $sesionE";
$query_usuario_ex=$conn->query($query_usario);
$query_usuario_ex->setFetchMode(PDO::FETCH_ASSOC);


$id_user = $row['id_user'];
$id_project = $_POST['getid'];
$comment=$_POST['new-project-com'];
$active=1;
$created_at=date("Y-m-d");
$updated_at=date("Y-m-d H:i:s");


    $query_insert_comment=$conn->prepare("INSERT INTO project_comment(Comment, active, id_user, id_project, created_at, updated_at) VALUES(?,?,$id_user,$id_project,?,?)");

    $query_insert_comment->bindParam(1,$comment,PDO::PARAM_STR);
    $query_insert_comment->bindParam(2,$active,PDO::PARAM_INT);
    $query_insert_comment->bindParam(5,$created_at,PDO::PARAM_STR);
    $query_insert_comment->bindParam(6,$updated_at,PDO::PARAM_STR);

    $query_insert_comment->execute();
    header("location:../Pages/home.php");


    

?>