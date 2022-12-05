<?php
include('../back-end/PDO.php');

$projectEva = $_POST["eva"];

$firstRubric = $_POST["rubricOne"];
$secondRubric = $_POST["rubricTwo"];
$tirdRubric = $_POST["rubricThree"];
$cuartaRubric = $_POST["rubricFour"];
$quintaRubric = $_POST["rubricFive"];
$sextaRubric = $_POST["rubricSix"];
$septimaRubric = $_POST["rubricSeven"];

$totalGrade = $firstRubric + $secondRubric + $tirdRubric + $cuartaRubric + $quintaRubric + $sextaRubric + $septimaRubric;


if ($totalGrade >= 10){  //AU

    $query_au="UPDATE project SET score = 'AU' WHERE id_project = $projectEva";
            $query_au_ex=$conn->query($query_au);
            $query_au_ex->setFetchMode(PDO::FETCH_ASSOC);

    $query_au_num="UPDATE project SET num_score = $totalGrade WHERE id_project = $projectEva";
            $query_au_num_ex=$conn->query($query_au_num);
            $query_au_num_ex->setFetchMode(PDO::FETCH_ASSOC);

    header('location: ../teacherPages/evaluation.php');         

}else if($totalGrade == 9){ //DE

    $query_de="UPDATE project SET score = 'DE' WHERE id_project = $projectEva";
            $query_de_ex=$conn->query($query_de);
            $query_de_ex->setFetchMode(PDO::FETCH_ASSOC);

    $query_de_num="UPDATE project SET num_score = $totalGrade WHERE id_project = $projectEva";
            $query_de_num_ex=$conn->query($query_de_num);
            $query_de_num_ex->setFetchMode(PDO::FETCH_ASSOC);

        header('location: ../teacherPages/evaluation.php');       

}else if($totalGrade == 8){ //SA

    $query_sa="UPDATE project SET score = 'SA' WHERE id_project = $projectEva";
            $query_sa_ex=$conn->query($query_sa);
            $query_sa_ex->setFetchMode(PDO::FETCH_ASSOC);

    $query_sa_num="UPDATE project SET num_score = $totalGrade WHERE id_project = $projectEva";
            $query_sa_num_ex=$conn->query($query_sa_num);
            $query_sa_num_ex->setFetchMode(PDO::FETCH_ASSOC);

            header('location: ../teacherPages/evaluation.php');   

}else{ //NA

    $query_na="UPDATE project SET score = 'NA' WHERE id_project = $projectEva";
            $query_na_ex=$conn->query($query_na);
            $query_na_ex->setFetchMode(PDO::FETCH_ASSOC);

    $query_na_num="UPDATE project SET num_score = $totalGrade WHERE id_project = $projectEva";
            $query_na_num_ex=$conn->query($query_na_num);
            $query_na_num_ex->setFetchMode(PDO::FETCH_ASSOC);

            header('location: ../teacherPages/evaluation.php');            

}

?>