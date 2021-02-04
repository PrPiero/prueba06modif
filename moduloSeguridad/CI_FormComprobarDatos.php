<?php

class CI_FormComprobarDatos {

	public function FormComprobarDatosShow()
	{
		
?>



<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer contraseña</title>
</head>

<body>
<?php
//$varcontra = $_GET["varcontra"];
//echo "$varcontra";?>
<form action="getComprobarDatos.php" method="post" >

<h1>Formulario Comprobar Datos</h1>
<p>email    <input type="email" placeholder="Ingrese su email"  name="txtEmail"   required> </p>
<p>DNI    <input type="text" placeholder="Ingrese nro de DNI"  name="txtDNI"  maxlength="8" required> </p>
<p>Fecha Emision DNI <input type="date"   name="f_fecha"  required> </p>
<p>celular   <input type="text" placeholder="Ingrese nro de celular"  name="f_celular" maxlength="9" required> </p>

<input type="submit" value="Ingresar" name="enviar">
<th><a href="../index.php"  name="volver" >Volver</a></th>

</form>



</body>

</html>
<?php }}?>