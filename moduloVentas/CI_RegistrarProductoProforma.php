<?php

    class CI_RegistrarProductoProforma {

        public static function RegistrarProductoProformaShow($product,$proforma)
        {
            require_once ("../Shared/head.php");
            require_once ("CC_BuscarProducto.php");
            
            $rol = new CC_BuscarProducto;
            $roles = $rol->RegistroProductoProforma($product,$proforma);

			require_once ("../Shared/footer.php");
		}
	}
?>