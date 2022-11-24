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
    <title>My team - Prior</title>

    <!--Connections-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../Styles/navbar.css">
    <link rel="stylesheet" href="../Styles/items.css">
    <link rel="stylesheet" href="../Styles/myteam.css">

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
    
      
      <br><br>
    </div>
  </div>
  <div class="container">
    <div class="row">
        <div class="col-sm-6">
        <div class="card bg-black">
            <div class="card-body">
            <h4 class="card-title text-white">Members</h4>
            <br>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><h5>Omar Contreras</h5>TIDBIS31M</li>
                <li class="list-group-item"><h5>Javier Acosta</h5>TIDBIS31M</li>
                <li class="list-group-item"><h5>Derek Torres</h5>TIDBIS31M</li>
                <li class="list-group-item"><h5>Samuel Moo</h5>TIDBIS31M</li>
              </ul>
              
            </div>
        </div>
        </div>
        <div class="col-sm-6">
        <div class="card bg-black text-light">
            <div class="card-body">
                <img src="../images/moscas.png" class="img-fluid rounded float-end" alt="..." width="200" 
            height="200">
            <h4 class="card-title">My team</h4>
            
            <br>
            <h5 class="card-text">Mosquera Soft.</h5>
            <p class="card_text">TIDBIS31M</p>
            
              <h5 class="card-text">Description</h5>
            <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Expedita reprehenderit ipsa cumque repellat maiores sed, molestias saepe nulla sapiente. Eaque id illo cum ipsam magni blanditiis ratione reprehenderit vel sequi.</p><br><br></p>
            </div>
        </div>
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