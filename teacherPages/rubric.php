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
    <title>Evaluation</title>
    <!--Connections-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../Styles/navbar.css">
    <link rel="stylesheet" href="../Styles/items.css">
    <link rel="stylesheet" href="../Styles/evaluation.css">

</head>
<body>

<?php
            
            include('../back-end/PDO.php');
            $project_id = $_POST['valueID'];
            ?>

    <div class="container mt-5">

        <form method="POST" action="../back-end/evaluationRub.php"> <!--Aqui va el php-->
            <div class="table-responsive-sm">
                <!--Este es el titulo de las columans [no lleva back pa]-->
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th scope="col">Aspect</th>
                                <th scope="col">Value</th>
                                <th scope="col">Check</th>
                            </tr>
                        </thead>
                        <tbody>


                        <!--Primera evaluacion-->
                            <tr class="">
                                
                                <td scope="row">Dominio del tema</td>
                                <td>40%</td>
                                <td><input name="rubricOne" id="rubricOne" type="checkbox" value="4"></td>
                                <!--Retorna la ponderacion de la primera evaluacion en el name-->
                            </tr>

                        <!--Segunda evaluacion-->
                            <tr class="">
                                
                                <td scope="row">Secuencia y organización</td>
                                <td>10%</td>
                                <td><input name="rubricTwo" id="rubricTwo" type="checkbox" value="1"></td>
                                <!--Retorna la ponderacion de la segunda evaluacion en el name-->

                            </tr>


                        <!--Tercera evaluacion-->
                            <tr class="">
                                
                                <td scope="row">Uso del tiempo</td>
                                <td>10%</td>
                                <td><input name="rubricThree" id="rubricThree" type="checkbox" value="1"></td>
                                <!--Retorna la ponderacion de la tercera evaluacion en el name-->
                                
                            </tr>

                        <!--Cuarta evaluacion-->
                            <tr class="">
                                
                                <td scope="row">Recursos Visuales</td>
                                <td>10%</td>
                                <td><input name="rubricFour" id="rubricFour" type="checkbox" value="1"></td>
                                <!--Retorna la ponderacion de la cuarta evaluacion en el name-->
                                
                            </tr>

                        <!--Quinta evaluacion-->
                            <tr class="">
                                
                                <td scope="row">Postura y contacto visual</td>
                                <td>10%</td>
                                <td><input name="rubricFive" id="rubricFive" type="checkbox" value="1"></td>
                                <!--Retorna la ponderacion de la quinta evaluacion en el name-->
                                
                            </tr>
                            
                        <!--Sexta evaluacion-->    
                            <tr class="">
                                
                                <td scope="row">Trabajo en equipo</td>
                                <td>10%</td>
                                <td><input name="rubricSix" id="rubricSix" type="checkbox" value="1"></td>
                                <!--Retorna la ponderacion de la sexta evaluacion en el name-->
                                
                            </tr>

                        <!--Septima evaluacion y ultima-->                
                            <tr class="">
                                
                                <td scope="row">Presentación personal (vestimenta)</td>
                                <td>10%</td>
                                <td><input name="rubricSeven" id="rubricSeven" type="checkbox" value="1"></td>
                                <!--Retorna la ponderacion de la septima evaluacion en el name-->
                                
                            </tr>

                             <input name="eva" id="eva" value='<?php echo $project_id; ?>' type="hidden">           
                            <tr class="">
                                <td></td>   
                                <td><button scope="row" name="willEvaluate" class="btn btn-orange text-light" type="submit">Submit score</button></td> 
                                <td></td>
                            </tr>

                        </tbody>
                    </table>
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
    <!--Icons-->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
</body>
</html>

<!--Si no esta logueado pa atrás papa-->
<?php 

}else{

     header("Location: ../teacherPages/tMyuser.php");

     exit();

}

 ?>