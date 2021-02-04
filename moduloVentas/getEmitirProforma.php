<?php

    session_start();

    /*-------------------------VERIFICAR SI SE PRESIONÓ EL BOTÓN EMITIR PROFORMA -------------------------*/
    if (isset($_POST['btnEmitirProforma']) or $_SESSION['idrol'] == 1 or $_SESSION['idrol'] == 2)
    {
        require_once ("CI_Buscar.php");
        $FormRegUser = new Buscar;

        //if(isset($_GET['codigoproforma']))
       //{
            //$proforma = $_GET['codigoproforma'];            
            $FormRegUser->BuscarProductoshow(); //$proforma debe ir
        //}

        //else
        //{
          //  $FormRegUser->BuscarProductoshow(""); //$proforma debe ir
        //}
        //$proforma =$_GET['codigoproforma'];
        /*
        -------------------------VERIFICAR SI EL BOTÓN DE BÚSQUEDA FUE PULSADO-------------------------
        if (isset($_REQUEST['nombre']))
        {
            require_once ("CI_ListaUsuarios.php");
            CI_ListaUsuarios::ListaUsuariosShow(strtolower($_REQUEST['nombre']));
        }

        else
        {
            require_once ("CI_ListaUsuarios.php");
            CI_ListaUsuarios::ListaUsuariosShow("");
        }
        */


        
    /*if ($_GET['botonemprof']==NULL){
        $proforma =$_GET['codigoproforma'];
    }*/
    
    /*require_once ("CI_Buscar.php");
    $FormRegUser = new Buscar;
    $FormRegUser->BuscarProductoshow();*/ //$proforma debe ir
    }

    else
    {
        require_once ("../Shared/CI_Mensaje.php");

        $mensaje = new CI_Mensaje;
        $mensaje->MensajeShow("Acceso no permitido", "../index.php");
    }
?>