<?php

    require_once ("Conexion.php");

    class CE_Producto extends Conexion {
         //Atributos
         private $idproducto;
         private $nombre;
         private $descripcion;
         private $precio;
         private $stock;

         public function setIdproducto($idproducto)
		{
			$this->idproducto = $idproducto;
		}

		public function getIdproducto ()
		{
			return $this->idproducto;
        }
        public function setNombreProducto($nombre)
		{
			$this->nombre = $nombre;
		}

		public function getNombreProducto ()
		{
			return $this->nombre;
        }
        public function setDescripcion($descripcion)
		{
			$this->descripcion = $descripcion;
		}

		public function getDescripcion ()
		{
			return $this->descripcion;
        }
        public function setPrecio($precio)
		{
			$this->precio = $precio;
		}

		public function getPrecio ()
		{
			return $this->precio;
        }
        public function setStock($stock)
		{
			$this->stock = $stock;
		}

		public function getStock ()
		{
			return $this->stock;
		}


        public function CE_Producto()
        {
            $this->Conectar();
        }

        public function ListarProductos()
        {
            $consulta = $this->Conectar()->query("SELECT * FROM productos");

			while ($filas = $consulta->fetch(PDO::FETCH_ASSOC))
			{
				$this->productos[] = $filas;
			}

			return $this->productos;
        }
        public function ObtenerDatosProducto ($idproducto)
        {
            $consulta = $this->Conectar()->prepare("SELECT * FROM productos where idproducto = '$idproducto'");
            $consulta->execute([$idproducto]);
			$datos = $consulta->fetch(PDO::FETCH_OBJ);
            $dproductos = new CE_Producto;
            $consulta = null;

            if ($datos)
            {
                $dproductos->setIdproducto($datos->idproducto);
                $dproductos->setNombreProducto($datos->nombre);
                $dproductos->setDescripcion($datos->descripcion);
                $dproductos->setPrecio($datos->precio);
                $dproductos->setStock($datos->stock);
            }

            return $dproductos;
        }
        public function EliminarProducto ($idproducto)
        {
            $consulta = $this->Conectar()->prepare("DELETE FROM productos where idproducto = '$idproducto'");
            $consulta->execute([$idproducto]);
			//$datos = $consulta->fetch(PDO::FETCH_OBJ);
            
            if ($consulta == FALSE)
            {
                return 0;
            }

            else
            {
                return 1;
            }
        }
        public function EditarUsuario ($producto, $descripcion, $precio, $stock, $idproducto)
        {
            $consulta = $this->Conectar()->prepare("UPDATE productos SET nombre = '$producto', descripcion = '$descripcion', precio = '$precio', stock= '$stock' WHERE idproducto = '$idproducto'");
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
        public function RegistrarProducto ($producto, $descripcion, $precio, $stock)
        {
            $consulta = $this->Conectar()->prepare("INSERT INTO productos (nombre, descripcion, precio, stock) VALUES ('$producto', '$descripcion', '$precio', '$stock')");
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
        public function BuscarProductoPorNombre ($nombre)
        {
            $consulta = $this->Conectar()->prepare("SELECT * FROM productos WHERE nombre LIKE '$nombre%'");
            $consulta->execute();
            $productos = array();

            while ($filas = $consulta->fetch(PDO::FETCH_ASSOC))
			{
				$productos[] = $filas;
            }
            
            $consulta = null;
			return $productos;
        }
    }

?>