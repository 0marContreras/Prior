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
      </div>


      <!--Aqui van los proyectos de los maestros que van a evaluar, en el backend se comprobara que carrear es y con un if/switch mostrara solo los proyectos de la carrera-->
      <div class="container text-center mt-5">
        <div class="row row-cols-3">

            <div class="col">
                
                
            <div class="card mb-3 bg-black text-light" style="max-width: 540px;">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img src="../images/book.jpg" class="img-fluid rounded-start" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">

                      <!--Contiene el id y name del titulo-->
                      <h5 class="card-title" name="project-card-title" id="project-card-title">Infinite book</h5>

                      <!--Contiene el id y name del equipo-->
                      <h6 class="card-title" name="project-card-team"  id="project-card-team">Evangelion Girls</h6>

                      <!--Contiene el id y name del grupo-->
                      <h6 class="card-title" name="project-card-group" id="project-card-group">TIDBIS21M</h6>

                      <!--Contiene el id y name de la descripcion-->
                      <p class="card-text"   name="project-card-desc"  id="project-card-desc">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia quaerat itaque laborum! Est rerum exercitationem pariatur beatae soluta omnis, quam laborum dolorum amet ipsam corporis? Dolor asperiores quas voluptas exercitationem..</p>
                      
                      <form action="">
                        <button type="submit" id="toEavluate" name="toEvaluate" class="btn btn-orange">Evaluate</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!--------------------------------------------Db selects---------------------------------------------->

            </div>


<!--------------------------A partir de aqui solo se reusa el ejemplo, pero se debe resperar la estructura de columnas---------------->
            <div class="col">
                
              <div class="card mb-3 bg-black text-light" style="max-width: 540px;">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img src="../images/book.jpg" class="img-fluid rounded-start" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">

                      <!--Contiene el id y name del titulo-->
                      <h5 class="card-title" name="project-card-title" id="project-card-title">Infinite book</h5>

                      <!--Contiene el id y name del equipo-->
                      <h6 class="card-title" name="project-card-team"  id="project-card-team">Evangelion Girls</h6>

                      <!--Contiene el id y name del grupo-->
                      <h6 class="card-title" name="project-card-group" id="project-card-group">TIDBIS21M</h6>

                      <!--Contiene el id y name de la descripcion-->
                      <p class="card-text"   name="project-card-desc"  id="project-card-desc">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia quaerat itaque laborum! Est rerum exercitationem pariatur beatae soluta omnis, quam laborum dolorum amet ipsam corporis? Dolor asperiores quas voluptas exercitationem..</p>
                      
                      <form action="">
                        <button type="submit" id="toEavluate" name="toEvaluate" class="btn btn-orange">Evaluate</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!--------------------------------------------Db selects---------------------------------------------->

            </div>

            <div class="col">
                
              <div class="card mb-3 bg-black text-light" style="max-width: 540px;">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img src="../images/book.jpg" class="img-fluid rounded-start" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">

                      <!--Contiene el id y name del titulo-->
                      <h5 class="card-title" name="project-card-title" id="project-card-title">Infinite book</h5>

                      <!--Contiene el id y name del equipo-->
                      <h6 class="card-title" name="project-card-team"  id="project-card-team">Evangelion Girls</h6>

                      <!--Contiene el id y name del grupo-->
                      <h6 class="card-title" name="project-card-group" id="project-card-group">TIDBIS21M</h6>

                      <!--Contiene el id y name de la descripcion-->
                      <p class="card-text"   name="project-card-desc"  id="project-card-desc">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia quaerat itaque laborum! Est rerum exercitationem pariatur beatae soluta omnis, quam laborum dolorum amet ipsam corporis? Dolor asperiores quas voluptas exercitationem..</p>
                      
                      <form action="">
                        <button type="submit" id="toEavluate" name="toEvaluate" class="btn btn-orange">Evaluate</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!--------------------------------------------Db selects---------------------------------------------->
                



            </div>

            <div class="col">
                
              <div class="card mb-3 bg-black text-light" style="max-width: 540px;">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img src="../images/book.jpg" class="img-fluid rounded-start" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">

                      <!--Contiene el id y name del titulo-->
                      <h5 class="card-title" name="project-card-title" id="project-card-title">Infinite book</h5>

                      <!--Contiene el id y name del equipo-->
                      <h6 class="card-title" name="project-card-team"  id="project-card-team">Evangelion Girls</h6>

                      <!--Contiene el id y name del grupo-->
                      <h6 class="card-title" name="project-card-group" id="project-card-group">TIDBIS21M</h6>

                      <!--Contiene el id y name de la descripcion-->
                      <p class="card-text"   name="project-card-desc"  id="project-card-desc">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia quaerat itaque laborum! Est rerum exercitationem pariatur beatae soluta omnis, quam laborum dolorum amet ipsam corporis? Dolor asperiores quas voluptas exercitationem..</p>
                      
                      <form action="">
                        <button type="submit" id="toEavluate" name="toEvaluate" class="btn btn-orange">Evaluate</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!--------------------------------------------Db selects---------------------------------------------->

            </div>

            <div class="col">
                
              <div class="card mb-3 bg-black text-light" style="max-width: 540px;">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img src="../images/book.jpg" class="img-fluid rounded-start" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">

                      <!--Contiene el id y name del titulo-->
                      <h5 class="card-title" name="project-card-title" id="project-card-title">Infinite book</h5>

                      <!--Contiene el id y name del equipo-->
                      <h6 class="card-title" name="project-card-team"  id="project-card-team">Evangelion Girls</h6>

                      <!--Contiene el id y name del grupo-->
                      <h6 class="card-title" name="project-card-group" id="project-card-group">TIDBIS21M</h6>

                      <!--Contiene el id y name de la descripcion-->
                      <p class="card-text"   name="project-card-desc"  id="project-card-desc">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia quaerat itaque laborum! Est rerum exercitationem pariatur beatae soluta omnis, quam laborum dolorum amet ipsam corporis? Dolor asperiores quas voluptas exercitationem..</p>
                      
                      <form action="">
                        <button type="submit" id="toEavluate" name="toEvaluate" class="btn btn-orange">Evaluate</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!--------------------------------------------Db selects---------------------------------------------->

            </div>

            <div class="col">
                
              <div class="card mb-3 bg-black text-light" style="max-width: 540px;">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img src="../images/book.jpg" class="img-fluid rounded-start" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">

                      <!--Contiene el id y name del titulo-->
                      <h5 class="card-title" name="project-card-title" id="project-card-title">Infinite book</h5>

                      <!--Contiene el id y name del equipo-->
                      <h6 class="card-title" name="project-card-team"  id="project-card-team">Evangelion Girls</h6>

                      <!--Contiene el id y name del grupo-->
                      <h6 class="card-title" name="project-card-group" id="project-card-group">TIDBIS21M</h6>

                      <!--Contiene el id y name de la descripcion-->
                      <p class="card-text"   name="project-card-desc"  id="project-card-desc">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia quaerat itaque laborum! Est rerum exercitationem pariatur beatae soluta omnis, quam laborum dolorum amet ipsam corporis? Dolor asperiores quas voluptas exercitationem..</p>
                      
                      <form action="">
                        <button type="submit" id="toEavluate" name="toEvaluate" class="btn btn-orange">Evaluate</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!--------------------------------------------Db selects---------------------------------------------->

            </div>
          
        </div>
      </div>
<!--Aqui van los proyectos de los maestros que van a evaluar, en el backend se comprobara que carrear es y con un if/switch mostrara solo los proyectos de la carrera-->


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

header("Location: ../Pages/login.php");

exit();

}

?>