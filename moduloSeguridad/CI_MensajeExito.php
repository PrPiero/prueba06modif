<?php

class CI_MensajeExito {

	public function MensajeExitoShow($mensaje,$url)
	{
?>
		<html>
		<head>
			<title>Mensaje del Sistema</title>
			<link href="http://localhost/Project-AFFAREX/Shared/css/bootstrap.min.css" rel='stylesheet'>
		</head>
		<body>		
			<div align="center">
				<hr>			
				<div class="alert alert-success" role="alert">
				  	<h2 class="alert-heading"><?php echo $mensaje;?></h2>	 
				  	<hr>
				  	<p class="mb-0"><a href="../index.php" class="btn btn-primary" <?php echo $url;?> role="button">Inicio</a></p>
				</div>	
				<br>
			<div>
		</body>
		</html>		
<?php } } ?>