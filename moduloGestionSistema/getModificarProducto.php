

<?php

    session_start();

    /*-------------------------VERIFICAR SI EXISTE SESIÓN-------------------------*/
    if ($_SESSION['idrol'] == 1)
    {
        /*-------------------------VERIFICAR SI EL BOTÓN ENVIADO FUE PULSADO-------------------------*/
        if (isset($_POST["btnModificar"]))
        {
            $idproducto = $_POST['txtidproducto'];
            $nombre = $_POST['txtnombre'];
            $descripcion= $_POST['txtdescripcion'];
            $precio = $_POST['txtprecio'];
            $stock = $_POST['txtstock'];
            /*-------------------------VALIDAR CAMPOS DE TEXTO-------------------------*/
            if((strlen($nombre) > 0 and strlen($descripcion) > 0) and (strlen($precio) > 0 and strlen($stock) >0 ))
            {
                require_once ("CC_ProductoController.php");

                $addproducto = new CC_ProductoController;
                $addproducto->EditProducto($nombre, $descripcion, $precio, $stock, $idproducto);
            }
            else
            {
                require_once ("../Shared/CI_Mensaje.php");

                $mensaje = new CI_Mensaje;
                $mensaje->MensajeShow("Ingrese todos los campos para poder modificar el producto", "../moduloGestionSistema/getModificarProducto.php?idproducto=".$idproducto);
            }
        }

        else 
        {
            require_once ("CI_ModificarProducto.php");

            $idproducto = $_GET['idproducto'];

            CI_ModificarProducto::ModificarProductoShow($idproducto);
        }
    }

    else 
    {
        require_once ("../Shared/CI_Mensaje.php");

        $mensaje = new CI_Mensaje;
        $mensaje->MensajeShow("Acceso no permitido", "../index.php");
    }
?>