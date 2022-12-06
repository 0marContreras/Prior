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
      </div>
    
      <div class="container">

        <div class="row">
          <div class="col-4 ">

            <ul class="list-group ">
                <li class="list-group-item bg-black text-light">
                  <input class="form-check-input me-1" type="radio" name="listGroupRadio" value="" id="all-radio" checked>
                  <label class="form-check-label stretched-link" for="all-radio">All</label>
                </li>
                <li class="list-group-item bg-black text-light">
                  <input class="form-check-input me-1" type="radio" name="listGroupRadio" value="" id="tic-radio">
                  <label class="form-check-label stretched-link" for="tic-radio">TIC</label>
                </li>
                <li class="list-group-item bg-black text-light">
                  <input class="form-check-input me-1" type="radio" name="listGroupRadio" value="" id="dn-radio">
                  <label class="form-check-label stretched-link" for="dn-radio">DN</label>
                </li>
                <li class="list-group-item bg-black text-light">
                    <input class="form-check-input me-1" type="radio" name="listGroupRadio" value="" id="pim-radio">
                    <label class="form-check-label stretched-link" for="pim-radio">PIM</label>
                  </li>
                  <li class="list-group-item bg-black text-light">
                    <input class="form-check-input me-1" type="radio" name="listGroupRadio" value="" id="li-radio">
                    <label class="form-check-label stretched-link" for="li-radio">LI</label>
                  </li>
              </ul>
              <br>
              <div class="d-grid gap-2  mx-auto">
                
              <form action="../back-end/filter.php" method="POST" class="row g-3">
                <div class="row">
                    <div class="col-10">
                      <input type="text" class="form-control" name="prior-keyword" id="prior-keyword" placeholder="Search here">
                    </div>
                  
                  <div class="col-2">
                      <button type="submit" class="btn btn-dark mb-3">Search</button>
                  </div>
              </div>
              </form>
                
              </div>
          </div>
          <div class="col-8">

            <!--------------------------------------------Db selects---------------------------------------------->
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
            ON groups.id_group=project.id_group;";
            $query_show_all_project_ex=$conn->query($query_show_all_project);
            $query_show_all_project_ex->setFetchMode(PDO::FETCH_ASSOC);

            
            ?>

            <br>
            <?php 
                    while ($row = $query_show_all_project_ex->fetch()):
                    
                    $id_project=$row['id_project'];?>
              <div class="card mb-3 bg-black text-light" style="max-width: 540px;">
                <div class="row g-0">
                  <div class="col-md-4">
                    
                  <img src="data:image/jpeg;base64,<?php  echo base64_encode($row['Logotipos']);?>" width="180" height="180"/>
                    
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
                      
                      <!--ID-->
                      <input name="getid" id="getid" value='<?php echo $row['id_project']; ?>' type="hidden">
                      <div class="rate">
                        <!--Estrellas y values-->
                        <input type="radio" id="star" name="rate" value="1" />
                        <label for="star3" title="text">star</label>
                      </div>
                      <div>
                        <button class="btn btn-happy" data-bs-toggle="collapse" data-bs-target='<?php echo '#'.$row['project_name']; ?>' aria-expanded="false" aria-controls='<?php echo $row['project_name']; ?>'>View More</button>
                    </div>
                      
                      <?php 
                        $query_com = "SELECT project_comment.Comment, users.Username, project.id_project FROM project_comment JOIN users ON project_comment.id_user = users.id_user JOIN project ON project.id_Team = users.id_team WHERE project_comment.id_project = $id_project;";
                        $query_com_ex=$conn->query($query_com);
                        $query_com_ex->setFetchMode(PDO::FETCH_ASSOC);
                      ?>

                      <div class="collapse" id='<?php echo $row['project_name']; ?>'>
                        <br>
                          
                        <form action="../back-end/addComment.php" method="POST"> <!--Aqui va el script php-->
                        
                        <div class="card bg-dark text-light">
                            <h5 class="card-header"><label name="project-comment-title">Comment:</label></h5>
                            <div class="card-body">

                                <div class="form-floating text-dark">
                                    <textarea class="form-control" placeholder="Leave a comment here" name="new-project-com" id="new-idea-com"></textarea>
                                    <label for="new-idea-com">Comment</label>
                                  </div>
                                  <br>
                                  
                            <button class="btn btn-happy" type="submit">Publish</button>    
                            </div>
                        </div>
                    

                    <?php 
                    while ($row1 = $query_com_ex->fetch()): ?>

                    <br>
                      <!--Esta card se va a loopear con los comments-->
                    <div class="card bg-dark text-light">
                        <input name="getid" id="getid" value='<?php $row1['id_project']; ?>' type="hidden">
                        <div class="card-body">
                          <h5 class="card-title"><label name="project-comment-name"><?php echo $row1['Username'];?></label></h5>
                          <p class="card-text"><label name="project-comment"><?php echo $row1['Comment'];?></label></p>
                        </div>
                      </div>
                    </form>
                      <?php endwhile;?>
                      </div>
                    </div>
                  </div>
                </div>
              </div><?php
              endwhile;?>
              <br>
              <!--------------------------------------------Db selects---------------------------------------------->

            
              

          </div>
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

<!--Si no esta logueado pa atrás papa-->
<?php 

}else{

     header("Location: ../Pages/login.php");

     exit();

}

 ?>