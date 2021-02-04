<?php

	class CI_ListaProductosCoincidencia {
		
		public static function ListaProductosCoincidenciaShow ($arregloProductos,$proforma)
		{
			require_once ("../Shared/head.php");
			
			require_once ("CC_BuscarProducto.php");
?>
			<!-- /.card -->
			<div class="card">
				<div class="card-header" style="text-align: center;">
					<h3>Lista de Productos</h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">

<?php /*			
					<nav class="navbar-expand navbar-white navbar-light">
                        <form class="form-inline" method="POST" action="AgregarUsuario.php">
                            <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> &nbspRegistrar Usuario</button>
                        </form><br>
						<!-- SEARCH FORM -->
						<form class="form-inline" action="#">
							<div class="input-group input-group-sm col-md-3">
								<input class="form-control form-control-navbar" type="search" placeholder="Buscar" aria-label="Search">
								<div class="input-group-append">
									<button class="btn btn-navbar" type="submit">
										<i class="fas fa-search"></i>
									</button>
								</div>
							</div>
						</form>
					</nav>
*/ ?>

					<table id="posts-table" class="table table-bordered table-striped" style="text-align:center">
						<thead>
							<tr>
							<?php	//<th scope="col">Id</th>     ?>
								<th scope="col">Producto</th>
								<th scope="col">Descipcion</th>
								<th scope="col">Precio</th>
								<th scope="col">Stock</th>
								<th scope="col">Agregar</th>
							</tr>
						</thead>
						<tbody>
							<?php
								foreach ($arregloProductos as $registro) 
								{
							?>   
								<tr>
								<?php //	<th scope="row"><?php echo $registro['idproducto'] ? > </th>  ?>
									<td><?php echo $registro['nombre']?></td>
									<td><?php echo $registro['descripcion']?></td>
									<td><?php echo $registro['precio']?></td>
                                    <td><?php echo $registro['stock']?></td>
									<td>
										<a href="DetallesProducto.php?idproducto=<?php echo $registro['idproducto'];?>&codigoproforma=<?php echo $proforma;?>" class="btn btn-xs btn-danger">
											<i class="fa fa-times"></i>
										</a>
									</td>
<?php /*
									<td>
										<a href="EliminarUsuario.php?idusuario=<?php echo $registro['idusuario']?>" class="btn btn-xs btn-danger">
											<i class="fa fa-times"></i>
										</a>
									</td>
*/ ?>

								</tr>
							<?php } ?>
						</tbody>
				    </table>
				</div>
				<!-- /.card-body -->
			</div>
<?php
			require_once ("../Shared/footer.php");
		}
	}
?>