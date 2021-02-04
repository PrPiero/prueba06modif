<?php

	session_start();
	
	/*-------------------------REDIRECCIONAR SI HAY UNA SESIÓN ACTIVA-------------------------*/
	if (isset($_SESSION['email']))
	{
		header("Location: Shared/getBienvenida.php");
	}

	else
	{
		require_once ("moduloSeguridad/CI_Autentication.php");

		$login = new CI_Autentication();
		$login->AutenticationShow();
	}
?>