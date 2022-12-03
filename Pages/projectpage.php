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
    <?php 
    $query_get_project="SELECT project.project_name,
    team.name_team,
    project.Description
    FROM project
    JOIN team
    ON project.id_Team = team.id_Team;"
    ?>
    <div class="container">
      <div class="card mb-3 bg-black text-light">
        <img class="project-logo bg-light"  src="../images/TLogo.png" class="card-img-top" alt="...">
        <div class="card-body">
          <h4 class="card-title">TL Notes</h4>
          <h5 class="card-title">Mosquera Studios</h5>
          <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt provident odit atque vero officiis animi distinctio cumque iste eveniet nam, consequuntur labore rerum ipsa iusto rem quas laboriosam laborum nobis?
          Reiciendis perferendis maiores enim doloribus facere veniam asperiores accusamus, tempore nam reprehenderit sed sunt sint dolorem quis libero, incidunt dolor labore officiis culpa, itaque possimus maxime necessitatibus? Eum, quia ea?
          Neque optio natus, explicabo temporibus susc tempore voluptate ea, itaque assumenda voluptates praesentium sunt eius inventore quis quos maxime ex laudantium laboriosam aliquam? Eligendi ex repellat vero harum?
          Odio fugit nostrum ipsa. Cumque, dolorum, voluptatibus moihil tenetur fugit eos corrupti at quibusdam aliquid eligendi assumenda culpa distinctio illum id quis cumque? Fugit, odit ipsum?
          Sunt fuga sit earum nisi, minima, quis a nam quod iste quidem maxime accusamus non eos voluptatem voluptatum animi consequatur alias amet perferendis id odit obcaecati illo numquam sapiente. Nemo?.</p>
          
          <a class="edit-butt fw-bold" href="../Pages/projectEdit.php">
                    <ion-icon name="create-outline"></ion-icon> Edit project
                </a>
        </div>
      </div>
    </div>

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