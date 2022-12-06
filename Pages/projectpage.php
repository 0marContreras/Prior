<!--Checa si el usuario esta logueado o no-->
<?php 

include('../back-end/PDO.php');

session_start();

$email=$_SESSION['email'];


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
    <link rel="stylesheet" href="../Styles/myproject.css">

</head>
<body>


    <div class="container-sm text-center sticky-top">
        <div class="row">
          <div class="col-12">

            <div class="notch-container">
                <div class="notch">
                    <ul>
                        <li class="notch-list">
                            <a href="../Pages/myproject.php">
                                <span class="notch-icon notch-myproject"><ion-icon name="hardware-chip-outline"></ion-icon></span>
                                <span class="notch-text notch-myproject-text">My project</span>
                            </a>
                        </li>
                        <li class="notch-list">
                            <a href="../Pages/ideas.php">
                                <span class="notch-icon notch-ideas"><ion-icon name="rainy-outline"></ion-icon></ion-icon></span>
                                <span class="notch-text notch-ideas-text">Ideas</span>
                            </a>
                        </li>
                        <li class="notch-list">
                            <a href="../Pages/home.php">
                                <span class="notch-icon notch-home"><ion-icon name="home-outline"></ion-icon></span>
                                <span class="notch-text notch-home-text">Home</span>
                            </a>
                        </li>
                        <li class="notch-list">
                            <a href="../Pages/myteam_join.php">
                                <span class="notch-icon notch-myteam"><ion-icon name="people-outline"></ion-icon></span>
                                <span class="notch-text notch-myteam-text">My team</span>
                            </a>
                        </li>
                        <li class="notch-list">
                            <a href="../Pages/myuser.php">
                                <span class="notch-icon notch-myuser"><ion-icon name="person-circle-outline"></ion-icon></span>
                                <span class="notch-text notch-myuser-text">My user</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

          </div>
        </div>
   
    <br><br>
    
    <div class="container"><?php
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

    $query_get_project="SELECT project.project_name,
    project.Logotipos,
    team.name_team,
    project.Description
    FROM project
    JOIN team
    ON project.id_Team = team.id_Team
    WHERE project.id_project = '$id_project'";
    $query_get_project_ex=$conn->query($query_get_project);
    $query_get_project_ex->setFetchMode(PDO::FETCH_ASSOC);

    while ($row2 = $query_get_project_ex->fetch()):
        
    ?>
    
    <center>
      <div class="card mb-3 bg-black text-light text-start col-7">
      <img class="bg-light" src="data:image/jpeg;base64,<?php  echo base64_encode($row2['Logotipos']);?>" width="740" height="400"/>
        <div class="card-body ">
          <h3 class="card-title"><?php echo $row2['project_name'];?></h3>
          <h4 class="card-title"><?php echo $row2['name_team'];?></h4>
          <p class="card-text"><?php echo $row2['Description'];?></p>
          
          <a class="edit-butt fw-bold" href="../Pages/projectEdit.php">
                    <ion-icon name="create-outline"></ion-icon> Edit project
                </a>
                <br><br>
        <button class="btn btn-purple" data-bs-toggle="collapse" data-bs-target='#collProject' aria-expanded="false" aria-controls='collProject'>View comments</button> 

        <?php 
        $query_com = "SELECT * FROM project_comment JOIN users ON project_comment.id_user = users.id_user WHERE project_comment.id_project = $id_project;";
        $query_com_ex=$conn->query($query_com);
        $query_com_ex->setFetchMode(PDO::FETCH_ASSOC);
    ?>            
    
        <div class="collapse bg-black" id="collProject">
        <?php 
                    while ($row = $query_com_ex->fetch()): ?>

                    <br>
                      <!--Esta card se va a loopear con los comments-->
                    <div class="card bg-dark text-light">
                        
                        <div class="card-body text-start">
                          <h5 class="card-title"><label name="project-comment-name"><?php echo $row['Username'];?></label></h5>
                          <p class="card-text"><label name="project-comment"><?php echo $row['Comment'];?></label></p>
                        </div>
                      </div>
                      <?php endwhile;?>
                      <br><br>
        </div>

    </div>

        </div>
      </div>
    </div>
    
    
    </center>
    <?php endwhile; ?>
    <br><br>

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