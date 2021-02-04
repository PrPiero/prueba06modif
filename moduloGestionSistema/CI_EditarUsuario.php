<?php

    class CI_EditarUsuario {

        public function EditarUsuarioShow($idusuario)
        {
            require_once ("../Shared/head.php");
            require_once ("CC_UsuarioController.php");

            $usuario = new CC_UsuarioController;
            $usuarios = $usuario->GetUsuarioById($idusuario);
            $rol = new CC_UsuarioController;
            $roles = $rol->ObtenerRoles();
?>
                    <div class="card">
                    <!-- /.card-header -->
                    <br><br><br>
					<div class="card-body"  style="text-align: center;">
						
							
							<!-- SEARCH FORM -->
							<form class="form-inline" action="getEditarUsuario.php" method="POST">
                            <div class="row">
                                    <div class="col-md-12">
                                        <div class="card border-primary">
                                            <div class="card-header" style="text-align: center;">
                                                <h3>Editar Usuario</h3>
                                            </div>
                                            <div class="card-body">
                                                <input name="txtidusuario" id="txtidusuario" type="hidden" value="<?php echo $usuarios->getIdUsuario(); ?>">
                                                <div class="form-group">
                                                    <label >Email</label>
                                                    <input name="txtEmail" id="txtEmail" class="form-control" type="text" placeholder="Ingrese un correo electrónico" value="<?php echo $usuarios->getEmail(); ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Nombre</label>
                                                    <input name="txtNombre" id="txtNombre" class="form-control" type="text" placeholder="Ingrese el nombre del usuario" value="<?php echo $usuarios->getNombre(); ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>DNI</label>
                                                    <input name="txtDNI" id="txtDNI" class="form-control" type="text" placeholder="Ingrese el DNI" value="<?php echo $usuarios->getDni(); ?>" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label>Fecha de Emisión del DNI</label>
                                                        <input name="txtFechaDNI" id="txtFechaDNI" class="form-control" type="date" placeholder="Ingrese la fecha" value="<?php echo $usuarios->getFecha_emision_dni(); ?>" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label>Celular</label>
                                                    <input name="txtCelular" id="txtCelular" class="form-control" type="text" placeholder="Ingrese el celular" value="<?php echo $usuarios->getCelular(); ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Rol:</label>
                                                    <select class="form-control" name="selectRol" id="selectRol">
                                                        <option>Seleccionar Rol</option>
                                                        <?php
                                                            foreach ($roles as $registro) 
                                                            {
                                                        ?>
                                                                <option <?php $registro['idrol'] == $usuarios->getIdrol() ? 'selected' : ''; ?>  value="<?php echo $registro['idrol']?>"><?php echo $registro['rol']?></option>
                                                        <?php    
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <?php 
                                                    if ($usuarios->getEstado() == "Habilitado") 
                                                    { 
                                                ?>
                                                        <div class="form-group">
                                                            <label>Estado</label>
                                                            <select class="form-control" name="selectEstado" id="selectEstado">
                                                                <option selected value="Habilitado">Habilitado</option>
                                                                <option value="Deshabilitado">Deshabilitado</option>
                                                            </select>
                                                        </div>

                                                <?php 
                                                    }

                                                    else if ($usuarios->getEstado() == "Deshabilitado") 
                                                    { 
                                                ?>
                                                        <div class="form-group">
                                                            <label>Estado</label>
                                                            <select class="form-control" name="selectEstado" id="selectEstado">
                                                                <option value="Habilitado">Habilitado</option>
                                                                <option selected value="Deshabilitado">Deshabilitado</option>
                                                            </select>
                                                        </div>
                                                <?php } ?> 
                                                <br>       
                                                    <div class="form-group d-flex justify-content-between" style=" text-align: center;">
                                                        <button type="submit" class="btn btn-primary" style=" width:100px; height:50px;"name="btnEnviarEdit" id="btnEnviarEdit">Actualizar</button>
                                                        <a class="btn btn-danger text-white" href="../moduloGestionSistema/getListaUsuarios.php" role="button">Cancelar</a>
                                                    </div>
                                        </div>
                                    </div>
                                </div>
                         </div>
                       </form>                 
                    </div>
<?php
            require_once ("../Shared/footer.php");
        }
    }
?>