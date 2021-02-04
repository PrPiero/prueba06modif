<?php

    class CC_ProductoController {
        
        public function ObtenerProductos()
        {
            session_start();
            require_once ("../Models/CE_Producto.php");

            $productos = new CE_Producto();
            $arregloProductos = $productos->ListarProductos();

            require_once("CI_ListaProductos.php");
            //CI_ListaProductos::ListaProductosShow($arregloProductos);
        }
        public function GetProductoById($idproducto)
        {
            
            require_once ("../Models/CE_Producto.php");

            $productos = new CE_Producto;
            return $productos->ObtenerDatosProducto($idproducto);
        }
        public function GetProductoByName($nombre)
        {
            require_once ("../Models/CE_Producto.php");

            $productos = new CE_Producto;
            return $productos->BuscarProductoPorNombre($nombre);
        }
        public function DeleteProducto($idproducto)
        {
            //session_start();
            require_once ("../Models/CE_Producto.php");

            $productos = new CE_Producto;
            $resultado = $productos->EliminarProducto($idproducto);

            if ($resultado == 1)
            {
                header("Location: ../moduloGestionSistema/getGestionarListaProductos.php");
            }

            else
            {
                require_once ("../Shared/CI_Mensaje.php");

                $mensaje = new CI_Mensaje();
                $mensaje->MensajeShow("Error en la consulta", "onClick='history.go(-1);'");
            }
        }
        public function EditProducto ($producto, $descripcion, $precio, $stock, $idproducto)
        {
            //session_start();
            require_once ("../Models/CE_Producto.php");

            $productos = new CE_Producto;
            $resultado = $productos->EditarUsuario($producto, $descripcion, $precio, $stock, $idproducto);

            if ($resultado == 1)
            {
                require_once ("../Shared/CI_Mensaje.php");

                $mensaje = new CI_Mensaje();
                $mensaje->MensajeShow("Se ha modificado el producto con exito", "../moduloGestionSistema/getGestionarListaProductos.php");
            }

            else
            {
                require_once ("../Shared/CI_Mensaje.php");

                $mensaje = new CI_Mensaje();
                $mensaje->MensajeShow("Error en la consulta", "onClick='history.go(-1);'");
            }
        }
        public function RegistroProducto ($producto, $descripcion, $precio, $stock)
        {
            //session_start();
            require_once ("../Models/CE_Producto.php");

            $productos = new CE_Producto;
            $resultado = $productos->RegistrarProducto($producto, $descripcion, $precio, $stock); 

            if ($resultado == 1)
            {
                require_once ("../Shared/CI_Mensaje.php");

                $mensaje = new CI_Mensaje();
                $mensaje->MensajeShow("El producto se ha agregado correctamente", "../moduloGestionSistema/getAgregarProducto.php");
            }

            else 
            {
                require_once ("../Shared/CI_Mensaje.php");

                $mensaje = new CI_Mensaje();
                $mensaje->MensajeShow("Error en la consulta", "../moduloGestionSistema/getAgregarProducto.php");
            }
        }
    }

?>