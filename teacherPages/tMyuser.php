<!--Checa si el usuario esta logueado o no-->
<?php 

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
    
      
      <div class="container-sm text-center sticky-top">

        <div class="row">
          <div class="col-3">
          </div>
         
<div class="col-8 text-start">
    <br> 
<?php
            
            include('../back-end/PDO.php');

            $query_show_all_project ="SELECT users.Username,
            groups.group_name,
            team.name_team,
            users.descriptions
            FROM users
            JOIN groups
            ON groups.id_group=users.id_group
            JOIN team
            ON team.id_Team=users.id_team
            WHERE users.user_email='$email'";
            $query_show_all_project_ex=$conn->query($query_show_all_project);
            $query_show_all_project_ex->setFetchMode(PDO::FETCH_ASSOC);

            while ($row=$query_show_all_project_ex->fetch()):
            
        ?>    
<div class="card mb-3 bg-black" style="max-width: 600px;">
    <div class="card mb-8 bg-black text-light" style="max-width: 600px;">
        <div class="row g-0">

          <div class="col-md-4">
            <img src="../images/not-found.jpg" class="img-fluid rounded-start" alt="...">
            <br><br>
            
          </div>
          
          <div class="col-md-8">

            <div class="card-body">
             

                <h5 class="card-title"><?php echo $row['Username']; ?></h5>
                <p class="card-text">Biography:</p>
                <p class="card-text"><?php echo $row['descriptions']; ?></p>
                <a class="edit-button fw-bold" href="../Pages/myprfileEdit.php">
                    <ion-icon name="create-outline"></ion-icon> Edit profile
                </a> 
                        </div><?php endwhile; ?>
                       </div>
                       <div class="row">
                         <div class="col-3">
                                <!--Boton de logout, nos manda a logout.php-->
                                <form class="needs-validation" method="POST" action="../back-end/logout.php">
                                    <input class="col-12 mb-3 btn btn-danger" type="submit" value="Log out">
                                    <!--<button type="button" class=" col-12 mb-3 btn btn-danger ">Log out</button>-->
                                </form>
                            </div>
                            <div class="col-9"></div>
                            
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