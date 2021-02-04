<?php
session_start();

/*-------------------------VERIFICAR SI EXISTE SESIÓN-------------------------*/
if ($_SESSION['idrol']== 1 or $_SESSION['idrol']== 3)
{
    /*-------------------------VERIFICAR SI EL BOTÓN ENVIADO FUE PULSADO-------------------------*/
    if (isset($_POST["btnactualizar"]))
    {
            $Idboleta = $_POST['txtidboleta'];
            $numBoleta = $_POST['txtnumboleta'];
            $fecha = $_POST['txtfecha'];
            $nombre = $_POST['txtnombre'];
            $dni = $_POST['txtdni'];
            $direccion = $_POST['txtdireccion'];
            $idlistaproforma = $_POST['txtidlistaproforma'];
            $fecha1 = $_POST['txtfecha1'];
            $fecha2 = $_POST['txtfecha2'];
            $cuota1 = $_POST['txtcuota1'];
            $cuota2 = $_POST['txtcuota2'];
            $importeTotal = $_POST['txtimportetotal'];
            $estado = $_POST['selectEstado'];

        /*-------------------------VALIDAR CAMPOS DE TEXTO-------------------------*/
        if (empty($numBoleta) or empty($fecha) or empty($nombre) or empty($dni) or empty($direccion) or empty($idlistaproforma) or empty($fecha1) or empty($fecha2) or empty($cuota1) or empty($cuota2) or empty($importeTotal))
            {
            
        
                require_once ("../Shared/CI_Mensaje.php");
        
                $mensaje = new CI_Mensaje;
                $mensaje->MensajeShow("Ingrese todos los campos", "../moduloVentas/getEditarBoleta.php?Idboleta=".$Idboleta);
            }
            else 
            {
                require_once ("CC_BoletaController.php");
        
                $addBoleta = new CC_BoletaController;
                $addBoleta->EditBoleta($Idboleta, $numBoleta, $fecha, $nombre, $dni, $direccion, $idlistaproforma, $fecha1, $fecha2, $cuota1, $cuota2, $importeTotal, $estado);
            }

    }

    else 
    {
        require_once ("CI_EditarBoleta.php");

        $Idboleta = $_GET['Idboleta'];

        $FormEditBoleta = new CI_EditarBoleta;
        $FormEditBoleta->EditarBoletaShow($Idboleta);
    }
}

else 
{
    require_once ("../Shared/CI_Mensaje.php");

    $mensaje = new CI_Mensaje;
    $mensaje->MensajeShow("Acceso no permitido", "../index.php");
}
 
?>