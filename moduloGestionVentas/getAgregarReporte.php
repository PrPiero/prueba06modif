<?php

$boton = $_POST["btnReporte"];

if (isset($boton))
{
        $total_informes=$_POST['total_informes'];

        date_default_timezone_set("America/Lima");
        $fecha=date("Y-m-d");

        require_once ("CC_ReporteController.php");

        $Registro = new CC_ReporteController;
        $Registro -> RegistrarReporte($total_informes, $fecha);
}
else
{
        require_once ("../Shared/CI_Mensaje.php");

        $mensaje = new CI_Mensaje;
        $mensaje->MensajeShow("Acceso No Permitido", "../index.php");
}
       



?>
