


<?php

session_start();
//$valor_btn=$_POST['btnEmitirInforme'];

if(isset($_POST['btnEmitirInforme']) or $_SESSION['idrol'] == 1 or $_SESSION['idrol'] == 2){

        require_once ("CC_InformeController.php");

        $list = new CC_InformeController;
        $list->ObtenerListaBoletasDia();


}else{
        require_once ("../Shared/CI_Mensaje.php");
    $mensaje = new CI_Mensaje;
    $mensaje->MensajeShow("Acceso No permitido", "href='../index.php'");
}


    
        
        

    
  

?>