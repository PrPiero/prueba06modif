<?php



$boton = $_POST["enviar"];

if (isset($boton)) 
{
session_start(); 
$contrasenia1=$_POST['txtpassword'];
$contrasenia2=$_POST['txtconfirmarpassword'];
//$correo=$_GET["varCorreo"];
$varID=$_GET["varId"];
$_SESSION['id']=$varID;  //iniciando sesion 
$correo=$_GET["varCambio"];
$var_id=$_POST['VARID'];
//echo "$var_id";
//echo "$varID";

    if($contrasenia1==$contrasenia2){
    if (strlen(trim($contrasenia1)) > 5 and strlen(trim($contrasenia2)) > 5 )
    {
        require_once ("CC_AutenticationController.php");
        $Comprobar = new CC_AutenticationController;
        if($varID !=null || $varID !=''){
        $Comprobar->EditarFormRestablecer($contrasenia1,$varID);}
        else{
            $Comprobar->EditarFormRestablecer($contrasenia1,$var_id);
        }
        
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
        $mensaje->MensajeShow("Contraseñas no coinciden", "href='getFormRestablecerContrasenia.php?boton1=botonhref&varid=$varID'");
    }
}

else
{
    require_once ("../Shared/CI_Mensaje.php");

    $mensaje = new CI_Mensaje;
    $mensaje->MensajeShow("Acceso no permitido", "href='../index.php'");
}


?>