<?php

<?php
//Variables 
$server='localhost';
$user='root';
$password='';
$db='Prior_php_tests_2';

//conexion
try{
    $conn=new PDO("mysql:host=$server;dbname=$db", $user, $password);
    

    //config variables en caso de errores
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
 
    $keywrd=$_POST["prior-keyword"];

    //FILTRAR en la tabla
    $query=$conn->prepare("SELECT * FROM projects WHERE project_name LIKE %$keywrd% OR Description LIKE %$keywrd%"); //BORRAR EL * Y PONER LO QUE VA EN LA CARD
     
    
    //ejecutar
    $query->execute();


    /*Aqui van las cards de home.
    Ocupo el select de home para imprimir los resultados
    */




    //cerrar conexion
    $conn=null;

    //confirmar a usuario
    
}
catch(PDOException $err){
    //mandar error
    echo "Error: ".$err->getMessage();
}
?>

?>