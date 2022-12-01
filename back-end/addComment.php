<?php

include('../back-end/PDO.php');
include('../Pages/home.php');

session_start();

$comment=$_POST['new-idea-com'];
$active=1;
$created_at=date("Y-m-d");
$updated_at=date("Y-m-d H:i:s");

$query_insert_comment=$conn->prepare("INSERT INTO project_comment(Comment, active, created_at, updated_at) VALUES(?,?,?,?)");

$query_insert_comment->bindParam(1,$comment,PDO::PARAM_STR);
$query_insert_comment->bindParam(2,$active,PDO::PARAM_INT);
$query_insert_comment->bindParam(3,$created_at,PDO::PARAM_STR);
$query_insert_comment->bindParam(4,$updated_at,PDO::PARAM_STR);

$query_insert_comment->execute();

$Last_insert=$conn->lastInsertId();

$query_insert_comment_comment=$conn->prepare("INSERT INTO project_projectcomment(id_project, id_ProjectComment) VALUES(?,?)");

$query_insert_comment_comment->bindParam(1,$id_project,PDO::PARAM_STR);
$query_insert_comment_comment->bindParam(2,$Last_insert,PDO::PARAM_INT);


$query_insert_comment_comment->execute();



header("location:../Pages/home.php");

?>