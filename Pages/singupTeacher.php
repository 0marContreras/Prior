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
<body>
    
    <div class="login text-light">

        <h1 class="text-center">Welcome!</h1>

        <form class="needs-validation" method="POST" action="../back-end/signup_teacher.php"> <!--Aqui va el script php-->

            <!--nombre del usuario-->
            <div class="form-group">
                <label class="form-label" for="fullname">Full name</label>
                <input class="form-control" type="text" name="fullname-teacher" id="fullname-teacher" required> <!--retorna el nombre del usuario-->
            </div>  

            <!--correo del usuario-->
            <div class="form-group was-validated">
                <label class="form-label" for="email">Email</label>
                <input class="form-control" type="email" name="new-email-teacher" id="new-email-teacher"  required> <!--retorna el correo del usuario-->
                <div class="invalid-feedback">Please insert an email</div>
            </div>  
            
            <!--contraseña del usuario-->
            <div class="form-group was-validated">
                <label class="form-label" for="password">Password</label>
                <input class="form-control" type="password" name="new-password-teacher" id="new-password-teacher"  required> <!--confirma contraseña del usuario-->  
                <div class="invalid-feedback">Please insert your password</div>
            </div>    

            <!--confirma contraseña del usuario//////////Comparar con if si coincide con la de arriba-->
            <div class="form-group was-validated">
                <label class="form-label" for="password">Confirm password</label>
                <input class="form-control" type="password" name="new-password-confirm-teacher" id="new-password-confirm-teacher" required>
                <div class="invalid-feedback">Check your password</div>
            </div>  

             <!----------------------------------------Boton de seleccion de grupo registro alumno------------------------------------------->
             <div class="form-group">
              <!--Retorna en el name: teacher-career-reg la carrera que selecciona el maestro que se registra-->
              <select name="teacher-career-reg" id="teacher-career" class="btn btn-light dropdown-toggle prior-dropdown">

                <option value="selectCareer">Select career</option>
                <option value="1">Information technologies</option> <!--Retorna carrera tics-->
                <option value="2">Business development</option>  <!--Retorna carrera dn-->
                <option value="3">Industrial procesess</option>  <!--Retorna carrera procesos-->
                <option value="4">English language</option>  <!--Retorna carrera lengua inglesa-->

              </select>
            </div>
            <!----------------------------------------Boton de seleccion de grupo registro alumno------------------------------------------->


            <input class="btn btn-rainbow w-100" type="submit" value="Register account">

            <div class="form-group">
                <a class="form-a-tag" href="../teacherPages/loginTeachers.php">¿Already registered? Log in</a>
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