<?php
    session_start(); //continuando la sesion iniciada en getValidarRestablecerContrasenia.php
    
    $boton = $_POST["enviar"];
    $correo=$_GET["varCambio"]; 
    $botonhref=$_GET["boton1"];
    $VARID=$_GET["varid"]; 
    $VAR_ID=$_SESSION['id']; //servirá para comparar el id de la linea anterior,por seguridad si alguien cambia el id en la url por otro valor
    if (isset($boton) || isset($botonhref) || $VAR_ID==$VARID)
    {
        
        require_once ("CI_FormRestablecerContrasenia.php");

            $verificar = new CI_FormRestablecerContrasenia;
            $verificar->FormRestablecerContraseniaShow($VARID);
     
    }

    else
    {
        require_once ("../Shared/CI_Mensaje.php");

        $mensaje = new CI_Mensaje;
        $mensaje->MensajeShow("Acceso no permitido", "href='../index.php'");
    }

?>


