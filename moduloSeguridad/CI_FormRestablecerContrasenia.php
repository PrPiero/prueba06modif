<?php

class CI_FormRestablecerContrasenia{

    public function FormRestablecerContraseniaShow($VARID)
	{
        
        session_start(); 
       $correo=$_GET["varCambio"];
       $varID=$_GET["varid"];
       $_SESSION['sesion']=$correo;
 ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario restablecer contraseña</title>
</head>

<body>
<?php //echo "$correo"; ?>
<?php  //echo "$varID"; ?>
<?php //echo "$VARID";?>

<form action="getValidarRestablecerContrasenia.php?varCorreo=<?php echo $correo;?>&varId=<?php echo $varID;?> " method="post" >
	 
<h1>Formulario Restablecer Contraseña</h1>
<p>Nueva contraseña  <input type="password" placeholder="Ingrese nueva contraseña"  name="txtpassword"  pattern="[a-zA-Z0-9]{6,15}" title="Una contraseña válida debe estar compuesta por letras y/o números y tener una longitud entre 6 y 15 caracteres" required> </p>
<p>Confirme Nueva contraseña  <input type="password" placeholder="Confirme nueva contraseña"  name="txtconfirmarpassword"  pattern="[a-zA-Z0-9]{6,15}" title="Una contraseña válida debe estar compuesta por letras y/o números y tener una longitud entre 6 y 15 caracteres" required> </p>

<input type="submit" value="Ingresar" name="enviar">
<input type="hidden" value="<?php echo $VARID;?>" name="VARID">

<th><a href="../index.php"  name="volver" >Volver</a></th>
</form>




<?php }}?>




