

<?php

    session_start();

    /*-------------------------VERIFICAR SI EXISTE SESIÓN-------------------------*/
    if ($_SESSION['idrol'] == 1)
    {
        /*-------------------------VERIFICAR SI EL BOTÓN ENVIADO FUE PULSADO-------------------------*/
        if (isset($_POST["btnEliminar"]))
        {
            $idproducto = $_POST['txtidproducto'];
            require_once ("CC_ProductoController.php");

            $deleteProducto = new CC_ProductoController;
            $deleteProducto->DeleteProducto($idproducto);
        }

        else
        {
            require_once ("CI_MensajeEliminar.php");

            $idproducto = $_GET['idproducto'];

            CI_MensajeEliminar::MensajeEliminarShow($idproducto);
        }
    }

    else 
    {
        require_once ("../Shared/CI_Mensaje.php");

        $mensaje = new CI_Mensaje;
        $mensaje->MensajeShow("Acceso no permitido", "../index.php");
    }
?>