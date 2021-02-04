<?php

class CI_FormCorreo {

	public function FormCorreoShow($id)
	{
		
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario correo</title>
</head>

<body>
<?php
//echo "$id";  // imprimir id del producto
//$varcontra = $_GET["varcontra"];
//echo "$varcontra";?>
<form action="getFormCorreo.php?varID=<?php echo $id;?>" method="post" >
	 
<h1>Formulario correo</h1>
<p>Correo gmail <input type="email" placeholder="Ingrese correo gmail"  name="txtEmail"   required> </p>

<input type="submit" value="Ingresar" name="enviar">
<th><a href="restablecer.php"  name="volver" >Volver</a></th>

</form>
<?php }}?>