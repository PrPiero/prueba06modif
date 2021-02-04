<?php

    class CC_UsuarioController {
        
        /*-------------------------LISTAR USUARIOS-------------------------*/
        public function ObtenerUsuarios()
        {
            require_once ("../Models/CE_Usuario.php");

            $usuarios = new CE_Usuario;
            $arregloUsuarios = $usuarios->ListarUsuarios();

            require_once("CI_ListaUsuarios.php");
            CI_ListaUsuarios::ListaUsuariosShow($arregloUsuarios);
        }

        /*-------------------------LISTAR ROLES-------------------------*/
        public function ObtenerRoles()
        {
            require_once ("../Models/CE_UsuarioPrivilegio.php");

            $roles = new CE_UsuarioPrivilegio;
            return $roles->ListarRoles();
        }

        /*-------------------------REGISTRAR USUARIOS-------------------------*/
        public function RegistroUsuario ($email, $password, $nombre, $dni, $fecha_dni, $celular, $rol)
        {
            require_once ("../Models/CE_Usuario.php");

            $usuarios = new CE_Usuario;
            $resultado = $usuarios->RegistrarUsuario($email, $password, $nombre, $dni, $fecha_dni, $celular, $rol);

            if ($resultado == 1)
            {
                require_once ("../Shared/CI_Mensaje.php");

                $mensaje = new CI_Mensaje();
                $mensaje->MensajeShow("Usuario registrado con éxito", "../moduloGestionSistema/getListaUsuarios.php");
            }

            else
            {
                require_once ("../Shared/CI_Mensaje.php");

                $mensaje = new CI_Mensaje();
                $mensaje->MensajeShow("Error en la consulta", "../moduloGestionSistema/getAgregarUsuario.php");
            }
        }

        /*-------------------------EDITAR USUARIOS-------------------------*/
        public function EditUsuario ($email, $nombre, $celular, $rol, $estado, $idusuario)
        {
            //session_start();
            require_once ("../Models/CE_Usuario.php");

            $usuarios = new CE_Usuario;
            $resultado = $usuarios->EditarUsuario($email, $nombre, $celular, $rol, $estado, $idusuario);

            if ($resultado == 1)
            {
                require_once ("../Shared/CI_Mensaje.php");

                $mensaje = new CI_Mensaje();
                $mensaje->MensajeShow("Usuario modificado con éxito", "../moduloGestionSistema/getListaUsuarios.php");
            }

            else
            {
                require_once ("../Shared/CI_Mensaje.php");

                $mensaje = new CI_Mensaje();
                $mensaje->MensajeShow("Error en la consulta", "../moduloGestionSistema/getEditarUsuario.php");
            }
        }

        /*-------------------------ELIMINAR USUARIOS-------------------------*/
        public function DeleteUsuario($idusuario)
        {
            require_once ("../Models/CE_Usuario.php");

            $usuarios = new CE_Usuario;
            $resultado = $usuarios->EliminarUsuario($idusuario);

            if ($resultado == 1)
            {
                header("Location: ../moduloGestionSistema/getListaUsuarios.php");
            }

            else
            {
                require_once ("../Shared/CI_Mensaje.php");

                $mensaje = new CI_Mensaje();
                $mensaje->MensajeShow("Error en la consulta", "../moduloGestionSistema/getListaUsuarios.php");
            }
        }
        
        /*-------------------------SELECCIONAR USUARIOS-------------------------*/
        public function GetUsuarioById($idusuario)
        {
            require_once ("../Models/CE_Usuario.php");

            $usuarios = new CE_Usuario;
            return $usuarios->ObtenerDatosUsuario($idusuario);
        }

        /*-------------------------BUSCAR USUARIO POR NOMBRE-------------------------*/
        public function GetUsuarioByName($nombre)
        {
            require_once ("../Models/CE_Usuario.php");

            $usuarios = new CE_Usuario;
            return $usuarios->BuscarPorNombre($nombre);
        }
    }
?>