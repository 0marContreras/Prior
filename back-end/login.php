<?php

    //ESTE NO ES EL LOGIN BUENO
    
    //Variables 
    $server='localhost';
    $user='root';
    $password='';
    $db='Prior_php_tests_2';
    
    //conexion
    try{
        $conn=new PDO("mysql:host=$server; dbname=$db", $user, $password);
        
        //conf variables en caso de erroreS
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        
        //echo "Conexion exitosa";
        $email_login=$_POST["email"];
        $pass_login=$_POST["password"];
        $pass_login_encrypted=password_hash($pass_sign_teacher, PASSWORD_DEFAULT);
             
        //query 
        $sql="SELECT * FROM users WHERE user_email='$email_login' AND user_password='$pass_login_encrypted '";
        

        
        //query 2 
        $query=$conn->prepare($sql);
        $query->execute();
        $query->setFetchMode(PDO::FETCH_ASSOC);


        /*
        if (!$query){
            echo "Error: No se ejecutó el query";
            /*echo $email_login."<br>";
            echo $pass_login."<br>";
            echo $pass_login_encrypted."<br>";
        }
        else{
            var_dump($query);
            

        }*/
    }
    catch(PDOException $err){
        //mandar error
        echo "Error: ".$err->getMessage();
    }
?>

<!--
/*
        //Crear una nueva sesion
        session_start(); 

        //Comprobar que existen los datos 
        if (isset($_POST['email']) && isset($_POST['password'])) {
            //funcion pa limipiar los datos
            function validate($data){
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            //declaramos las variables y las limpiamos 
            $email = validate($_POST['email']);
            $pass_ = validate($_POST['password']);
            $pass  = password_hash($pass_, PASSWORD_DEFAULT);
            
            echo $email."<br>";
            echo $pass."<br>";
            echo $pass_."<br>";
            

            //En caso de que no haya email mandar error 
            if (empty($email)) {
                header("Location: ../Pages/login.html?error=Email is required");
                exit();
            }
            //En caso de que no haya contraseña mandar error
            else if(empty($pass)){
                header("Location: ../Pages/login.html?error=Password is required");
                exit();
            }



            //Ora si llamamos a la base de datos
            else{
                $query = "SELECT * FROM users WHERE user_email='$email'";
                $result = mysqli_query($conn, $query);

                //checamos que si nos haya dado algo 
                if (mysqli_num_rows($result) === 1) {

                    $row = mysqli_fetch_assoc($result);
                    
                    //Checar que el email y la contraseña coincidan 
                    if ($row['user_email'] === $email && $row['user_password'] ===    $pass) {
                        echo "Logged in!";

                        //Mausquerramienta misteriosa que nos servira mas tarde
                        $_SESSION['email'] = $row['user_email'];
                        $_SESSION['name'] = $row['Username'];
                        $_SESSION['id'] = $row['id_user'];
                        header("Location: ../Pages/home.html");
                        exit();
                    
                    }
                    else{
                        header("Location: ../Pages/login.html?error=Incorect User name or password");
                        exit();
                    }   
                }
                else{
                    header("Location: ../Pages/login.html?error=Incorect User name or password");
                exit();
            }
        }
    }
    else{
        header("Location: ../Pages/home.php");
        exit();
    }*/ -->