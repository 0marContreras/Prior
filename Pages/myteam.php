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
    
      
      <br><br>

  <div class="container">
    <div class="row">
        <div class="col-sm-6">
            <?php 
            include('../back-end/PDO.php');
            $email=$_SESSION['email'];

            $query_get_idteam="SELECT id_team FROM users WHERE user_email='$email'";
            $query_get_idteam_ex=$conn->query($query_get_idteam);
            $query_get_idteam_ex->setFetchMode(PDO::FETCH_ASSOC);
            while ($row = $query_get_idteam_ex->fetch()):
                $id_team=$row['id_team'];
            endwhile;

            $query_show_teammembers="SELECT users.Username, users.id_team, groups.group_name
            FROM users
            JOIN groups
            ON users.id_team = groups.id_group
            WHERE users.id_team = '$id_team'";
            $query_show_teammembers_ex=$conn->query($query_show_teammembers);
            $query_show_teammembers_ex->setFetchMode(PDO::FETCH_ASSOC);

                ?>
        <div class="card bg-black">
            <div class="card-body text-start">
            <h4 class="card-title text-white">Members</h4>
            <br>
            <?php while ($row1 = $query_show_teammembers_ex->fetch()): ?>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><h5><?php echo $row1['Username']; ?></h5><?php echo $row1['group_name']; ?></li>
              </ul>
            <?php endwhile;?>
            </div>
        </div>
        </div>
        <?php 
        $query_show_team="SELECT team.name_team,
        team.logo,
        carreers.career,
        team.description_team
        FROM team 
        JOIN carreers
        ON carreers.id_career = team.id_Career
        WHERE team.id_Team = '$id_team'";
        $query_show_team_ex=$conn->query($query_show_team);
        $query_show_team_ex->setFetchMode(PDO::FETCH_ASSOC);
        while ($row2=$query_show_team_ex->fetch()):
        ?>
        <div class="col-sm-6">
        <div class="card bg-black text-start text-light">
            <div class="card-body">
            <img src="data:image/jpeg;base64,<?php  echo base64_encode($row2['logo']);?>" width="170" height="170"/>
            <br><br>
            <h4 class="card-title">My team</h4>
            
            <br>
            <h5 class="card-text"><?php echo $row2['name_team']; ?></h5>
            <p class="card_text"><?php echo $row2['career']; ?></p>
            
              <h5 class="card-text">Description</h5>
            <p class="card-text"><?php echo $row2['description_team']; ?><br><br>
            <a class="text-decoration-none fw-bold" href="../Pages/teamEdit.php"><ion-icon name="create-outline"></ion-icon> Edit team</a>
                            
            </div>
        </div>
        <?php endwhile; ?>
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