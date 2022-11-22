<?php

//variables
$server='localhost';
$user='root';
$password='';
$db='Prior_php_tests_2';


$conn_mysqli=mysqli_connect("mysql:host=$server;dbname=$db", $user, $password);

if(!$conn_mysqli){
    echo "Conexión fallida";
}

?>