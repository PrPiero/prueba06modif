<?php
    session_start();
  
    if($_SESSION['idrol'] == "1")
    {
        if(isset($_POST["btnAgregar"]))
        {
            $producto = $_POST['txtnomprod'];
            $descripcion = $_POST['txtdescripcion'];
            $precio = $_POST['txtprecio'];
            $stock = $_POST['txtstock'];

            if(strlen($producto) > 0 and strlen($descripcion) > 0 and strlen($precio) > 0 and strlen($stock) >0 )
            {
                require_once ("CC_ProductoController.php");
                $addProducto = new CC_ProductoController;
                $addProducto->RegistroProducto($producto,$descripcion,$precio,$stock);
            }

            else{
                require_once ("../Shared/CI_Mensaje.php");

                CI_Mensaje::MensajeShow("Ingrese todos los campos para poder agregar al producto", "../moduloGestionSistema/getAgregarProducto.php");
            }
        }
        else
        {
            require_once("../moduloGestionSistema/CI_AgregarProducto.php");
            CI_AgregarProducto::AgregarProductoShow();    
        }    
    }
    else
    {
        require_once ("../Shared/CI_Mensaje.php");
        CI_Mensaje::MensajeShow("Acceso no permitido", "href='../index.php'");
    }

?>