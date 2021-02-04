<?php

require_once ("../Models/Conexion.php");

    class Buscar extends Conexion {
        
        public function Buscar()
        {
            $this->Conectar();
        }

        public static function BuscarProductoshow() // $proforma va dentro
        {   
            require_once ("../Shared/head.php");
            require_once ("CC_BuscarProducto.php");
            
            
?>
            <form method="POST" action=<?php if (isset($_GET["codigoproforma"])){ echo "get_BuscarProducto.php?codigoproforma=".$_GET['codigoproforma']; } else { echo "get_BuscarProducto.php";} ?>>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card border-primary">
                            <div class="card-header" style="text-align: center;">
                                <h3>Buscar Producto</h3>
                            </div>
                            <div class="card-body">

                           <?php
                            //$datos4 = NULL;
                            //$consulta3 = $this->Conectar()->prepare("SELECT COUNT(codigoProforma) FROM listaproformas WHERE codigoProforma=$proforma");
                              //$consulta3->execute();
                              //$datos3= $consulta3->fetch(PDO::FETCH_OBJ);
                               // if($datos3 !="1" ){
                            ?>
                            <div class="form-group">
                                    <label>Proforma</label>
                                    <input name=<?php if (isset($_GET['codigoproforma'])){ echo 'codigoproforma'; } else { echo "txtProf";} ?> id="txtProf" class="form-control" type="text" placeholder="Ingrese numero de proforma" <?php if (isset( $_GET["codigoproforma"])) { echo "disabled"; } else { echo ""; } ?> value="<?php if (isset( $_GET["codigoproforma"])) {echo  $_GET["codigoproforma"];} else{echo "";} ?>">
                                </div>
                                <?php
                               // }
                                ?>

                                <div class="form-group">
                                    <label>Producto</label>
                                    <input name="txtProd" id="txtProd" class="form-control" type="text" placeholder="Ingrese un producto">
                                </div>
                                
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="btnBuscarProd" id="btnBuscarProd">Buscar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
<?php
			require_once ("../Shared/footer.php");
        }



       
        

	}
?>
