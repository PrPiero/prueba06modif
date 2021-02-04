<?php
    
    session_start();
    require_once ("CI_RegistrarProductoProforma.php");
    $product = $_GET["idproducto"];
    $proforma = $_GET["codigoproforma"];
    $FormRegUser = new CI_RegistrarProductoProforma;
    $FormRegUser->RegistrarProductoProformaShow($product,$proforma);
?>