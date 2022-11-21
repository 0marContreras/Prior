<?php
    //Variables 
    $server='localhost';
    $user='root';
    $password='';
    $db='Prior_php_tests_2';
    
    //conexion
    try{
        $conn=new PDO("mysql:host=$server; dbname=$db", $user, $password);
        
        //conf variables en caso de errores
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              
        // Encrypt cookie
        function encryptCookie( $userid ) {
        
            $key = hex2bin(openssl_random_pseudo_bytes(4));
        
            $cipher = "aes-256-cbc";
            $ivlen = openssl_cipher_iv_length($cipher);
            $iv = openssl_random_pseudo_bytes($ivlen);
        
            $ciphertext = openssl_encrypt($userid, $cipher, $key, 0, $iv);
        
        
            return( base64_encode($ciphertext . '::' . $iv.'::'.$key) );
        }
        
        // Decrypt cookie
        function decryptCookie( $ciphertext ) {
        
            $cipher = "aes-256-cbc";
        
            list($encrypted_data, $iv,$key) = explode('::', base64_decode($ciphertext));
            return openssl_decrypt($encrypted_data, $cipher, $key, 0, $iv);
        
        }
        
        
        // Check if $_SESSION or $_COOKIE already set
        if( isset($_SESSION['userid']) ){
            header('Location: home.php');
            exit;
        }else if( isset($_COOKIE['rememberme'] )){
        
            // Decrypt cookie variable value
            $userid = decryptCookie($_COOKIE['rememberme']);
        
            // Fetch records
            $stmt = $conn->prepare("SELECT count(*) as cntUser FROM users WHERE id=:id");
            $stmt->bindValue(':id', (int)$userid, PDO::PARAM_INT);
            $stmt->execute(); 
            $count = $stmt->fetchColumn();
        
            if( $count > 0 ){
                $_SESSION['userid'] = $userid; 
                header('Location: main.php');
                exit;
            }
        }
        
        // On submit
        if(isset($_POST['but_submit'])){
        
            $username = $_POST['txt_uname'];
            $password = $_POST['txt_pwd'];
        
            if ($username != "" && $password != ""){
               
            // Fetch records
            $stmt = $conn->prepare("SELECT count(*) as cntUser,id FROM usuarios WHERE username=:username and password=:password ");
            $stmt->bindValue(':username', $username, PDO::PARAM_STR);
            $stmt->bindValue(':password', $password, PDO::PARAM_STR);
            $stmt->execute(); 
            $record = $stmt->fetch(); 
        
            $count = $record['cntUser'];
        
            if($count > 0){
                $userid = $record['id'];
        
                if( isset($_POST['rememberme']) ){
        
                    // Set cookie variables
                    $days = 30;
                    $value = encryptCookie($userid);
        
                    setcookie ("rememberme",$value,time()+ ($days * 24 * 60 * 60 * 1000));
        
                }
        
                $_SESSION['userid'] = $userid; 
                header('Location: main.php');
                exit;
            }else{
                echo "Invalid username and password";
            }
        
            }   
        
        } 

    }
    catch(PDOException $err){
        //mandar error
        echo "Error: ".$err->getMessage();
    }
?>