<?
	class CI_BuscarInformesFecha
	{
		public static function BuscarInformesFechaShow()
		{
			require_once ("../Shared/head.php");             

?>
											
											<form method="POST" action="../moduloGestionVentas/getReporteBusqueda.php" >											
											<div class="card">
											
												<div class="card-header" style="text-align: center;">
													<h3>Busqueda de Informes</h3>
												</div>
												<!-- /.card-header -->
												<div class="card-body">
													
													<table id="posts-table" class="table table-bordered table-striped" style="text-align:center">						
															<tr>
																<th scope="col" >Fecha Inicio:</th>
																<th scope="col"><input name="fechaInicial" type="date" id="fechaInicial" ></th>
																<th scope="col">Fecha Final:</th>
																<th scope="col"><input name="fechaFinal" type="date" id="fechaFinal" ></th>								
															</tr>												
													</table>
													
													<div class="form-group" >
													<button type="submit" class="btn btn-primary" name="btnBuscarInforme" id="btnBuscarInforme">Buscar Informes</button>												
													</div>
													</form>										

													<div >
															<form method="POST" action="../Shared/getBienvenida.php" >
																		<div class="form-group">
																		<button type="submit" class="btn btn-primary" name="btnVolver" id="btnVolver">Volver al Principal</button>					
																		</div>		
															</form>
													</div>
													
												
												</div>
												<!-- /.card-body -->
											
											</div>
											
										

<?
			require_once ("../Shared/footer.php");
		}
	}
?>