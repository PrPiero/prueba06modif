<?php

    session_start();

    /*-------------------------VERIFICAR SI EXISTE SESIÓN-------------------------*/
    if ($_SESSION['idrol'] == 1)
    {
        /*-------------------------VERIFICAR SI EL BOTÓN ENVIADO FUE PULSADO-------------------------*/
        if (isset($_POST["btnEnviarEdit"]))
        {
            $idusuario = $_POST['txtidusuario'];
            $email = $_POST['txtEmail'];
            $nombre = $_POST['txtNombre'];
            $celular = $_POST['txtCelular'];
            $rol = $_POST['selectRol'];
            $estado = $_POST['selectEstado'];

            /*-------------------------VALIDAR CAMPOS DE TEXTO-------------------------*/
            if (strlen(trim($email)) > 5 and strlen(trim($celular)) == 9)
            {
                require_once ("CC_UsuarioController.php");

                $addUsuario = new CC_UsuarioController;
                $addUsuario->EditUsuario($email, $nombre, $celular, $rol, $estado, $idusuario);
            }

            else if ((empty($email) or empty($nombre)) or (empty($celular) or $rol == "Seleccionar Rol"))
            {
                require_once ("../Shared/CI_Mensaje.php");

                $mensaje = new CI_Mensaje;
                $mensaje->MensajeShow("No ha llenado los campos", "../moduloGestionSistema/getEditarUsuario.php?idusuario=".$idusuario);
            }

            else
            {
                require_once ("../Shared/CI_Mensaje.php");

                $mensaje = new CI_Mensaje;
                $mensaje->MensajeShow("Datos no Válidos", "../moduloGestionSistema/getEditarUsuario.php?idusuario=".$idusuario);
            }
        }

        else 
        {
            require_once ("CI_EditarUsuario.php");

            $idusuario = $_GET['idusuario'];

            $FormEditUser = new CI_EditarUsuario;
            $FormEditUser->EditarUsuarioShow($idusuario);
        }
    }

    else 
    {
        require_once ("../Shared/CI_Mensaje.php");

        $mensaje = new CI_Mensaje;
        $mensaje->MensajeShow("Acceso no permitido", "../index.php");
    }
?>