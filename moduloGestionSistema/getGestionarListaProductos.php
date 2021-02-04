<?php
    
    session_start();

    if(isset($_POST['btnEnviar']) or $_SESSION['idrol'] == 1)
    {
        if(isset($_REQUEST['nomprod']))
        {
            require_once ("../moduloGestionSistema/CI_GestionarListaProducto.php");
            CI_GestionarListaProductos::GestionarListaProductosShow(strtolower($_REQUEST['nomprod']));

        }
        else
        {
            require_once("../moduloGestionSistema/CI_GestionarListaProducto.php");
            CI_GestionarListaProductos::GestionarListaProductosShow("");
        }      
    }
    else
    {
        require_once ("../Shared/CI_Mensaje.php");
        CI_Mensaje::MensajeShow("Se ha detectado un acceso no admitido", "../index.php");
    }

?>