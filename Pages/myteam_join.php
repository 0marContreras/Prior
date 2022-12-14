<!--Checa si el usuario esta logueado o no-->
<?php 
include('../back-end/PDO.php');

session_start();



if (isset($_SESSION['email'])) {
    
    $email=$_SESSION['email'];
    
    //Get IdTeam Pa comparar fhofehoese
    $query_getIdTeam="SELECT id_team FROM users WHERE user_email='$email'";
    $query_getIdTeam_ex=$conn->query($query_getIdTeam);
    $query_getIdTeam_ex->setFetchMode(PDO::FETCH_ASSOC);
    while ($row = $query_getIdTeam_ex->fetch()):
        $id_team=$row['id_team'];
    endwhile; 

    if ($id_team == 7) {

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
      <div class="container">
        <div class="row">
            <div class="col-sm-6 ">
            <div class="card bg-black text-light">
                <div class="card-body">
                <h5 class="card-title">Create team</h5>
                <p class="card-text">Create a new team with your classmates.</p>
                <a href="../Pages/myteam_creation.php" class="btn btn-primary">Create team</a>
                </div>
            </div>
            </div>
            <div class="col-sm-6">
            <div class="card bg-black text-light">
                <div class="card-body">
                    
                    <div class="form-group">
                        <h5 class="card-title">Join a team</h5>
                        <label class="form-label" for="teamcode">Insert a TeamCode:</label>
                        <div class="container">
                            <div class="row">

                                    <form method="POST" action="../back-end/joinTeam.php"> <!--Aqui va el script PHP-->

                                            <!--Textfield que retorna el codigo que se inserto para unirse al equipo a partir del
                                                name: teamcode-->
                                            <div class="col-4">
                                                <input class="form-control teamcode_field" name="teamcode" type="text" id="teamcode" required> 
                                            </div>
                                            <br>

                                            <div class="col">
                                                <input type="submit" class="btn btn-primary" value="Submit" id="submit-code"> <!--Submitea el form-->
                                            </div>
                                    </form>
                              </div>
                        </div>
                    </div>
                
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
<!--Si no esta logueado pa atr??s papa-->
<?php 
    }else{

        header("Location: ../Pages/myteam.php");
    }
}else{

     header("Location: ../Pages/login.php");

     exit();

}

 ?>