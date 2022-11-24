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
    <title>MyUser-Prior</title>

    <!--Connections-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../Styles/navteacher.css">
    <link rel="stylesheet" href="../Styles/items.css">
    <link rel="stylesheet" href="../Styles/myuser.css">

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
          <div class="col-3">
          </div>
          <div class="col-8">
                <br> 
            <div class="card mb-3 bg-black" style="max-width: 600px;">
                <div class="card mb-8 bg-black text-light" style="max-width: 600px;">
                    <div class="row g-0">

                      <div class="col-md-4">
                        <img src="../images/pic.png" class="img-fluid rounded-start" alt="...">
                        <br> <br>
                      </div>

                      <div class="col-md-8">

                        <div class="card-body">
                          <h5 class="card-title">Dafnis Cain Villagran</h5>
                          <h6 class="fw-bold">Teacher: </h6> 
                          <h6>TI</h6>
                          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                          <a class="edit-button fw-bold" href="../teacherPages/myprofileEditT.php"><ion-icon name="create-outline"></ion-icon> Edit profile</a>
                        
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

<!--Si no esta logueado pa atrás papa-->
<?php 

}else{

     header("Location: ../teacherPages/tMyuser.php");

     exit();

}

 ?>