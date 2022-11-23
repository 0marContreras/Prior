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
    <link rel="stylesheet" href="../Styles/centered-body.css">
    <link rel="stylesheet" href="../Styles/myteam.css">

</head>
<body>

    <div class="creation bg-black text-light">

        <h1 class="text-center">Create Team</h1>

        <form class="bg-black text-light" action="../Pages/myteam_confirm.php"> <!--Aqui va el script php-->


          <!--ingresa el nombre del equipo-->
            <div class="form-group">
                <label class="form-label" for="project-name">Team name</label>
                <input class="form-control" name="team-name" type="text" id="team-name" required > <!--retorna el nombre del equipo-->
            </div>  
            

            <br>
             <!----------------------------------------Boton de seleccion de grupo registro equipo------------------------------------------->
             <div class="form-group">
              <!--Retorna en el name: team-group-reg el grupo que selecciona al crear un equipo. esto le da al equipo de que salon es-->
              <select name="team-group-reg" id="team-group" class="btn btn-light dropdown-toggle prior-dropdown">

                <option value="selectGroup">Select Group</option>
                <option value="TIDBIS31M">TIDBIS31M</option> <!--Retorna grupo tics-->
                <option value="DNBIS31M">DNBIS31M</option>  <!--Retorna grupo dn-->
                <option value="PIMBIS31M">PIMBIS31M</option>  <!--Retorna grupo procesos-->
                <option value="LIBIS31M">LIBIS31M</option>  <!--Retorna grupo lengua inglesa-->

              </select>
            </div>
            <!----------------------------------------Boton de seleccion de grupo registro equipo------------------------------------------->

              <br><br> <!--br-->

              <!--ingresa la descripcion del equipo-->
              <div class="form-group mb-3">
                <label for="team-description" class="form-label">Description</label>
                <textarea class="form-control" name="team-description" id="team-description" rows="3" required></textarea> <!--retorna la descripcion del equipo-->
              </div>

              <br>

              <!--ingresa el logo del equipo-->
              <div class="form-group mb-3">
                <label for="formFileSm" class="form-label">Logo</label>
                <input class="form-control form-control-sm" name="team-logo" id="team-logo" type="file" required> <!--retorna el logo del equipo-->
              </div>

              <br><br>
            
            <input class="btn btn-primary w-100" type="submit" value="Create Team">

        </form>
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