<?php



    $idproducto = $_POST['txtEmail'];

    if (strlen(trim($email)) > 5 and strlen(trim($password)) > 5 and strlen(trim($dni)) == 8)
    {
        require_once ("CC_UsuarioController.php");

        $addUsuario = new CC_UsuarioController;
        $addUsuario->RegistroUsuario($email, $password, $nombre, $dni, $rol);
    }

    else
    {
        require_once ("../Shared/CI_Mensaje.php");

        $mensaje = new CI_Mensaje;
        $mensaje->MensajeShow("Datos no Válidos", "href='../moduloGestionSistema/AgregarUsuario.php'");
    }

?>