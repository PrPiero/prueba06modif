<?php
        session_start();
        $valor_envio=$_POST['btn'];
        
        if(isset($valor_envio) or $_SESSION['idrol']== 1 or $_SESSION['idrol']== 3)
        {
                require_once ("CI_BuscarBoleta.php");
                $busquedaboleta = new CI_BuscarBoleta;
                $busquedaboleta->BuscarBoletaShow(); 
        }
        else
        {
                require_once ("../Shared/CI_Mensaje.php");
                $mensaje = new CI_Mensaje();
                $mensaje -> MensajeShow("Acceso No Permitido", "../index.php");
        }
            

    
  

?>