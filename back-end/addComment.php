<?php

include('../back-end/PDO.php');

session_start();

$sesionE = $_SESSION['email'];



$id_project = $_POST['getid'];
$comment=$_POST['new-project-com'];
$active=1;
$created_at=date("Y-m-d");
$updated_at=date("Y-m-d H:i:s");

    $query_1="SELECT id_user FROM users WHERE user_email='$sesionE'";
    $query_1_ex=$conn->query($query_1);
    $query_1_ex->setFetchMode(PDO::FETCH_ASSOC);
    while ($row10 = $query_1_ex->fetch()):
        $id_user = $row10['id_user'];
    endwhile;

    $query_insert_comment=$conn->prepare("INSERT INTO project_comment(Comment, active, id_user, id_project, created_at, updated_at) VALUES(?,?,?,?,?,?)");

    $query_insert_comment->bindParam(1,$comment,PDO::PARAM_STR);
    $query_insert_comment->bindParam(2,$active,PDO::PARAM_INT);
    $query_insert_comment->bindParam(3,$id_user,PDO::PARAM_INT);
    $query_insert_comment->bindParam(4,$id_project,PDO::PARAM_INT);
    $query_insert_comment->bindParam(5,$created_at,PDO::PARAM_STR);
    $query_insert_comment->bindParam(6,$updated_at,PDO::PARAM_STR);

    $query_insert_comment->execute();
    header("location:../Pages/home.php");


    

?>