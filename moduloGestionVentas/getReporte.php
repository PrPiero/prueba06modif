<?php
        session_start();
        //$valor_envio=$_POST['btnEnviar'];              
        
        if(isset($_POST['btnEmitirReporte']) or $_SESSION['idrol'] == 1 or $_SESSION['idrol'] == 4)
        {
                require_once ("CI_BuscarInformesFecha.php");
                $busquedaFechas = new CI_BuscarInformesFecha;
                $busquedaFechas->BuscarInformesFechaShow();  
                
        }
        else
        {
                require_once ("../Shared/CI_Mensaje.php");
                $mensaje = new CI_Mensaje();
                $mensaje -> MensajeShow("Acceso No Permitido", "../index.php");
        }
?>