<?php

     
    class CC_InformeController {
        
        public function ObtenerListaBoletasDia()
        {
            //session_start();
            require_once ("../Models/CE_Boleta.php");

            $boletas = new CE_Boleta();
            date_default_timezone_set("America/Lima");
            $fecha=date("Y-m-d");
            $arregloBoletas = $boletas->Listaboletas($fecha);

            require_once("CI_HojaCalculo.php");
            CI_HojaCalculo::HojaCalculoShow($arregloBoletas);


        }


    public function ImprimirInforme(){



        session_start();
        require_once ("../Models/CE_Boleta.php");

        $boletas = new CE_Boleta();
        date_default_timezone_set("America/Lima");
        $fecha=date("Y-m-d");
        $arregloBoletas = $boletas->Listaboletas($fecha);

      
        require_once ("../moduloGestionVentas/informepdf.php");
        Informepdf::InformeShow($arregloBoletas);

    }


    

    public function RegistrarInforme( $total_dia,$subtotal_dia ,$fecha)
    {
        session_start();
        require_once ("../Models/CE_Informe.php");

        $informe = new CE_Informe();
        $resultado =  $informe->EmitirInforme($total_dia,$subtotal_dia,$fecha);

        // require_once("CI_HojaCalculo.php");
        // CI_HojaCalculo::ListaBoletasShow($arregloBoletas);


        if ($resultado == 1)
        {
            require_once ("../Shared/CI_Mensaje.php");

            $mensaje = new CI_Mensaje();
            $mensaje->MensajeShow("Informe ha sido emitido con exito", "../moduloGestionVentas/getInforme.php");
        }

        else 
        {
            require_once ("../Shared/CI_Mensaje.php");

            $mensaje = new CI_Mensaje();
            $mensaje->MensajeShow("Error en la consulta", "../moduloGestionVentas/getInforme.php");
        }
  }


}

?>