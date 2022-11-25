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
    <title>Create - Prior</title>

    <!--Connections-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../Styles/navbar.css">
    <link rel="stylesheet" href="../Styles/centered-body.css">
    <link rel="stylesheet" href="../Styles/myproject.css">

</head>
<body>


    <div class="creation bg-black text-light">

        <h1 class="text-center">Create project</h1>

      <!--Input del nombre del proycto-->
        <form method="POST" action="../back-end/addProject.php"> <!--Aqui va el scripr PHP (pi eich pi)-->
            <div class="form-group">
                <label class="form-label" for="project-name">Project name</label>
                <input class="form-control" name="project-name" type="text" id="project-name" required > <!--devuelve string con el nombre del proyecto-->
            </div>  
      <!--Input del nombre del proycto-->

            <br>


      <!----------------------------------------Boton de seleccion de grupo registro proyecto------------------------------------------->
      <div class="form-group">
        <!--Retorna en el name: project-group-reg el grupo que selecciona el alumno que se registra en su proyecto-->
        <select name="project-group-reg" id="project-group" class="btn btn-light dropdown-toggle prior-dropdown">

          <option value="selectGroup">Select Group</option>
          <option value="TIDBIS31M">TIDBIS31M</option> <!--Retorna grupo tics-->
          <option value="DNBIS31M">DNBIS31M</option>  <!--Retorna grupo dn-->
          <option value="PIMBIS31M">PIMBIS31M</option>  <!--Retorna grupo procesos-->
          <option value="LIBIS31M">LIBIS31M</option>  <!--Retorna grupo lengua inglesa-->

        </select>
      </div>
      <!----------------------------------------Boton de seleccion de grupo registro proyecto------------------------------------------->



              <br><br>

              <!--Descripcion  del proyecto  //   probablemente un texto extenso-->
              <div class="form-group mb-3">
                <label for="project-description1" class="form-label">Description</label>
                <textarea class="form-control" name="project-description" id="project-description" rows="3" required></textarea> <!--devuelve texto con la desc. del proyecto-->
              </div>
               <!--Descripcion  del proyecto  //   probablemente un texto extenso-->

              <br>

              <!--Seleccionar archivo de foto de proyecto o logo // se guarda en blob en la base de datos-->
              <div class="form-group mb-3">
                <label for="project-logo" class="form-label">Logo</label>
                <input class="form-control form-control-sm" name="project-logo" id="project-logo" type="file" > <!--retorna el archivo-->
              </div>
              <!--Seleccionar archivo de foto de proyecto o logo // se guarda en blob en la base de datos-->


              <br><br>
            

            <input class="btn btn-purple w-100" type="submit" value="Create project">

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