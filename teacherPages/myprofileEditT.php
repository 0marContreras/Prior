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
    <title>Edit profile</title>
    <!--Connections-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../Styles/centered-body.css">
    <link rel="stylesheet" href="../Styles/myuser.css">


</head>
<body>
    
    <div class="creation bg-black text-light">

        <h1 class="text-center">Edit profile</h1>

        <form class="bg-black text-light" method="POST" action="../back-end/editProfileTeachers.php" enctype='multipart/form-data'> <!--Aqui va el script php-->


              <!--ingresa la nueva descripcion del usuario-->
              <div class="form-group mb-3">
                <label for="user-description" class="form-label">Description</label>
                <textarea class="form-control" name="user-description" id="user-description" rows="3" ></textarea> <!--retorna la descripcion del usuario-->
              </div>

              <br>

              <!--ingresa la foto del usuario-->
              <div class="form-group mb-3">
                <label for="picUser" class="form-label">Picture</label>
                <input class="form-control form-control-sm" name="user-pic" id="user-pic" type="file" > <!--retorna la foto del usuario-->
              </div>

              <br><br>
            
            <input class="btn btn-rosa text-light w-100" type="submit" value="Update changes">

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

     header("Location: ../teacherPages/tMyuser.php");

     exit();

}

 ?>