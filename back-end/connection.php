<?php
    //declarar variables 
    $server='localhost';
    $db='Prior_php_tests_2';
    $user='root';
    $pwd='';

    //conexion
    $DB= new PDO("mysql:host= $server; dbname=$db", $user, $pwd);
    $DB -> exec("SET CHARACTER SET utf8");

?>