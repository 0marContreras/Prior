<?php
include('../back-end/PDO.php');
include('../teacherPages/rubric.php');

$projectEva = $_POST["willEvaluate"];

$firstRubric = $_POST["rubricOne"];
$secondRubric = $_POST["rubricTwo"];
$tirdRubric = $_POST["rubricThree"];
$cuartaRubric = $_POST["rubricFour"];
$quintaRubric = $_POST["rubricFive"];
$sextaRubric = $_POST["rubricSix"];
$septimaRubric = $_POST["rubricSeven"];

$totalGrade = $firstRubric + $secondRubric + $tirdRubric + $cuartaRubric + $quintaRubric + $sextaRubric + $septimaRubric;


if ($totalGrade >= 96){  //AU

    $query_au="UPDATE project SET project.score = 'AU' WHERE project.project_id = $projectEva";
            $query_au_ex=$conn->query($query_au);
            $query_au_ex->setFetchMode(PDO::FETCH_ASSOC);

    $query_au_num="UPDATE project SET project.num_score = $totalGrade WHERE project.project_id = $projectEva";
            $query_au_num_ex=$conn->query($query_au);
            $query_au_num_ex->setFetchMode(PDO::FETCH_ASSOC);

    header('location: ../teacherPages/evaluation.php');         

}else if($totalGrade >= 86 && $totalGrade <= 96){ //DE

    $query_de="UPDATE project SET project.score = 'DE' WHERE project.project_id = $projectEva";
            $query_au_ex=$conn->query($query_de);
            $query_au_ex->setFetchMode(PDO::FETCH_ASSOC);

    $query_de_num="UPDATE project SET project.num_score = $totalGrade WHERE project.project_id = $projectEva";
            $query_au_num_ex=$conn->query($query_de);
            $query_au_num_ex->setFetchMode(PDO::FETCH_ASSOC);

        header('location: ../teacherPages/evaluation.php');       

}else if($totalGrade >= 80 && $totalGrade < 86){ //SA

    $query_sa="UPDATE project SET project.score = 'SA' WHERE project.project_id = $projectEva";
            $query_sa_ex=$conn->query($query_sa);
            $query_sa_ex->setFetchMode(PDO::FETCH_ASSOC);

    $query_sa_num="UPDATE project SET project.num_score = $totalGrade WHERE project.project_id = $projectEva";
            $query_sa_num_ex=$conn->query($query_sa);
            $query_sa_num_ex->setFetchMode(PDO::FETCH_ASSOC);

            header('location: ../teacherPages/evaluation.php');   

}else{ //NA

    $query_na="UPDATE project SET project.score = 'NA' WHERE project.project_id = $projectEva";
            $query_na_ex=$conn->query($query_sa);
            $query_na_ex->setFetchMode(PDO::FETCH_ASSOC);

    $query_na_num="UPDATE project SET project.num_score = $totalGrade WHERE project.project_id = $projectEva";
            $query_na_num_ex=$conn->query($query_na);
            $query_na_num_ex->setFetchMode(PDO::FETCH_ASSOC);

            header('location: ../teacherPages/evaluation.php');            

}

?>