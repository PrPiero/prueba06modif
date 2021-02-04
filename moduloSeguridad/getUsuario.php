<?php

    if (isset($_REQUEST["btnAceptar"])) 
    {
        $usuario = $_POST["email"];
		$password = $_POST["password"];

        if (strlen(trim($usuario)) > 5 and strlen(trim($password)) > 5)
        {
            require_once ("CC_AutenticationController.php");

            $autenticar = new CC_AutenticationController;
            $autenticar->verificarUsuario($usuario, $password);
        }

        else
        {
            require_once ("../Shared/CI_Mensaje.php");

            $mensaje = new CI_Mensaje;
            $mensaje->MensajeShow("Datos no Válidos", "../index.php");
        }
    }

    else
    {
        require_once ("../Shared/CI_Mensaje.php");

        $mensaje = new CI_Mensaje;
        $mensaje->MensajeShow("Acceso no permitido", "../index.php");
    }

?>