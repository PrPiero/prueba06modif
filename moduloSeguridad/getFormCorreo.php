<?php

    $boton = $_POST["enviar"];

    if (isset($boton)) 
    {
        $email = $_POST['txtEmail'];
       
        if (strpos($email,'@gmail.com') and !Empty($email))
        {
            
            session_start();
            $_SESSION['email']=$email;
            $varID=$_GET["varID"];
            $_SESSION['id']=$varID; //iniciamos sesion con el nombre id su valor=$varID  y enviarlo a Enviarcorreo-php
            header("location:Enviarcorreo.php?varID=$varID"); //enviamos el id de vaor=$varID a Enviarcorreo.php tambien para despues compararlo con el de la sesion 
        }

        else
        {
            require_once ("../Shared/CI_Mensaje.php");

            $mensaje = new CI_Mensaje;
            $mensaje->MensajeShow("Datos no Válidos", "href='../index.php'");
        }
    }

    else
    {
        require_once ("../Shared/CI_Mensaje.php");

        $mensaje = new CI_Mensaje;
        $mensaje->MensajeShow("Acceso no permitido", "href='../index.php'");
    }

?>