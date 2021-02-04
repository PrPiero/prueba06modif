<?php

    class CC_BuscarProducto {
        
        public function BuscarProducto($product,$proforma)
        {
            session_start();
            require_once ("../Models/CE_ListaProductoSimilares.php");

            $productos = new CE_ListaProductoSimilares;
            $arregloProductos = $productos->ListaProductosSimilares($product,$proforma);

            require_once("CI_ListaProductosCoincidencia.php");
            CI_ListaProductosCoincidencia::ListaProductosCoincidenciaShow($arregloProductos,$proforma);
        }



        public function RegistroProductoProforma ($product,$proforma)
        {
            //session_start();
            require_once ("../Models/CE_Proforma.php");

            $usuarios = new CE_Proforma;
            $resultado = $usuarios->RegistrarProductoProforma($product,$proforma); 

            if ($resultado == 1)
            {
                require_once ("../Shared/CI_Mensaje.php");

                $mensaje = new CI_Mensaje();
                $mensaje->MensajeShow("Producto registrado con éxito a la proforma", "getEmitirProforma.php?codigoproforma=$proforma");
            }

            else 
            {
                require_once ("../Shared/CI_Mensaje.php");

                $mensaje = new CI_Mensaje();
                $mensaje->MensajeShow("Error en la consulta", "href='../moduloGestionSistema/AgregarUsuario.php'");
            }
        }





    }

?>