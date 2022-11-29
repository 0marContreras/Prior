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
    <title>Home - Prior</title>

    <!--Connections-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../Styles/navbar.css">
    <link rel="stylesheet" href="../Styles/items.css">
    <link rel="stylesheet" href="../Styles/home.css">

</head>
<body>

<?php
            
            include('../back-end/PDO.php');
            
            $pid = $_POST["view-more-btn-value"];

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
            WHERE project.id_project = '$pid'";
            $query_show_all_project_ex=$conn->query($query_show_all_project);
            $query_show_all_project_ex->setFetchMode(PDO::FETCH_ASSOC);

            ?>

<?php 
                    while ($row = $query_show_all_project_ex->fetch()):?>
              <div class="card mb-3 bg-black text-light" style="max-width: 540px;">
                <div class="row g-0">
                  <div class="col-md-4">
                    
                    <img src="../images/not-found.jpg" class="img-fluid rounded-start" alt="...">
                    
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">

                    

                      <!--Contiene el id y name del titulo-->
                      <h5 class="card-title" name="project-card-title" id="project-card-title"><?php echo $row['project_name']; ?></h5>

                      <!--Contiene el id y name del equipo-->
                      <h6 class="card-title" name="project-card-team"  id="project-card-team"><?php echo $row['name_team'];?></h6>

                      <!--Contiene el id y name del grupo-->
                      <h6 class="card-title" name="project-card-group" id="project-card-group"><?php echo $row['group_name'];?></h6>

                      <!--Contiene el id y name de la descripcion-->
                      <p class="card-text"   name="project-card-desc"  id="project-card-desc"><?php echo $row['Description']; ?></p>
                      
                      <div class="rate">
                        <!--Estrellas y values-->
                        <input type="radio" id="star" name="rate" value="1" />
                        <label for="star3" title="text">star</label>
                      </div>
                      
                      
                    </div>
                  </div>
                </div>
              </div><?php
              endwhile;?>

       <br><br><br><br>
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

<!--Si no esta logueado pa atrás papa-->
<?php 

}else{

     header("Location: ../Pages/login.php");

     exit();

}

 ?>