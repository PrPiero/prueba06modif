<?php

    $boton = $_POST["enviar"];
    $botonsubmit=$_GET["boton"];
    $idusuario=$_POST["id"]; //obtenemos de regreso el id de Enviarcorreo.php

    if (isset($boton) || isset($botonsubmit) ) 
    {
        $email = $_POST['txtEmail'];
        $dni = $_POST['txtDNI'];
        $fecha = $_POST['f_fecha'];
        $celular = $_POST['f_celular'];

        if (strlen(trim($dni)) == 8 and is_numeric($dni) and is_numeric($celular) and strpos($email,'@'))
        {
            require_once ("CC_AutenticationController.php");

            $Comprobar = new CC_AutenticationController;
            $Comprobar->VerificarForm($email,$dni,$fecha,$celular);
        }

        else if ( isset($botonsubmit)){
            require_once ("CI_FormCorreo.php");

            $mensaje = new CI_FormCorreo();
            $mensaje->FormCorreoShow($idusuario);
        }

        else{
            require_once ("../Shared/CI_Mensaje.php");

            $mensaje = new CI_Mensaje;
            $mensaje->MensajeShow("Datos no Válidos", "href='restablecer.php'");
           /* require_once ("CI_FormCorreo.php");

                $mensaje = new CI_FormCorreo();
                $mensaje->FormCorreoShow($idusuario);*/
        }
    }

    else
    {
        require_once ("../Shared/CI_Mensaje.php");

        $mensaje = new CI_Mensaje;
        $mensaje->MensajeShow("Acceso no permitido", "href='../index.php'");
    }

?>