
<?php

class CI_ModificarProducto {
    
    public static function ModificarProductoShow ($idproducto)
    {
        require_once ("CC_ProductoController.php");
        $producto = new CC_ProductoController;
        $productos = $producto->GetProductoById($idproducto);

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

      <title>Modificar Producto</title>
  </head>
					
                    <!-- /.card-header -->
                    <br><br><br>
					<div class="card-body"  style="text-align: center;">
						
							
							<!-- SEARCH FORM -->
							<form class="form-inline" action="getModificarProducto.php" method="POST">
                            <div class="row">
                                    <div class="col-md-12">
                                        <div class="card border-primary">
                                            <div class="card-header" style="text-align: center;">
                                                <h3>Editar Usuario</h3>
                                            </div>
                                            <div class="card-body">
                                                <input name="txtidproducto" id="txtidproducto" type="hidden" value="<?php echo $productos->getIdproducto(); ?>">
                                                <div class="form-group">
                                                    <label >Nombre</label>
                                                    <input name="txtnombre" id="txtnombre" class="form-control" type="text" placeholder="Ingrese el nombre del producto" value="<?php echo $productos->getNombreProducto(); ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Descripción</label>
                                                    <input name="txtdescripcion" id="txtdescripcion" class="form-control" type="text" placeholder="Ingrese la descripción" value="<?php echo $productos->getDescripcion(); ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Precio (S/.)</label>
                                                    <input name="txtprecio" id="txtprecio" class="form-control" type="text" placeholder="Ingrese el precio" value="<?php echo $productos->getPrecio(); ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Stock</label>
                                                    <input name="txtstock" id="txtstock" class="form-control" type="text" placeholder="Ingrese el stock del producto" value="<?php echo $productos->getStock(); ?>">
                                                </div>
                                                <br>       
                                                    <div class="form-group" style=" text-align: center;">
                                                        
                                                        <a class="btn btn-danger text-white" href="../moduloGestionSistema/getGestionarListaProductos.php" role="button">Cancelar</a>
                                                        <button type="submit" class="btn btn-primary" style=" width:100px; height:50px;"name="btnModificar" id="btnModificar">Modificar</button>
                                                    </div>
                                        </div>
                                    </div>
                                </div>
                         </div>
                       </form>                 
                        

                    </div>              
				
                     
</html>  
<?php 
		}
	} 
?>  