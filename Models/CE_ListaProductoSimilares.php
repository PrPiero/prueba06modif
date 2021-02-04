<?php

    require_once ("Conexion.php");

    class CE_ListaProductoSimilares extends Conexion {
        
        

        public function CE_ListaProductoSimilares()
        {
            $this->Conectar();
        }

        public function ListaProductosSimilares($product,$proforma)
        {
            $consulta = $this->Conectar()->query("SELECT * FROM productos WHERE nombre LIKE '$product%'or descripcion LIKE '$product%' ");
            $productos=array();

			while ($filas = $consulta->fetch(PDO::FETCH_ASSOC))
			{
				$productos[] = $filas;
			}

			return $productos;
        }
    }

?>