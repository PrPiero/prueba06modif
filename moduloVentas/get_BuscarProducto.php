
<?php

//$boton = $_POST["btnBuscarProd"];

if (isset($_POST["btnBuscarProd"]))
{
    //$product = $_POST['txtProd'];
    //$proforma = $_POST['txtProf'];

    if (strlen(trim($_REQUEST['txtProd'])) > 2)
    {
        require_once ("CC_BuscarProducto.php");

        if (isset($_REQUEST['codigoproforma']))
        {
            $buscProduc = new CC_BuscarProducto;
            $buscProduc->BuscarProducto($_REQUEST['txtProd'], $_REQUEST['codigoproforma']);
        }

        else
        {
            $buscProduc = new CC_BuscarProducto;
            $buscProduc->BuscarProducto($_REQUEST['txtProd'], $_REQUEST['txtProf']);
        }
    }

    else
    {
        require_once ("../Shared/CI_Mensaje.php");

        $mensaje = new CI_Mensaje;
        $mensaje->MensajeShow("Datos no Válidos", "href='../moduloGestionVentas/getEmitirProforma.php'");
    }
}

else 
{
    require_once ("../Shared/CI_Mensaje.php");

    $mensaje = new CI_Mensaje;
    $mensaje->MensajeShow("No ha llenado los campos", "href='../moduloGestionVentas/getEmitirProforma.php.php'");
}

?>