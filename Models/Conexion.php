<?php
	class Conexion {

		public static function Conectar() {
			try {
				$conexion = new PDO('mysql:host=localhost; dbname=affarex2', 'root', '123456789');
				$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$conexion->exec("SET CHARACTER SET UTF8");

			} catch (Exception $error) {
				die("Error: " . $error->getMessage());
				echo "Error en la línea " . $error->getLine();
			}

			return $conexion;
		}
	}
?>