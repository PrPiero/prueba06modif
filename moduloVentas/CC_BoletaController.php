<?

class CC_BoletaController
{

    public function BusquedaBoletas($numBoleta)
        {
            session_start();
            require_once ("../Models/CE_Boleta.php");

            $boletas = new CE_Boleta();
            $arregloboletas = $boletas->BuscarPorNumBoleta($numBoleta);
            if($arregloboletas == null)
            {
                require_once ("../Shared/CI_Mensaje.php");
                $mensaje = new CI_Mensaje();
                $mensaje->MensajeShow("No se ha encontrado ninguna boleta", "../moduloVentas/getBoleta.php");
            }
            else
            {
                require_once("CI_BoletaCoincidencia.php");
                CI_BoletaCoincidencia::BoletaCoincidenciaShow($arregloboletas);

            }
        
        }

        public function EditBoleta ($Idboleta, $numBoleta, $fecha, $nombre, $dni, $direccion, $idlistaproforma, $fecha1, $fecha2, $cuota1, $cuota2, $importeTotal, $estado)
        {
            //session_start();
            require_once ("../Models/CE_Boleta.php");

            $boletas = new CE_Boleta;
            $resultado = $boletas->EditarBoleta($Idboleta, $numBoleta, $fecha, $nombre, $dni, $direccion, $idlistaproforma, $fecha1, $fecha2, $cuota1, $cuota2, $importeTotal, $estado);

            if ($resultado == 1)
            {
                require_once ("../Shared/CI_Mensaje.php");

                $mensaje = new CI_Mensaje();
                $mensaje->MensajeShow("Boleta modificada con éxito", "../moduloVentas/getBoleta.php");
            }

            else
            {
                require_once ("../Shared/CI_Mensaje.php");

                $mensaje = new CI_Mensaje();
                $mensaje->MensajeShow("Error en la consulta", "onClick='history.go(-1);'");
            }
    }
    public function GetBoletaById($Idboleta)
    {
        require_once ("../Models/CE_Boleta.php");

        $boletas = new CE_Boleta;
        return $boletas->ObtenerDatosBoleta($Idboleta);
    }


    }


    

?>