<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prior</title>

    <!--Connections-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <link rel="stylesheet" href="../Styles/login.css">

</head>
<body class="bg">
    
    
    <div class="login text-light">

        <h1 class="text-center">Welcome teacher!</h1>

        <form class="needs-validation" method="POST" action="../back-end/loginTeachers.php"> <!--Aqui va el script php-->

            <!--En caso de error aquí se imprime el error-->

            <!--Aqui se inserta el email de inicio de sesion-->
            <div class="form-group was-validated">
                <label class="form-label" for="email">Email</label>
                <input class="form-control" type="email" name="email" id="email" required> <!--Returns el email del que se loguea-->
                <div class="invalid-feedback">Please insert an email</div>
            </div>  
            
            <!--Aqui se inserta la contraseña de inicio de sesion-->
            <div class="form-group was-validated">
                <label class="form-label" for="password">Password</label>
                <input class="form-control" type="password" name="password" id="password" required>
                <div class="invalid-feedback">Please insert your password</div> <!--Returns la contraseña del que ese loguea-->
            </div>    

            
            <input class="btn btn-rainbow w-100" type="submit" value="Submit">

            <div class="form-group">
                <a class="form-a-tag" href="../Pages/accounttype.php">¿New in Prior? Create an account</a>
            </div>

           
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
</body>
</html>