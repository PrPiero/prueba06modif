<?php

    require_once ("Conexion.php");

    class CE_Informe extends Conexion {

        public  function CE_Informe()
        {
            $this->Conectar();
        }

        public function EmitirInforme(  $total_dia, $subtotal_dia,$fecha )

       
        {
            $consulta = $this->Conectar()->prepare("INSERT INTO informe(total_dia,subTotal_dia,fecha) values ('$total_dia','$subtotal_dia','$fecha')");
           

			//while ($filas = $consulta->fetch(PDO::FETCH_ASSOC))
		//	{
		//		$this->boletas[] = $filas;
            //}

            // return $this->boletas;
            
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

        public function ListaInformes($fechaIni,$fechaFin)
        {
            $consulta = $this->Conectar()->query(" SELECT * FROM informe WHERE fecha BETWEEN '$fechaIni' AND '$fechaFin' ");

			while ($filas = $consulta->fetch(PDO::FETCH_ASSOC))
			{
				$this->informes[] = $filas;
			}

			return $this->informes;
        }
    }


 ?>


