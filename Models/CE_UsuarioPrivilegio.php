<?php

    require_once ("Conexion.php");

    class CE_UsuarioPrivilegio extends Conexion {
        //Atributos
        private $idrol;
        private $rol;

        //Métodos SET Y GET
		public function setIdrol ($idrol)
		{
			$this->idrol = $idrol;
		}

		public function getIdrol ()
		{
			return $this->idrol;
		}

		public function setRol ($rol)
		{
			$this->rol = $rol;
		}

		public function getRol ()
		{
			return $this->rol;
		}

        public function CE_UsuarioPrvilegio()
        {
            $this->Conectar();
        }

		public function ObtenerPrivilegios($email)
		{
			$consulta = $this->Conectar()->query("SELECT P.titulo, P.imagen, P.directorio FROM usuarios U, privilegios P, roles R, rol_privilegio RP WHERE U.email = '$email' AND U.idrol = R.idrol AND R.idrol = RP.idrol AND P.idprivilegio = RP.idprivilegio");
			$privilegios = array();

			while ($filas = $consulta->fetch(PDO::FETCH_ASSOC))
			{
				$privilegios[] = $filas;
			}

			return $privilegios;
		}

        public function ListarRoles()
        {
            $consulta = $this->Conectar()->query("SELECT * FROM roles");

			while ($filas = $consulta->fetch(PDO::FETCH_ASSOC))
			{
				$this->roles[] = $filas;
			}

			return $this->roles;
        }
    }
?>