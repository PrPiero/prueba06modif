<?php

class CI_EliminarUsuario {

	public function EliminarUsuarioShow($idusuario)
	{
        require_once ("CC_UsuarioController.php");

        $usuario = new CC_UsuarioController;
        $usuarios = $usuario->GetUsuarioById($idusuario);
?>
		<html>
		<head>
			<title>Eliminar Usuario</title>
			<!-- Bootstrap - CSS -->
			<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    		<link href="https://fonts.googleapis.com/css2?family=Spartan:wght@300;600&display=swap" rel="stylesheet">
		</head>
		<body>
			<div align="center">
				<hr>	
				<div class="alert alert-success" role="alert">
					<form method="POST" action="getEliminarUsuario.php">
						<input name="txtidusuario" id="txtidusuario" type="hidden" value="<?php echo $usuarios->getIdUsuario(); ?>">
						<h2 class="alert-heading">¿Está segur@ de eliminar este usuario?</h2>	 
						<hr>
						<div class="form-group" style="margin-top: auto;">
                        	<button type="submit" class="btn btn-primary" name="btnEliminarUs" id="btnEnviar">Si</button>
                            <p class="mb-0"><a class="btn btn-danger text-white" onClick='history.go(-1);' role="button">No</a></p>
                        </div>
					</form>
				</div>	
				<br>
			<div>
		</body>
		</html>		
<?php } } ?>