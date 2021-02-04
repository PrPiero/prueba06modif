<?php

	class CI_BuscarBoleta {
		
		public static function BuscarBoletaShow ()
		{
			require_once ("../Shared/head.php");
			

		
?>
 <!-- Required meta tags -->
 <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
      <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@300;600&display=swap" rel="stylesheet">
       <link rel="stylesheet" href="../Shared/css/style.css" />
			<!-- /.card -->
            <form method="POST" action="../moduloVentas/getBoletaBusqueda.php" >
			
			<div class="card">
			
				<div class="card-header" style="text-align: center;">
					<h3>Busqueda de Boletas</h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					
					<table id="posts-table" class="table table-bordered table-striped" style="text-align:center">						
							<tr>
								<th scope="col" >Codigo de Boleta</th>
								<th scope="col"><input name="numBoleta" type="text" id="numBoleta" class="form-control"></th>
															
							</tr>												
                    </table>
                    <div class="form group d-flex justify-content-between">
                    <form action="form-line" method="POST"></form>
					
                    <button type="submit" class="btn btn-primary" name="btnbuscarboleta" id="btnbuscarboleta">Buscar Boleta</button>
                    
						
				
                   
                    </div>
                    
				
				</div>
				<!-- /.card-body -->
			
			</div>
			
		</form>
					<form action="../Shared/getBienvenida.php" >
					<button type="submit" class="btn btn-primary" name="btnregresar" id="btnregresar" >Volver a Principal</button>
					</form>
<?php
			require_once ("../Shared/footer.php");
		}
	}
?>