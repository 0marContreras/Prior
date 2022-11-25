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
    <link rel="stylesheet" href="../Styles/ideas.css">


</head>
<body>

<!---Navbar--------------------------------------No tocar en back... por el momento------------------------------------------------>
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
<!---Navbar--------------------------------------No tocar en back... por el momento------------------------------------------------>


<!-----container para publicar idea----->
      <div class="container ">
        <div class="card mb-3 bg-black text-light">
            <form method="POST" action="../back-end/addIdea.php"> <!--Aqui va el PHP-->


                 <!--Titulo de la idea-->
                <div class="form-group mb-3">
                    <label for="idea-title" class="form-label"><h3>Title</h3></label>
                    <input type="text" class="form-control" name="idea-title" id="idea-title" placeholder="" required> <!--Retorna el titulo de la idea  en un var para backend-->
                </div>
                 <!--Titulo de la idea-->

                 <!--Idea (texto)-->
                <div class="form-group mb-3">
                    <label for="idea-description" class="form-label"><h3>Description</h3></label>
                    <textarea class="form-control" name="idea-description" id="idea-description" rows="3" required></textarea> <!--retorna un texto que puede ser largo esto es el contenido de la idea-->
                    <br>
                    <input class="btn btn-warning w-100" type="submit" value="Publish idea">
                </div>
            </form>
            <!--idea (texto)-->    


    </div>
    </div>  
<!-----container para publicar idea----->

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