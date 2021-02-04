<?php

    class CI_RegistrarUsuario {
    
        public function RegistrarUsuarioShow()
        {
            require_once ("../Shared/head.php");
            require_once ("CC_UsuarioController.php");
            
            $rol = new CC_UsuarioController;
            $roles = $rol->ObtenerRoles();
?>					
                    <div class="card">
                    <!-- /.card-header -->
                    <br><br><br>
					<div class="card-body"  style="text-align: center;">
						<!-- SEARCH FORM -->
						<form class="form-inline" action="getAgregarUsuario.php" method="POST">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card border-primary">
                                        <div class="card-header" style="text-align: center;">
                                            <h3>Registrar Usuario</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input name="txtEmail" id="txtEmail" class="form-control" type="text" placeholder="Ingrese un correo electrónico" >
                                            </div>
                                            <div class="form-group">
                                                <label>Contraseña</label>
                                                <input name="txtPassword" id="txtPassword" class="form-control" type="password" placeholder="Ingrese una contraseña">
                                            </div>
                                            <div class="form-group">
                                                <label>Confirmar contraseña</label>
                                                <input name="txtConfirmPassword" id="txtConfirmPassword" class="form-control" type="password" placeholder="Repita la contraseña">
                                            </div>
                                            <div class="form-group">
                                                <label>Nombre</label>
                                                <input name="txtNombre" id="txtNombre" class="form-control" type="text" placeholder="Ingrese el nombre del usuario">
                                            </div>
                                            <div class="form-group">
                                                <label>DNI</label>
                                                <input name="txtDNI" id="txtDNI" class="form-control" type="text" placeholder="Ingrese el DNI">
                                            </div>
                                            <div class="form-group">
                                                <label>Fecha de emisión del DNI</label>
                                                <input name="txtFechaDNI" id="txtFechaDNI" class="form-control" type="date" placeholder="Introduzca la fecha">
                                            </div>
                                            <div class="form-group">
                                                <label>Celular</label>
                                                <input name="txtCelular" id="txtCelular" class="form-control" type="text" placeholder="Ingrese el celular">
                                            </div>
                                            <div class="form-group">
                                                <label>Rol:</label>
                                                <select class="form-control" name="selectRol" id="selectRol">
                                                    <option>Seleccionar Rol</option>
                                                    <?php
                                                        foreach ($roles as $registro) 
                                                        {
                                                    ?>
                                                            <option value="<?php echo $registro['idrol']?>"><?php echo $registro['rol']?></option>
                                                    <?php    
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <br>
                                            <div class="form-group d-flex justify-content-between" style=" text-align: center;">
                                                <button type="submit" class="btn btn-primary " style=" width:100px; height:50px;" name="btnEnviarAdd" id="btnEnviarAdd">Registrar</button>
                                                <a class="btn btn-danger text-white" href="../moduloGestionSistema/getListaUsuarios.php" role="button">Cancelar</a>
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