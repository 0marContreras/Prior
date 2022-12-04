<!--Checa si el usuario esta logueado o no-->
<?php 

session_start();

if (isset($_SESSION['email'])) {

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluation - prior</title>

 <!--Connections-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../Styles/navteacher.css">
    <link rel="stylesheet" href="../Styles/items.css">
    <link rel="stylesheet" href="../Styles/evaluation.css">

</head>
<body>
    
    <div class="container-sm text-center sticky-top">
        <div class="row">
          <div class="col-12">
    
            <div class="notch-container">
                <div class="notch">
                    <ul>
                        
    
                        <li class="notch-list">
                            <a href="../teacherPages/tideas.php">
                                <span class="notch-icon notch-ideas"><ion-icon name="rainy-outline"></ion-icon></ion-icon></span>
                                <span class="notch-text notch-ideas-text">Ideas</span>
                            </a>
                        </li>
                        <li class="notch-list">
                            <a href="../teacherPages/tHome.php">
                                <span class="notch-icon notch-home"><ion-icon name="home-outline"></ion-icon></span>
                                <span class="notch-text notch-home-text">Home</span>
                            </a>
                        </li>
                        <li class="notch-list">
                            <a href="../teacherPages/evaluation.php">
                                <span class="notch-icon notch-evaluation"><ion-icon name="checkmark-circle-outline"></ion-icon></span>
                                <span class="notch-text notch-evaluation-text">Evaluation</span>
                            </a>
                        </li>
                       
                        <li class="notch-list">
                          <a href="../teacherPages/tMyuser.php">
                              <span class="notch-icon notch-myuser"><ion-icon name="person-circle-outline"></ion-icon></span>
                              <span class="notch-text notch-myuser-text">My user</span>
                          </a>
                      </li>
    
                    </ul>
                </div>
            </div>
    
          </div>
        </div>



      <!--Aqui van los proyectos de los maestros que van a evaluar, en el backend se comprobara que carrear es y con un if/switch mostrara solo los proyectos de la carrera-->

      <?php
            
            include('../back-end/PDO.php');
            
            $query_show_all_project="SELECT project.id_project,
              project.project_name, 
              project.Description, 
              project.Logotipos,
              team.name_team,
              groups.group_name
            FROM project
            JOIN team
            ON project.id_Team=team.id_Team
            JOIN groups
            ON groups.id_group=project.id_group
            WHERE project.score = 'Not graded';";
            $query_show_all_project_ex=$conn->query($query_show_all_project);
            $query_show_all_project_ex->setFetchMode(PDO::FETCH_ASSOC);
            ?>




      <div class="container mt-5">

      
        <div class="row row-cols-3">

        <?php while ($row = $query_show_all_project_ex->fetch()):
           ?>

          <div class="col">
                
                
            <div class="card mb-3 bg-black text-light " style="max-width: 540px;">
                <div class="row g-0">
                  <div class="col-md-5">
                  <img class="card-img" src="data:image/jpeg;base64,<?php  echo base64_encode($row['Logotipos']);?>" width="180" height="180"/>
                  
                </div>
                  <div class="col-md-7">
                    <div class="card-body text-start">

                      <!--Contiene el id y name del titulo-->
                      <h5 class="card-title" name="project-card-title" id="project-card-title"><?php echo $row['project_name']; ?></h5>

                      <!--Contiene el id y name del equipo-->
                      <h6 class="card-title" name="project-card-team"  id="project-card-team"><?php echo $row['name_team'];?></h6>

                      <!--Contiene el id y name del grupo-->
                      <h6 class="card-title" name="project-card-group" id="project-card-group"><?php echo $row['group_name'];?></h6>

                      <!--Contiene el id y name de la descripcion-->
                      <p class="card-text"   name="project-card-desc"  id="project-card-desc"><?php echo $row['Description']; ?></p>
                      
                      <form method="POST" action="../teacherPages/rubric.php">
                        <button type="submit" id="toEvaluate" value=$id_project name="toEvaluate" class="btn btn-orange">Evaluate</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!--------------------------------------------Db selects---------------------------------------------->

            </div><?php endwhile;?>

          </div>
          </div>
          




    <div class="prior-footer sticky-bottom">
        <div class="wave"></div>
        <div class="wave"></div>
        <div class="wave"></div>
     </div>

     <!--Connections-->
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>    
    <!--Icons-->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>

<?php
}else{

header("Location: ../teacherPages/tMyuser.php");

exit();

}

?>