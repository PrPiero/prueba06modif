<?php

    class CI_EditarBoleta { 
       

           

        public function EditarBoletaShow($Idboleta)
        {
             require_once ("CC_BoletaController.php");
             $boleta = new CC_BoletaController;
            $boletas = $boleta->GetBoletaById($Idboleta);
         
?>
<html>
<head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
      <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@300;600&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="../Shared/css/style.css" />

      <title>Boleta Coincidencia</title>
  </head>
  <div class="card-body"  style="text-align: center;">
            <form method="POST" class="form-inline" action="getEditarBoleta.php">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card border-primary">
                            <div class="card-header" style="text-align: center;">
                                <h3>Editar Boleta</h3>
                            </div>
                            
                            <div class="card-body">
                                <input name="txtidboleta" id="txtidboleta" type="hidden" value="<?php echo $boletas->getIdboleta(); ?>">
                                <div class="form-group">
                                    <label>numBoleta</label>
                                    <input name="txtnumboleta" id="txtnumboleta" class="form-control" type="text" placeholder="Ingrese un numero de boleta" value="<?php echo $boletas->getNumBoleta(); ?>">
                                </div>
                                <div class="form-group">
                                    <label>Fecha</label>
                                    <input name="txtfecha" id="txtfecha" class="form-control" type="date" placeholder="Ingrese una fecha" value="<?php echo $boletas->getFecha(); ?>">
                                </div>
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input name="txtnombre" id="txtnombre" class="form-control" type="text" placeholder="Ingrese nombre" value="<?php echo $boletas->getNombre(); ?>">
                                </div>
                                <div class="form-group">
                                    <label>Dni</label>
                                    <input name="txtdni" id="txtdni" class="form-control" type="text" placeholder="Ingrese un dni" value="<?php echo $boletas->getDni(); ?>">
                                </div>
                                <div class="form-group">
                                    <label>Direccion</label>
                                    <input name="txtdireccion" id="txtdireccion" class="form-control" type="text" placeholder="Ingrese el Dirrecion" value="<?php echo $boletas->getDireccion(); ?>">
                                </div>
                                <div class="form-group">
                                    <label>IdProforma</label>
                                    <input name="txtidlistaproforma" id="txtidlistaproforma" class="form-control" type="text" placeholder="Ingrese idlistaproforma" value="<?php echo $boletas->getIdlistaproforma(); ?>">
                                </div>
                                <div class="form-group">
                                    <label>Fecha1</label>
                                    <input name="txtfecha1" id="txtfecha1" class="form-control" type="date" placeholder="Ingrese la primera fecha" value="<?php echo $boletas->getFecha1(); ?>" >
                                </div>
                                <div class="form-group">
                                    <label>Fecha2</label>
                                    <input name="txtfecha2" id="txtfecha2" class="form-control" type="date" placeholder="Ingrese la segunda fecha" value="<?php echo $boletas->getFecha2(); ?>" >
                                </div>
                                <div class="form-group">
                                    <label>Cuota1</label>
                                    <input name="txtcuota1" id="txtcuota1" class="form-control" type="text" placeholder="Ingrese la primera cuota" value="<?php echo $boletas->getCuota1(); ?>" >
                                </div>
                                <div class="form-group">
                                    <label>Cuota2</label>
                                    <input name="txtcuota2" id="txtcuota2" class="form-control" type="text" placeholder="Ingrese la segunda cuota" value="<?php echo $boletas->getCuota2(); ?>" >
                                </div>
                                <div class="form-group">
                                    <label>ImporteTotal</label>
                                    <input name="txtimportetotal" id="txtimportetotal" class="form-control" type="text" placeholder="Ingrese la segunda cuota" value="<?php echo $boletas->getImporteTotal(); ?>" >
                                </div>
                                
                                <?php 
                                    if ( $boletas->getEstado() == "Pagado") 
                                    { 
                                ?>
                                        <div class="form-group">
                                            <label>Estado</label>
                                            <select class="form-control" name="selectEstado" id="selectEstado">
                                                <option selected value="Pagado">Pagado</option>
                                                <option value="Pendiente">Pendiente</option>
                                            </select>
                                        </div>

                                <?php 
                                    }

                                    else if ($boletas->getEstado() == "Pendiente")  
                                    { 
                                ?>
                                        <div class="form-group">
                                            <label>Estado</label>
                                            <select class="form-control" name="selectEstado" id="selectEstado">
                                                <option value="Pagado">Pagado</option>
                                                <option selected value="Pendiente">Pendiente</option>
                                            </select>
                                        </div>
                                <?php } ?> 
                                <br>
                               
                               
                                        
                                 <button type="submit" class="btn btn-primary" style=" width:100px; height:50px;" name="btnactualizar" id="btnactualizar" >Actualizar</button>
                                        
                                        

                                
                            </div>
                        </div>
                    </div>
                </div>
            </form>
           
            <form action="../moduloVentas/getBoleta.php" class="form-inline" >
                <button type="submit" class="btn btn-primary" style=" width:100px; height:50px; background-color:#FF2D00"name="btnvolver" id="btnvolver" >Cancelar</button>
            </form>
     </div>
</html>
<?php
			require_once ("../Shared/footer.php");
		}
	}
?>