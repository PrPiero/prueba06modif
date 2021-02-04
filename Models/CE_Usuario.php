<?php

    require_once ("Conexion.php");

    class CE_Usuario extends Conexion {
        //Atributos
        private $idusuario;
		private $email;
		private $password;
		private $nombre;
        private $dni;
        private $fecha_emision_dni;
        private $celular;
		private $idrol;
        private $estado;
        
        //Métodos SET Y GET
		public function setIdusuario ($idusuario)
		{
			$this->idusuario = $idusuario;
		}

		public function getIdusuario ()
		{
			return $this->idusuario;
		}

		public function setEmail ($email)
		{
			$this->email = $email;
		}

		public function getEmail ()
		{
			return $this->email;
		}

		public function setPassword ($password)
		{
			$this->password = $password;
		}

		public function getPassword ()
		{
			return $this->password;
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
        
        public function setFecha_emision_dni ($fecha_emision_dni)
		{
			$this->fecha_emision_dni = $fecha_emision_dni;
		}

		public function getFecha_emision_dni ()
		{
			return $this->fecha_emision_dni;
		}

        public function setCelular ($celular)
		{
			$this->celular = $celular;
		}

		public function getCelular ()
		{
			return $this->celular;
		}

		public function setIdrol ($idrol)
		{
			$this->idrol = $idrol;
		}

		public function getIdrol ()
		{
			return $this->idrol;
		}

		public function setEstado ($estado)
		{
			$this->estado = $estado;
		}

		public function getEstado ()
		{
			return $this->estado;
		}

        /*-------------------------CONECTARSE-------------------------*/
        public function CE_Usuario()
        {
            $this->Conectar();
        }

        /*-------------------------COMPROBAR USUARIO-------------------------*/
        public function ValidarUsuario ($usuario, $password)
        {
            //$password = md5($password);
            $consulta = $this->Conectar()->prepare("SELECT U.email,U.contrasenia, U.nombre, U.idrol, R.rol FROM usuarios U, roles R WHERE email='$usuario' AND U.idrol = R.idrol AND estado = 'Habilitado'");
            $consulta->execute();
            //$datos = $consulta->fetch(PDO::FETCH_OBJ);
            //$consulta = null;

            while ($datos = $consulta->fetch(PDO::FETCH_OBJ))
            {
                if (password_verify($password,$datos->contrasenia))
                {   
                    session_start();

                    $_SESSION['email'] = $datos->email;
                    $_SESSION['password'] = $datos->contrasenia;
                    $_SESSION['nombre'] = $datos->nombre;
                    $_SESSION['idrol'] = $datos->idrol;
                    $_SESSION['rol'] = $datos->rol;

                    return 1;
                }

                else
                {
                    return 0;
                }
            }
        }
        /*------------------------COMPROBAR DATOS PARA IR AL FORMULARIO CORREO--------*/
        public function VerificarFormComp($email,$dni,$fecha_emision_dni,$celular)
        {
        
            $consulta = $this->Conectar()->prepare("SELECT email,DNI,fecha_emision_dni,celular,estado FROM usuarios WHERE email='$email'  AND DNI='$dni' AND fecha_emision_dni='$fecha_emision_dni' AND celular='$celular' AND estado = 'Habilitado'");
            $consulta->execute();
            $datos= $consulta->fetch(PDO::FETCH_OBJ);
            if ($datos== FALSE)
            {
                return 0;
            }

            else
            {
                $consulta2 = $this->Conectar()->prepare("SELECT idusuario,estado FROM usuarios WHERE email='$email'  AND estado = 'Habilitado'");
                $consulta2->execute();
                $datos2= $consulta2->fetch(PDO::FETCH_OBJ);
              
                $id=$datos2->idusuario; //guardamos el valor del id
                 return array(1,$id);
                
            }
        }

        /*-------------------------LISTAR USUARIOS-------------------------*/
        public function ListarUsuarios()
        {
            $consulta = $this->Conectar()->query("SELECT * FROM usuarios U, roles R WHERE U.idrol = R.idrol");
            
			while ($filas = $consulta->fetch(PDO::FETCH_ASSOC))
			{
				$this->usuarios[] = $filas;
            }
            
            $consulta = null;
			return $this->usuarios;
        }

        /*-------------------------REGISTRAR USUARIOS-------------------------*/
        public function RegistrarUsuario ($email, $password, $nombre, $dni, $fecha_dni, $celular, $rol)
        {
            $password = password_hash($password,PASSWORD_DEFAULT);
            $consulta = $this->Conectar()->prepare("INSERT INTO usuarios (email,contrasenia, nombre, dni, fecha_emision_dni, celular, idrol, estado) VALUES ('$email','$password', '$nombre', '$dni', '$fecha_dni', '$celular', '$rol', 'Habilitado')");
            $consulta->execute();

            if ($consulta == FALSE)
            {
                return 0;
            }

            else
            {
                return 1;
            }

            $consulta = null;
        }

        /*-------------------------EDITAR USUARIOS-------------------------*/
        public function EditarUsuario ($email, $nombre, $celular, $rol, $estado, $idusuario)
        {
            //$password = password_hash($password,PASSWORD_DEFAULT);
            $consulta = $this->Conectar()->prepare("UPDATE usuarios SET email = '$email', nombre = '$nombre', celular = '$celular', idrol = '$rol', estado = '$estado' WHERE idusuario = '$idusuario'");
            $consulta->execute();

            if ($consulta == FALSE)
            {
                return 0;
            }

            else
            {
                return 1;
            }

            $consulta = null;
        }
        
        /*-------------------------ELIMINAR USUARIOS-------------------------*/
        public function EliminarUsuario ($idusuario)
        {
            $consulta = $this->Conectar()->prepare("DELETE FROM usuarios WHERE idusuario = '$idusuario'");
            $consulta->execute();
            
            if ($consulta == FALSE)
            {
                return 0;
            }

            else
            {
                return 1;
            }

            $consulta = null;
        }
        /*------------------EDITAR CONTRASEÑA Y RESTABLECERLA POR UNA NUEVA---------*/
        public function  EditarRestablecercontrasenia ($contrasenia1,$varID)
        {
        

            $contrasenia1=password_hash($contrasenia1,PASSWORD_DEFAULT);
            $consulta = $this->Conectar()->prepare("UPDATE usuarios SET contrasenia='$contrasenia1' WHERE idusuario='$varID' ");
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
        
        /*-------------------------SELECCIONAR USUARIOS-------------------------*/
        public function ObtenerDatosUsuario ($idusuario)
        {
            $consulta = $this->Conectar()->prepare("SELECT * FROM usuarios WHERE idusuario = '$idusuario'");
            $consulta->execute();
			$datos = $consulta->fetch(PDO::FETCH_OBJ);
            $dusuarios = new CE_Usuario;
            $consulta = null;

            if ($datos)
            {
                $dusuarios->setIdusuario($datos->idusuario);
                $dusuarios->setEmail($datos->email);
                $dusuarios->setPassword($datos->contrasenia);
                $dusuarios->setNombre($datos->nombre);
                $dusuarios->setDni($datos->DNI);
                $dusuarios->setFecha_emision_dni($datos->fecha_emision_dni);
                $dusuarios->setCelular($datos->celular);
                $dusuarios->setIdrol($datos->idrol);
                $dusuarios->setEstado($datos->estado);
            }

            return $dusuarios;
        }

        /*-------------------------BUSCAR USUARIOS POR NOMBRE-------------------------*/
        public function BuscarPorNombre ($nombre)
        {
            $consulta = $this->Conectar()->prepare("SELECT * FROM usuarios U, roles R WHERE U.idrol = R.idrol AND nombre LIKE '$nombre%'");
            $consulta->execute();
            $usuarios = array();

            while ($filas = $consulta->fetch(PDO::FETCH_ASSOC))
			{
				$usuarios[] = $filas;
            }
            
            $consulta = null;
			return $usuarios;
        }
    }
?>