<?php

class CI_Mensaje {

	public static function MensajeShow($mensaje , $url)
	{
?>
		<html>
		<head>
			<title>Mensaje del Sistema</title>
			<!-- Bootstrap CSS -->
			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
            <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@300;600&display=swap" rel="stylesheet">
		</head>
		<body>		
			<div align="center">
				<hr>			
				<div class="alert alert-success" role="alert">
				  	<h2 class="alert-heading"><?php echo $mensaje;?></h2>	 
				  	<hr>
				  	<form action="<?php echo $url;?>" method="POST">
						<button type="submit" class="btn btn-primary" name="btnEnviar" id="btnEnviar" >Regresar</button>
					</form>
				</div>	
				<br>
			<div>
		</body>
		</html>		
<?php 
	} 
} 
?>