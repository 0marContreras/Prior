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
    <title>Ideas - Prior</title>

    <!--Connections-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../Styles/navteacher.css">
    <link rel="stylesheet" href="../Styles/items.css">
    <link rel="stylesheet" href="../Styles/ideas.css">

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
  </div>
    
      <div class="container">
        <div class="row">
          <div class="col-4">

            <ul class="list-group">
                <li class="list-group-item bg-black text-light">
                  <input class="form-check-input me-1" type="radio" name="listGroupRadio" value="" id="all-idea" checked>
                  <label class="form-check-label stretched-link" for="all-idea">All</label>
                </li>
                <li class="list-group-item bg-black text-light">
                  <input class="form-check-input me-1" type="radio" name="listGroupRadio" value="" id="tic-idea">
                  <label class="form-check-label stretched-link" for="tic-idea">TIC</label>
                </li>
                <li class="list-group-item bg-black text-light">
                  <input class="form-check-input me-1" type="radio" name="listGroupRadio" value="" id="dn-idea">
                  <label class="form-check-label stretched-link" for="dn-idea">DN</label>
                </li>
                <li class="list-group-item bg-black text-light">
                    <input class="form-check-input me-1" type="radio" name="listGroupRadio" value="" id="pim-idea">
                    <label class="form-check-label stretched-link" for="pim-idea">PIM</label>
                  </li>
                  <li class="list-group-item bg-black text-light">
                    <input class="form-check-input me-1" type="radio" name="listGroupRadio" value="" id="li-idea">
                    <label class="form-check-label stretched-link" for="li-idea">LI</label>
                  </li>
              </ul>

              <br> 

              <div class="d-grid gap-2 col-6 mx-auto">
                <a class="btn btn-dark text-warning" href="../teacherPages/tCreateidea.php" type="button">I have an idea!</a>
                
              </div>

          </div>
          <div class="col-8">

          
            <br>
            <?php
            
            include('../back-end/PDO.php');
            
            $query_show_all_project="SELECT rain_ideas.title,
            rain_ideas.description,
            users.Username
            FROM rain_ideas
            JOIN users
            ON rain_ideas.id_user=users.id_user;";
            $query_show_all_project_ex=$conn->query($query_show_all_project);
            $query_show_all_project_ex->setFetchMode(PDO::FETCH_ASSOC);

            while ($row=$query_show_all_project_ex->fetch()):

            ?>
            <div class="card mb-3 bg-black text-light" style="max-width: 540px;">
                <div class="row g-0">
                  <div class="col-md-12">
                    <div class="card-body">
                      <h5 class="card-title" name="idea-title" id="idea-title"><?php echo $row['title'];?></h5>
                      <h6 class="card-title" name="idea-user" id="idea-user"><?php echo $row['Username'];?></h6>
                      <p class="card-text" name="idea-group" id="idea-group"><?php echo $row['description'];?></p>
                      <div class="rate">
                        <label for="star" title="text">star</label>
                      </div>
                      
                      <div>
                        <button class="btn btn-warning" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">View More</button>
                    </div>
                      
                      <div class="collapse" id="collapseExample">
                        <br>
                          
                        <form action=""> <!--Aqui va el script php-->
                        <div class="card bg-dark text-light">
                            <h5 class="card-header"><label name="project-comment-title">Comment:</label></h5>
                            <div class="card-body">

                                <div class="form-floating text-dark">
                                    <textarea class="form-control" placeholder="Leave a comment here" name="new-idea-com" id="new-idea-com"></textarea>
                                    <label for="new-idea-com">Comment</label>
                                  </div>
                                  <br>
                                  
                            <button class="btn btn-warning" type="submit">Publish</button>    
                            </div>
                        </div>
                    </form>
                    <br>
                      <!--Esta card se va a loopear con los comments-->
                    <div class="card bg-dark text-light">
                        <h5 class="card-header"><label name="project-comment-title">TIDBIS31M</label></h5>
                        <div class="card-body">
                          <h5 class="card-title"><label name="project-comment-name">Javier tokyo</label></h5>
                          <p class="card-text"><label name="project-comment">Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores quia fugit molestias placeat consequuntur amet deleniti, mollitia cumque sequi inventore consequatur ullam ad nesciunt! Neque mollitia cum iusto obcaecati eius..</label></p>
                        </div>
                      </div>
                      </div>
                        
                    </div>
                  </div>
                </div>
              </div>
              <?php endwhile;?>
              

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

<!--Si no esta logueado pa atr??s papa-->
<?php 

}else{

     header("Location: ../Pages/login.php");

     exit();

}

 ?>