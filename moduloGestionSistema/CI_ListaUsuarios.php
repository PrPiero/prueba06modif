<?php

	class CI_ListaUsuarios {

		public static function ListaUsuariosShow($arregloUsuarios)
		{
			require_once ("CC_UsuarioController.php");

			$nombreuser = new CC_UsuarioController;
			$userbuscado = $nombreuser->GetUsuarioByName($arregloUsuarios);

				require_once ("../Shared/head.php");
?>

  				<div class="card">
					<div class="card-header" style="text-align: center;">
						<h3>Lista de Usuarios</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<nav class="navbar-expand navbar-white navbar-light">
							<!-- SEARCH FORM -->
							<form class="form-inline" action="../moduloGestionSistema/getListaUsuarios.php" method="GET">
								<div class="input-group input-group-sm col-md-3">
									<input name="nombre" id="nombre" class="form-control form-control-navbar" type="search" placeholder="Buscar" aria-label="Search" value="<?php if (isset($_GET['nombre'])) {echo $_GET['nombre'];} else{echo "";} ?>">
									<div class="input-group-append">
										<button class="btn btn-navbar" type="submit">
											<i class="fas fa-search"></i>
										</button>
									</div>
								</div>
							</form>
                        </nav>
                        <br>
                        <table  class="table table-bordered table-striped" style="text-align:center">
							<thead>
								<tr>
									<th scope="col">Número</th>
									<th scope="col">Email</th>
									<th scope="col">Nombre</th>
									<th scope="col">DNI</th>
									<th scope="col">Celular</th>
									<th scope="col">Rol</th>
									<th scope="col">Estado</th>
									<th scope="col">Acciones</th>
								</tr>
							</thead>
							<tbody>
								<?php
									if (empty($arregloUsuarios)) 
									{
										echo null;
									}
								
									else 
									{
										foreach ($userbuscado as $registro) 
										{
								?>   
										<tr>
											<th scope="row"><?php echo $registro['idusuario']?></th>
											<td><?php echo $registro['email']?></td>
											<td><?php echo $registro['nombre']?></td>
											<td><?php echo $registro['DNI']?></td>
											<td><?php echo $registro['celular']?></td>
											<td><?php echo $registro['rol']?></td>
											<td><?php if (($registro['estado'] == "Habilitado")) {echo "Habilitado";} else if (($registro['estado'] == "Deshabilitado")) {echo "Deshabilitado";}?></td>
											<td>
												<a href="getEditarUsuario.php?idusuario=<?php echo $registro['idusuario']?>" class="btn btn-xs btn-info">
													<i class="fa fa-pencil-alt"></i>
												</a>
												<a href="getEliminarUsuario.php?idusuario=<?php echo $registro['idusuario']?>" class="btn btn-xs btn-danger">
													<i class="fa fa-times"></i>
												</a>
											</td>
										</tr>
									<?php } }?>
							</tbody>
                        </table><br>
						<div class="form-group d-flex justify-content-between">
							<form class="form-inline" method="POST" action="getAgregarUsuario.php">
								<button type="submit" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> &nbspRegistrar Usuario</button>
							</form>
							<form class="form-inline" method="POST" action="../Shared/getBienvenida.php">
								<button name="btnPrincipal" type="submit" class="btn btn-danger pull-right">Volver a Principal</button>
							</form>
						</div>  
					</div>
					<!-- /.card-body -->
                  </div>
<?php 
			require_once ("../Shared/footer.php"); 
		} 
	} 
?>