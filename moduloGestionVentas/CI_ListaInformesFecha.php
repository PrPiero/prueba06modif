<?php

	class CI_ListaInformesFecha {
		
		public static function ListaInformesShow ($arregloInformes)
		{
			require_once ("../Shared/head.php");
			
			require_once ("CC_ReporteController.php");
?>
			<!-- /.card -->		
			
			<div class="card">
			
				<div class="card-header" style="text-align: center;">
					<h3>Lista de Informes </h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					
					<table id="posts-table" class="table table-bordered table-striped" style="text-align:center">
						<thead>
							<tr>
								<th scope="col">Número</th>
								<th scope="col">Total Informe</th>
								<th scope="col">Fecha</th>								
							</tr>
						</thead>
						<tbody>
							<?php
								$total_informes=0;
								foreach ($arregloInformes as $informes) 
								{
							?>   
								<tr>
									<th scope="row"><?php echo $informes['idinforme']?></th>									

									<td ><?php echo $informes['total_dia']?></td>

									<td><?php echo $informes['fecha']?></td>

									
									<?php 
								
									
									$total_informes= $informes['total_dia']+$total_informes;
								?>	
								</tr>
							<?php } 									
									
								 ?>
							
						</tbody>
					</table>
		<form method="POST" action="../moduloGestionVentas/getAgregarReporte.php" >

					<div class="form-group">
                    <button type="submit" class="btn btn-primary" name="btnReporte" id="btnReporte">Emitir Reporte</button>
					<input name="total_informes" type="hidden" value="<?echo $total_informes?>">
                    </div>		
		</form>
		<form method="POST" action="../moduloGestionVentas/getImprimirReporte.php" >
		<div class="form-group">
                    <button type="submit" class="btn btn-primary" name="btnImprimir" id="btnImprimir">Imprimir Reporte</button>
					<?php session_start(); $_SESSION['envioArreglo']=$arregloInformes; ?>
                    </div>
		</form>
		<form target="_blank" method="POST" action="../Shared/getBienvenida.php" >
					<div class="form-group">
                    <button type="submit" class="btn btn-primary" name="btnVolver" id="btnVolver">Volver al Principal</button>					
                    </div>		
		</form>
					</div>
				<!-- /.card-body -->
			
			</div>
<?php
			require_once ("../Shared/footer.php");
		}
	}
?>	