<!--Checa si el usuario esta logueado o no-->
<?php 

session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

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
                            <a href="../Pages/myproject.html">
                                <span class="notch-icon notch-myproject"><ion-icon name="hardware-chip-outline"></ion-icon></span>
                                <span class="notch-text notch-myproject-text">My project</span>
                            </a>
                        </li>
                        <li class="notch-list">
                            <a href="../Pages/ideas.html">
                                <span class="notch-icon notch-ideas"><ion-icon name="rainy-outline"></ion-icon></ion-icon></span>
                                <span class="notch-text notch-ideas-text">Ideas</span>
                            </a>
                        </li>
                        <li class="notch-list">
                            <a href="../Pages/home.html">
                                <span class="notch-icon notch-home"><ion-icon name="home-outline"></ion-icon></span>
                                <span class="notch-text notch-home-text">Home</span>
                            </a>
                        </li>
                        <li class="notch-list">
                            <a href="../Pages/myteam_join.html">
                                <span class="notch-icon notch-myteam"><ion-icon name="people-outline"></ion-icon></span>
                                <span class="notch-text notch-myteam-text">My team</span>
                            </a>
                        </li>
                        <li class="notch-list">
                            <a href="../Pages/myuser.html">
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

          </div>
          <div class="col-8">

            <!--------------------------------------------Db selects---------------------------------------------->
            <br>
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
                      
                      <div class="rate">
                        <!--Estrellas y values-->
                        <input type="radio" id="star" name="rate" value="1" />
                        <label for="star3" title="text">star</label>
                      </div>
                      <a href="./homeViewMore.html" class="btn btn-happy">View more</a>
                    </div>
                  </div>
                </div>
              </div>
              <br>
              <!--------------------------------------------Db selects---------------------------------------------->

              <!--
            <div class="card mb-3 bg-black text-light" style="max-width: 540px;">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img src="../images/book.jpg" class="img-fluid rounded-start" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">Infinite book</h5>
                      <h6 class="card-title">Evangelion Girls</h6>
                      <h6 class="card-title">TIDBIS21M</h6>
                      <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia quaerat itaque laborum! Est rerum exercitationem pariatur beatae soluta omnis, quam laborum dolorum amet ipsam corporis? Dolor asperiores quas voluptas exercitationem..</p>
                      <div class="rate">
                        <input type="radio" id="star6" name="rate" value="3" />
                        <label for="star6" title="text">3 stars</label>
                        <input type="radio" id="star5" name="rate" value="2" />
                        <label for="star5" title="text">2 stars</label>
                        <input type="radio" id="star4" name="rate" value="1" />
                        <label for="star4" title="text">1 star</label>
                      </div>
                      <a href="./homeViewMore.html" class="btn btn-happy">View more</a>
                    </div>
                  </div>
                </div>
              </div>

              <br>
            <div class="card mb-3 bg-black text-light" style="max-width: 540px;">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img src="../images/book.jpg" class="img-fluid rounded-start" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">Infinite book</h5>
                      <h6 class="card-title">Evangelion Girls</h6>
                      <h6 class="card-title">TIDBIS21M</h6>
                      <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia quaerat itaque laborum! Est rerum exercitationem pariatur beatae soluta omnis, quam laborum dolorum amet ipsam corporis? Dolor asperiores quas voluptas exercitationem..</p>
                      <div class="rate">
                        <input type="radio" id="star9" name="rate" value="3" />
                        <label for="star9" title="text">3 stars</label>
                        <input type="radio" id="star8" name="rate" value="2" />
                        <label for="star8" title="text">2 stars</label>
                        <input type="radio" id="star7" name="rate" value="1" />
                        <label for="star7" title="text">1 star</label>
                      </div>
                      <a href="./homeViewMore.html" class="btn btn-happy">View more</a>
                    </div>
                  </div>
                </div>
              </div>
              -->
              

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

     header("Location: ../Pages/login.html");

     exit();

}

 ?>