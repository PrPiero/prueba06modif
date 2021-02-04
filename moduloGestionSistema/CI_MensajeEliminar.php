<?php

class CI_MensajeEliminar {

	public static function MensajeEliminarShow($idproducto)
	{
        require_once ("CC_ProductoController.php");

        $producto = new CC_ProductoController;
        $productos = $producto->GetProductoById($idproducto);
?>
		<html>
		<head>
			<title>Eliminar Producto</title>
			<link href="http://localhost/Project-AFFAREX/Shared/css/bootstrap.min.css" rel='stylesheet'>
		</head>
		<body>
			<div align="center">
				<hr>
				
				<div class="alert alert-success" role="alert">
					<form method="POST" action="getEliminarProducto.php">
						<input name="txtidproducto" id="txtidproducto" type="hidden" value="<?php echo $productos->getIdproducto(); ?>">
						<h2 class="alert-heading">¿Realmente deseas eliminar el producto?</h2>	 
						<hr>
						<p class="mb-0"><button type="submit" name="btnEliminar" id="btnEliminar" class="btn btn-primary">Si</button></p>
					</form>
                    <p class="mb-0"><a class="btn btn-danger" onClick='history.go(-1);' role="button">Cancelar</a></p>
				</div>	
				<br>
			<div>
		</body>
		</html>		
<?php } } ?>