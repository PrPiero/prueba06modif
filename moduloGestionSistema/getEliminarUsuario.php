<?php

    session_start();

    /*-------------------------VERIFICAR SI EXISTE SESIÓN-------------------------*/
    if ($_SESSION['idrol'] == 1)
    {
        /*-------------------------VERIFICAR SI EL BOTÓN ENVIADO FUE PULSADO-------------------------*/
        if (isset($_POST["btnEliminarUs"]))
        {
            $idusuario = $_POST['txtidusuario'];
            require_once ("CC_UsuarioController.php");

            $dltUsuario = new CC_UsuarioController;
            $dltUsuario->DeleteUsuario($idusuario);
        }

        else
        {
            require_once ("CI_EliminarUsuario.php");

            $idusuario = $_GET['idusuario'];

            $FormDeleteUser = new CI_EliminarUsuario;
            $FormDeleteUser->EliminarUsuarioShow($idusuario);
        }
    }

    else 
    {
        require_once ("../Shared/CI_Mensaje.php");

        $mensaje = new CI_Mensaje;
        $mensaje->MensajeShow("Acceso no permitido", "../index.php");
    }
?>