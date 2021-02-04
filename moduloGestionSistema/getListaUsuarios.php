<?php

    session_start();

    /*-------------------------VERIFICAR SI SE PRESIONÓ EL BOTÓN GESTIONAR USUARIOS -------------------------*/
    if (isset($_POST['btnGestionarUsuarios']) or $_SESSION['idrol'] == 1)
    {
        /*-------------------------VERIFICAR SI EL BOTÓN DE BÚSQUEDA FUE PULSADO-------------------------*/
        if (isset($_REQUEST['nombre']))
        {
            require_once ("CI_ListaUsuarios.php");
            CI_ListaUsuarios::ListaUsuariosShow(strtolower($_REQUEST['nombre']));
        }

        else
        {
            require_once ("CI_ListaUsuarios.php");
            CI_ListaUsuarios::ListaUsuariosShow("");
        }
    }

    else
    {
        require_once ("../Shared/CI_Mensaje.php");

        $mensaje = new CI_Mensaje;
        $mensaje->MensajeShow("Acceso no permitido", "../index.php");
    }
?>