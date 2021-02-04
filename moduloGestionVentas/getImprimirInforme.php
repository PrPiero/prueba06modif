<?php


$valor_btn=$_POST['btn-imprimir-informe'];

if(isset($valor_btn) or $_SESSION['idrol'] == 1){

   
    require_once ("CC_InformeController.php");

    $list = new CC_InformeController;
    $list->ImprimirInforme();



}
else{


    require_once ("../Shared/CI_Mensaje.php");

    $mensaje = new CI_Mensaje;
    $mensaje->MensajeShow("Acceso No Permitido", "href='../index.php'");
}




?>

