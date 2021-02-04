<?php 





$boton = $_POST["btnEmitirInforme"];

if (isset($boton) or $_SESSION['idrol'] == 1)
{


        session_start();
        $total_dia=$_POST['total_dia'];
        $subtotal_dia=$_POST['subtotal_dia'];

        date_default_timezone_set("America/Lima");
        $fecha=date("Y-m-d");

        require_once ("CC_InformeController.php");
        $Reg = new CC_informeController;
        $Reg->RegistrarInforme($total_dia,$subtotal_dia,$fecha);
    
}
else
    {
        require_once ("../Shared/CI_Mensaje.php");

        $mensaje = new CI_Mensaje;
        $mensaje->MensajeShow("Acceso No Permitido", "href='../index.php'");
    }



?>

