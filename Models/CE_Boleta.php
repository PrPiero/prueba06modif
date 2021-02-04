<?php

    require_once ("Conexion.php");

    class CE_Boleta extends Conexion {

          //Atributos
          private $Idboleta;
          private $numBoleta;
          private $fecha;
          private $nombre;
          private $dni;
          private $direccion;
          private $idlistaproforma;
          private $fecha1;
          private $fecha2;
          private $cuota1;
          private $cuota2;
          private $importeTotal;
          private $estado;
  
          public function setIdboleta ($Idboleta)
          {
              $this->Idboleta = $Idboleta;
          }
  
          public function getIdboleta ()
          {
              return $this->Idboleta;
          }
          
          public function setNumBoleta ($numBoleta)
          {
              $this->numBoleta = $numBoleta;
          }
  
          public function getNumBoleta ()
          {
              return $this->numBoleta;
          }
          
          public function setFecha ($fecha)
          {
              $this->fecha = $fecha;
          }
  
          public function getFecha ()
          {
              return $this->fecha;
          }
          
          public function setNombre ($nombre)
          {
              $this->nombre = $nombre;
          }
  
          public function getNombre ()
          {
              return $this->nombre;
          }
          
          public function setDni ($dni)
          {
              $this->dni = $dni;
          }
  
          public function getDni ()
          {
              return $this->dni;
          }
          
  
          public function setDireccion ($direccion)
          {
              $this->direccion = $direccion;
          }
  
          public function getDireccion ()
          {
              return $this->direccion;
          }
          
          public function setIdlistaproforma ($idlistaproforma)
          {
              $this->idlistaproforma = $idlistaproforma;
          }
  
          public function getIdlistaproforma ()
          {
              return $this->idlistaproforma;
          }
          
  
          public function setFecha1 ($fecha1)
          {
              $this->fecha1 = $fecha1;
          }
  
          public function getFecha1 ()
          {
              return $this->fecha1;
          }
          
          public function setFecha2 ($fecha2)
          {
              $this->fecha2 = $fecha2;
          }
  
          public function getFecha2 ()
          {
              return $this->fecha2;
          }
          
          public function setCuota1 ($cuota1)
          {
              $this->cuota1 = $cuota1;
          }
  
          public function getCuota1 ()
          {
              return $this->cuota1;
              
          }
          
          public function setCuota2 ($cuota2)
          {
              $this->cuota2 = $cuota2;
          }
  
          public function getCuota2 ()
          {
              return $this->cuota2;
          }
          
          public function setImporteTotal ($importeTotal)
          {
              $this->importeTotal = $importeTotal;
          }
  
          public function getImporteTotal ()
          {
              return $this->importeTotal;
          }
          
          public function setEstado ($estado)
          {
              $this->estado = $estado;
          }
  
          public function getEstado ()
          {
              return $this->estado;
          }
            

        public  function CE_Boleta()
        {
            $this->Conectar();
        }

        public function ListaBoletas($fecha)
        {
            
            $consulta = $this->Conectar()->query("SELECT * FROM boletas  where fecha1='$fecha' or fecha2='$fecha'");
            $boletas = array();

			while ($filas = $consulta->fetch(PDO::FETCH_ASSOC))
			{
				$boletas[] = $filas;
			}

			return $boletas;
        }

        public function EditarBoleta ($Idboleta, $numBoleta, $fecha, $nombre, $dni, $direccion, $idlistaproforma, $fecha1, $fecha2, $cuota1, $cuota2, $importeTotal, $estado)
        {
			
			$consulta = $this->Conectar()->prepare("UPDATE boletas SET numBoleta = '$numBoleta', fecha = '$fecha', nombre = '$nombre', dni = '$dni', direccion = '$direccion', idlistaproforma = '$idlistaproforma', fecha1 = '$fecha1', fecha2 = '$fecha2', cuota1 = '$cuota1', cuota2 = '$cuota2', importeTotal = '$importeTotal', estado = '$estado' WHERE Idboleta = '$Idboleta'");
			 																
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
        
        public function ObtenerDatosBoleta ($Idboleta)
        {
            $consulta = $this->Conectar()->prepare("SELECT * FROM boletas where Idboleta = '$Idboleta'");
            $consulta->execute([$Idboleta]);
			$datos = $consulta->fetch(PDO::FETCH_OBJ);
			$dboletas = new CE_Boleta;
			$consulta=null;

            if ($datos)
            {
                $dboletas->setIdboleta($datos->Idboleta);
                $dboletas->setNumBoleta($datos->numBoleta);
                $dboletas->setFecha($datos->fecha);
                $dboletas->setNombre($datos->nombre);
                $dboletas->setDni($datos->dni);
                $dboletas->setDireccion($datos->direccion);
				$dboletas->setIdlistaproforma($datos->idlistaproforma);
				$dboletas->setFecha1($datos->fecha1);
				$dboletas->setFecha2($datos->fecha2);
				$dboletas->setCuota1($datos->cuota1);
				$dboletas->setCuota2($datos->cuota2);
				$dboletas->setImporteTotal($datos->importeTotal);
				$dboletas->setEstado($datos->estado);
            }

            return $dboletas;
		}
		
		

		
		public function BuscarPorNumBoleta ($numBoleta)
        {
            $consulta = $this->Conectar()->prepare("SELECT * FROM boletas b, listaproformas p WHERE b.idlistaproforma = p.idlistaproforma AND numBoleta LIKE '$numBoleta%'");
            $consulta->execute([$numBoleta]);
            
            while ($filas = $consulta->fetch(PDO::FETCH_ASSOC))
			{
				$this->boletas[] = $filas;
            }
            
            $consulta = null;
			return $this->boletas;
        }

    }
 ?>

