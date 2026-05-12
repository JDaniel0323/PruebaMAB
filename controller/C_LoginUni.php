<?php

require_once(__DIR__ . "/../models/connection.php");
$conn = new connection();
	
if(isset($_POST['btningresar']))
{

    $nombre = $_POST["txtusuario"];
    $pass = $_POST["txtpassword"];

    $login = $conn->getLogin($nombre, $pass);

    if($login && $login->num_rows > 0)
    {
        $user = $login->fetch_assoc();
        
        if (password_verify($pass, $user['password_hash'])) 
        {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['nombredelusuario'] = $user['username'];

            header("Location: ../views/V_RPanelUni.php");
            exit();
        } 
        else 
        {
            echo "<script>
                    alert('Usuario o contraseña incorrectos');
                    window.location='../views/V_LoginUni.php';
                  </script>";
        }
    }
    
}

require(__DIR__ . "/../views/V_LoginUni.php");

?>