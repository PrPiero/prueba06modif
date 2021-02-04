<?php

$botonbuscarboleta = $_POST['btnbuscarboleta'];

if(isset($botonbuscarboleta) or $_SESSION['idrol']== 1 or $_SESSION['idrol']== 3){

    $numBoleta = $_POST['numBoleta'];
   if($numBoleta==null)
   {
       include_once ("../Shared/CI_Mensaje.php");
        $Mensaje = new CI_Mensaje;
        $Mensaje -> MensajeShow("No ha ingresado ningun codigo de Boleta", "../moduloVentas/getBoleta.php");
    }
    else
    {
        include_once ("CC_BoletaController.php");
        $newSearch = new CC_BoletaController;
        $newSearch -> BusquedaBoletas($numBoleta);
    }
       
}
else{
    include_once ("../Shared/CI_Mensaje.php");
    $Mensaje = new CI_Mensaje;
    $Mensaje -> MensajeShow("Acceso no permitido", "../index.php");   
}


?>