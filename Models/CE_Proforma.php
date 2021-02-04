<?php

    require_once ("Conexion.php");

    class CE_Proforma extends Conexion {
        //Atributos
        private $idproducto;
        
        //Métodos SET Y GET
		public function setIdproducto ($idproducto)
		{
			$this->idproducto = $idproducto;
		}

		public function getIdproducto ()
		{
			return $this->idproducto;
		}


        public function CE_Proforma()
        {
            $this->Conectar();
        }

        
        public function RegistrarProductoProforma ($product,$proforma)
        {
            /*
            global $connect;

            $query = "SELECT count(*) as codigoproforma from listaproformas where codigoproforma=$proforma";
            mysqli_query($connect, $query) or die (mysqli_error($connect));
            $datos3=mysqli_fetch_assoc($result);
            echo $datos3['total'];
            mysqli_close($connect);
            */
            
            $consulta3 = $this->Conectar()->prepare("SELECT COUNT(codigoProforma) FROM listaproformas WHERE codigoProforma=$proforma;");
            $consulta3->execute();
            $datos3= $consulta3->fetch(PDO::FETCH_OBJ);
            
            if($datos3===0){
            $consulta2 = $this->Conectar()->prepare("INSERT INTO listaproformas (codigoProforma,estado) VALUES ('$proforma', '1')");
            $consulta2->execute();
            
            }

            $consulta = $this->Conectar()->prepare("INSERT INTO proforma (codigoProforma,idproducto) VALUES ('$proforma', '$product')");
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

/*
        public function EliminarUsuario ($idusuario)
        {
            $consulta = $this->Conectar()->prepare("DELETE FROM usuarios where idusuario = '$idusuario'");
            $consulta->execute([$idusuario]);
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
*/

    }
?>