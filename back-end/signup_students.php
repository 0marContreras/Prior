<?php
    //include conexion 
    require 'back-end/connection.php';

    //get the inputs
    $full_name=$_POST['fullname'];

    $email=$_POST['new-email'];

    $password=$_POST['new-password'];

    //comparar cual da true o similar y regresar el que si de
    $groupTIDBIS31M=$_POST['ticGroup1-register-check'];

    $groupDNBIS31M=$_POST['dnGroup1-register-check'];

    $groupPIMBIS31M=$_POST['pimGroup1-register-check'];

    $groupLIBIS31M=$_POST['liGroup1-register-check'];
    
    //encrypt password 
    $pass_cifrada = password_hash($password, PASSWORD_DEFAULT);

    //switch case para los grupos 
    switch ($group) {
        case $groupTIDBIS31M==TRUE:
            $group=1;
            break;

        case $groupDNBIS31M==TRUE:
            $group=2;
            break;

        case $groupLIBIS31M==TRUE:
            $group=3;
            break;
            
        case $groupPIMBIS31M==TRUE:
            $group=4;
            break;
            
        default:
            $group=null;
            break;
    }

    //insert into users table
    if ($DB == TRUE){
        //insert revisar luego 
        $query_insert = $DB->prepare("INSERT INTO Prior_php_tests (Username, user_email, user_password, id_type_user, id_grupo, active, created_at, updated_at) 
        values ($full_name, $email, $pass_cifrada, 1, $group, 1, now(), now()");

        //execute
        $query_insert->execute();

        //close database
        $BD == null;
        
        //redirect to login
        header("location:Pages/login.html");
    }else {
        echo "Chapacristo";
    }



?>