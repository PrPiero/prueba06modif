<?php

	class CI_BoletaCoincidencia {

        public static function BoletaCoincidenciaShow ($arregloboletas)
		{
			//require_once ("../Shared/head.php");
			
			
			
			
?>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
      <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@300;600&display=swap" rel="stylesheet">
      
<link rel="stylesheet" href="../Shared/css/style.css" />

      <title>Boleta Coincidencia</title>
  </head>
			<!-- /.card -->
			
			
			<div class="card">
			
				<div class="card-header" style="text-align: center;">
					<h3>Boleta Coincidencia </h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					
					<table id="posts-table" class="table table-bordered table-striped" style="text-align:center">
						<thead>
							<tr>
                            <th scope="col">Idboleta</th>
								<th scope="col">numBoleta</th>
								<th scope="col">fecha</th>
								<th scope="col">nombre</th>
								<th scope="col">dni</th>
								<th scope="col">direccion</th>
                                <th scope="col">idlistaproforma</th>
                                <th scope="col">fecha1</th>
                                <th scope="col">fecha2</th>
                                <th scope="col">cuota1</th>
                                <th scope="col">cuota2</th>
                                <th scope="col">importeTotal</th>
                                <th scope="col">estado</th>
                                <th scope="col">accion</th>
													
							</tr>
						</thead>
						<tbody>
							<?php
								
								foreach ($arregloboletas as $boletas) 
								{
							?>   
								<tr>
                                <th scope="row"><?php echo $boletas['Idboleta']?></th>
									<td><?php echo $boletas['numBoleta']?></td>
									<td><?php echo $boletas['fecha']?></td>
                                    <td><?php echo $boletas['nombre']?></td>
                                    <td><?php echo $boletas['dni']?></td>
                                    <td><?php echo $boletas['direccion']?></td>
                                    <td><?php echo $boletas['idlistaproforma']?></td>
                                    <td><?php echo $boletas['fecha1']?></td>
                                    <td><?php echo $boletas['fecha2']?></td>
                                    <td><?php echo $boletas['cuota1']?></td>
                                    <td><?php echo $boletas['cuota2']?></td>
                                    <td><?php echo $boletas['importeTotal']?></td>
                                    <td><?php echo $boletas['estado']?></td>
                                    <td>
									
											<form action="getEditarBoleta.php?Idboleta=<?php echo $boletas['Idboleta']?>" method="POST">
												<button type="submit" class="btneditarusuario"  ></button>
											</form>
										
									</td>
                                  	
								</tr>
							<?php } 
									session_start();
									require_once ("../Shared/footer.php");
									
								 ?>
							
						</tbody>
					</table>

				
				
				</div>
		
			
			</div>
			
		
		<div class="form-group">
						<form action="../moduloVentas/getBoleta.php" >
								<button type="submit" class="btn btn-primary" name="btnregresar" id="btnregresar" >Regresar</button>
						</form>
				
        </div>
		
<?php
				
		}
		
	
		}
	
?>	