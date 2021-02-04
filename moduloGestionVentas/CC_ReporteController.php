<?
    class CC_ReporteController
    {
        public function BusquedaInformes($fechaIni,$fechaFin)
        {
            session_start();
            require_once ("../Models/CE_Informe.php");

            $informes = new CE_Informe();
            $arregloInformes = $informes->ListaInformes($fechaIni,$fechaFin);
            if($arregloInformes == null)
            {
                require_once ("../Shared/CI_Mensaje.php");
                $mensaje = new CI_Mensaje();
                $mensaje->MensajeShow("No hay Informes en estas fechas", "../moduloGestionVentas/getReporte.php");
            }
            else
            {
                require_once("CI_ListaInformesFecha.php");
                CI_ListaInformesFecha::ListaInformesShow($arregloInformes);

            }

            
        }

        public function RegistrarReporte( $totalinformes, $fecha)
    {
        session_start();
        require_once ("../Models/CE_Reporte.php");

        $informe = new CE_Reporte();
        $resultado =  $informe->EmitirReporte($totalinformes, $fecha);
        if ($resultado == 1)
        {
            require_once ("../Shared/CI_Mensaje.php");

            $mensaje = new CI_Mensaje();
            $mensaje->MensajeShow("Reporte ha sido emitido con exito", "../moduloGestionVentas/getReporteBusqueda.php");
        }

        else 
        {
            require_once ("../Shared/CI_Mensaje.php");

            $mensaje = new CI_Mensaje();
            $mensaje->MensajeShow("Error en la consulta", "../moduloGestionVentas/getReporte.php");
        }
  }
    }

?>