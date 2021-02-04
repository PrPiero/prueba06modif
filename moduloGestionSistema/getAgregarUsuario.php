<?php

    session_start();

    /*-------------------------VERIFICAR SI EXISTE SESIÓN-------------------------*/
    if ($_SESSION['idrol'] == 1)
    {
        /*-------------------------VERIFICAR SI EL BOTÓN ENVIADO FUE PULSADO-------------------------*/
        if (isset($_POST["btnEnviarAdd"]))
        {
            $email = $_POST['txtEmail'];
            $password = $_POST['txtPassword'];
            $confirmpassword = $_POST['txtConfirmPassword'];
            $nombre = $_POST['txtNombre'];
            $dni = $_POST['txtDNI'];
            $fechaDNI = $_POST['txtFechaDNI'];
            $celular = $_POST['txtCelular'];
            $rol = $_POST['selectRol'];

            /*-------------------------VALIDAR CAMPOS DE TEXTO-------------------------*/
            if ((strlen(trim($email)) > 5 and strlen(trim($password)) > 5) and $password == $confirmpassword and (strlen(trim($dni)) == 8 and strlen(trim($celular)) == 9))
            {
                require_once ("CC_UsuarioController.php");

                $addUsuario = new CC_UsuarioController;           
                $addUsuario->RegistroUsuario($email, $password, $nombre, $dni, $fechaDNI, $celular, $rol);
            }

            else if ((empty($email) or empty($password)) or (empty($nombre) or empty($dni) or $rol == "Seleccionar Rol") or (empty($fechaDNI) or empty($celular)))
            {
                require_once ("../Shared/CI_Mensaje.php");

                $mensaje = new CI_Mensaje;
                $mensaje->MensajeShow("No ha llenado los campos", "../moduloGestionSistema/getAgregarUsuario.php");
            }

            else
            {
                require_once ("../Shared/CI_Mensaje.php");

                $mensaje = new CI_Mensaje;
                $mensaje->MensajeShow("Datos no Válidos", "../moduloGestionSistema/getAgregarUsuario.php");
            }
        }

        else 
        {
            require_once ("CI_RegistrarUsuario.php");

            $FormRegUser = new CI_RegistrarUsuario;
            $FormRegUser->RegistrarUsuarioShow();
        }
    }
    
    else 
    {
        require_once ("../Shared/CI_Mensaje.php");

        $mensaje = new CI_Mensaje;
        $mensaje->MensajeShow("Acceso no permitido", "../index.php");
    }
?>