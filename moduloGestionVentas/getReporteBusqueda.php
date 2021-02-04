<?php
$botonBuscarInformes = $_POST['btnBuscarInforme'];

if(isset($botonBuscarInformes)){
    $fechaIni = $_POST['fechaInicial'];
    $fechaFin = $_POST['fechaFinal'];
    if($fechaIni == null or $fechaFin == null)
    {
        include_once ("../Shared/CI_Mensaje.php");
        $Mensaje = new CI_Mensaje;
        $Mensaje -> MensajeShow("Ingrese todos los datos correctamente", "../moduloGestionVentas/getReporte.php");
    }
    else
    {
        include_once ("CC_ReporteController.php");
        $newSearch = new CC_ReporteController;
        $newSearch -> BusquedaInformes($fechaIni,$fechaFin);
        
    }
}
else{
    include_once ("../Shared/CI_Mensaje.php");
    $Mensaje = new CI_Mensaje;
    $Mensaje -> MensajeShow("Acceso no permitido", "../index.php");   
}
?>