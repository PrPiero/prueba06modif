<?php

    session_start();

    if (isset($_SESSION['email']))
    {
        require_once ("../Models/CE_UsuarioPrivilegio.php");
        require_once ("../moduloSeguridad/CI_Bienvenida.php");
        
        $privilegios = new CE_UsuarioPrivilegio;
        $listaPrivilegios = $privilegios->ObtenerPrivilegios($_SESSION['email']);
        CI_Bienvenida::BienvenidaShow($listaPrivilegios);
    }

    else
    {
        //session_unset();
        //session_destroy();
        
        require_once ("../Shared/CI_Mensaje.php");
        CI_Mensaje::MensajeShow("Acceso no permitido", "../index.php");
    }
?>