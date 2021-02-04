<?php
        $valor = $_POST['btnImprimir'];
        session_start();
        $arregloPDF=$_SESSION['envioArreglo'];
        if(isset($valor))
        {
            require_once ("../moduloGestionVentas/reportepdf.php");
            reportepdf::ReporteShow($arregloPDF);
                
        }
        else
        {
            require_once ("../Shared/CI_Mensaje.php");

            $mensaje = new CI_Mensaje;
            $mensaje->MensajeShow("Acceso No Permitido", "../index.php");
        }
?>