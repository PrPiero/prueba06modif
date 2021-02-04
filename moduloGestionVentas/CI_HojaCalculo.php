<?php

	class CI_HojaCalculo {
		
		public static function HojaCalculoShow ($arregloBoletas)
		{
		
           // require_once ("CC_InformeController.php");
            //require_once ("../Shared/head.php");
          
		?>

        
<!doctype html>
<html lang="es">
  <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
      <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@300;600&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="../Shared/css/style.css" />
            
   <br>
   <br>
      <title>Bienvenido</title>
  </head>

  <body>
			<!-- /.card -->
            <div class="card">
                        <div class="card-header" style="text-align: center;">
                            <h3>Hoja de Calculo</h3>
                        </div>
					<!-- /.card-header -->
					<div class="card-body">
					
                    
                    <table id="posts-table" class="table table-bordered table-striped" style="text-align:center">
                      <thead>
                        <tr>
                            <th scope="col">Número</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Fecha de C1</th>
                            <th scope="col">Fecha de C2</th>
                            <th scope="col">Cuota N°1 (US$)</th>
                            <th scope="col">Cuota N°2 (US$)</th>
                            <th scope="col">Total (US$)</th>
                            <th scope="col">Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                        <?php
                            $total_dia=0;
                            $totalCuotas=0;
                            if($arregloBoletas==NULL){
                                $arregloBoletas=[];

                            }
                            
                            
                            foreach ($arregloBoletas as $boletas) 
                            {
                        ?>   
                            <tr>
                                <td scope="row"><?php echo $boletas['numBoleta']?></td>
                                <td  ><?php echo $boletas['nombre']?></td>
                                <td ><?php echo $boletas['fecha1']?></td>

                                <?php  if($boletas['fecha2']==NULL){ 

                                ?>
                                <td>-------------</td>
                                <?php

                                }else{
                                ?>
                                <td><?php echo $boletas['fecha2']?></td>
                                <?php
                                }
                            
                                ?>
                                
                                <td ><?php echo $boletas['cuota1']?></td>
                                <td ><?php echo $boletas['cuota2']?></td>
                                <td><?php echo $boletas['importeTotal']?></td>
                                <td><?php echo $boletas['estado']?></td>
                                <?php 

                                

                                if($boletas['fecha1']!=$boletas['fecha2']){

                                    
                                    $totalCuotas=$boletas['cuota1']+$totalCuotas;

                                }else{
                                

                                    $totalCuotas=$boletas['cuota1']+$boletas['cuota2']+$totalCuotas;
                                }
                                

                                $total_dia= $boletas['importeTotal']+$total_dia;
                            ?>	
                            </tr>
                          
                        <?php } 

                             ?>
                        
                    </tbody>
                </table>

                    <div class="padre">

                            <div class="hijo">
                                <form method="POST" action="../moduloGestionVentas/getAgregarInforme.php" class="form-inline">
                                    <input  name="total_dia" type="hidden" value="<?echo $total_dia?>">
                                    <input  name="subtotal_dia" type="hidden" value="<?echo $totalCuotas?>">
                                    <button type="submit" class="btn btn-primary" name="btnEmitirInforme" id="btnEmitirInforme">Emitir Informe</button>
                                </form>

                            </div>
                            <div class="hijo">
                                <form action="../moduloGestionVentas/getImprimirInforme.php" method="POST" class="form-inline">

                                    <button type="submit"  name="btn-imprimir-informe" class="btn btn-primary">
                                            Imprimir Informe


                                    </button>
                                </form >
                                
                            </div>

                            <div class="hijo">
                            <form action="../Shared/getBienvenida.php" class="form-inline">
                            
                            
                           
                                <button   name="btnprincipal" class="btn btn-primary">
                                Volver
                                </button>
                            </form>


                            </div>
                        
                        
                        </div>
					<!-- /.card-body -->
                  </div>

                </div>

                </body>
 
 </html>	
<?php 
 require_once ("../Shared/footer.php");
                            
			
		} 
	} 
?>