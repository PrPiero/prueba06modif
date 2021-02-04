<?php

	class CI_GestionarListaProductos {
		
		public static function GestionarListaProductosShow ($arregloProductos)
		{
			//require_once ("../Shared/head.php");
			require_once ("CC_ProductoController.php");

			$nomproducto = new CC_ProductoController;
			$prodbuscado = $nomproducto->GetProductoByName($arregloProductos);
?>

<!doctype html>
<html lang="es">

<div class="card">
<head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
      <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@300;600&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="../Shared/css/style.css" />

      <title>Gestionar Lista de Productos</title>
  </head>

					<div class="card-header" style="text-align: center;">
						<h3>Lista de Productos</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<nav class="navbar-expand navbar-white navbar-light">
							
							<!-- SEARCH FORM -->
							<form class="form-inline" action="../moduloGestionSistema/getGestionarListaProductos.php" method="GET">
								<div class="input-group input-group-sm col-md-3">
									<input name="nomprod" id="nomprod" class="form-control form-control-navbar" type="search" placeholder="Buscar" aria-label="Search" value="<?php if (isset($_GET['nomprod'])) {echo $_GET['nomprod'];} else{echo "";} ?>">
									<div class="input-group-append">
										<button class="btn btn-navbar" type="submit">
											<i class="fas fa-search"></i>
										</button>
									</div>
								</div>
							</form>
                        </nav>
                        <table id="posts-table" class="table table-bordered table-striped" style="text-align:center">
							<thead>
								<tr>
									<th scope="col">Id</th>
									<th scope="col">Nombre</th>
									<th scope="col">Descripción</th>
									<th scope="col">Precio (S/.)</th>
									<th scope="col">Stock</th>
									<th scope="col">Acciones</th>
								</tr>
							</thead>
							<tbody>
								<?php
										if (empty($arregloProductos)) 
										{
											echo null;
										}
									
										else 
										{
											foreach ($prodbuscado as $registro) 
											{
								?>  
									<tr>
											<th scope="row"><?php echo $registro['idproducto']?></th>
											<td><?php echo $registro['nombre']?></td>
											<td><?php echo $registro['descripcion']?></td>
											<td><?php echo $registro['precio']?></td>
											<td><?php echo $registro['stock']?></td>
										<td>
										<form action="../moduloGestionSistema/getModificarProducto.php?idproducto=<?php echo $registro['idproducto']?>" method="POST" class="form-inline">
                                            <button type="submit" class="btneditarusuario" ></button>
										</form>	

										<form action="../moduloGestionSistema/getEliminarProducto.php?idproducto=<?php echo $registro['idproducto']?>" method="POST" class="form-inline">	
                                            <button type="submit" class="btndeshausuario"></button>
										</form>
										</td>
									</tr>
									<?php } }?>
							</tbody>
                        </table>
						<form class="form-inline" method="POST" action="../Shared/getBienvenida.php">
								<button type="submit" class="btn btn-primary pull-right"><i class="fa fa-plus" name="btnEnviar" id="btnEnviar"></i> Volver a Principal</button>
							</form>
                        <form class="form-inline" method="POST" action="../moduloGestionSistema/getAgregarProducto.php">
								<button type="submit" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Agregar Producto</button>
							</form><br>
					</div>
					<!-- /.card-body -->
                </div>
<?php 
			require_once ("../Shared/footer.php");
		}
	}
?>