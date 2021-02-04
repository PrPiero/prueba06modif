<?php

    require_once ("Conexion.php");

    class CE_Reporte extends Conexion {

        public  function CE_Reporte()
        {
            $this->Conectar();
        }
        public function EmitirReporte($total_dia, $fecha)       
        {
            $consulta = $this->Conectar()->prepare("INSERT INTO reporte(total, fecha) values ('$total_dia','$fecha')");
            $consulta->execute();
            if ($consulta == FALSE)
            {
                return 0;
            }
            else
            {
                return 1;
            }        
        }
    }     
?>