<?php

    class CC_AutenticationController {

        public function verificarUsuario ($usuario, $password)
        {
            //session_start();
            require_once("../Models/CE_Usuario.php");

            $usuarios = new CE_Usuario;
            $resultado = $usuarios->ValidarUsuario($usuario, $password);

            if ($resultado == 1) 
            {
                require_once ("../Models/CE_UsuarioPrivilegio.php");
                require_once ("CI_Bienvenida.php");

                $privilegio = new CE_UsuarioPrivilegio;
                $principal = new CI_Bienvenida;
                $listaPrivilegios = $privilegio->ObtenerPrivilegios($usuario);
                $principal->BienvenidaShow($listaPrivilegios);
            }

            else
            {
                require_once ("../Shared/CI_Mensaje.php");

                $mensaje = new CI_Mensaje();
                $mensaje->MensajeShow("Usuario no encontrado o deshabilitado", "../index.php");
            }
        }

        public function VerificarForm ($email,$dni,$fecha,$celular)
        {
            //session_start();
            require_once ("../Models/CE_Usuario.php"); //trae el codigo aqui y si no exista la ruta arroja error

            $form = new CE_Usuario;
            list($resultado1,$idusuario)= $form->VerificarFormComp($email,$dni,$fecha,$celular); 

            if ($resultado1 == 1 and !Empty($idusuario))
            {
                require_once ("CI_FormCorreo.php");

                $mensaje = new CI_FormCorreo();
                $mensaje->FormCorreoShow($idusuario); //enviando el valor del id 
            }
            elseif($resultado1=='')
            {
                require_once ("../Shared/CI_Mensaje.php");

                $mensaje = new CI_Mensaje();
                $mensaje->MensajeShow("Datos incorrectos ", "href='restablecer.php'");
            }
            else 
            {
                require_once ("../Shared/CI_Mensaje.php");

                $mensaje = new CI_Mensaje();
                $mensaje->MensajeShow("Error en la consulta, usuario no encontrado o deshabilitado", "href='../Shared/CI_Mensaje.php'");
            }
        }
        public function EditarFormRestablecer($contrasenia1,$varID)
        {
            //session_start();
            require_once ("../Models/CE_Usuario.php"); //trae el codigo aqui y si no exista la ruta arroja error

            $form = new CE_Usuario;
            $resultado1= $form->EditarRestablecercontrasenia($contrasenia1,$varID); 

            if ($resultado1 == 1)
            {
                require_once ("CI_MensajeExito.php");

                $mensaje = new CI_MensajeExito();
                $mensaje->MensajeExitoShow("Contraseña restablecida con exito", "href='../index.php'");
            }
            
            else 
            {
                require_once ("../Shared/CI_Mensaje.php");

                $mensaje = new CI_Mensaje();
                $mensaje->MensajeShow("Error en la consulta", "href='../index.php'");
            }
        }




    }

?>