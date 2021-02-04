<?php 


class Informepdf {

    public static function InformeShow($arregloBoletas)
    {
      session_start();
      date_default_timezone_set("America/Lima");
      $fecha=date("Y-m-d");
require_once ('../Shared/lib/pdf/mpdf.php');
$html ='<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Informe</title>
    <link rel="stylesheet" href="../Shared/css/stylepdf.css" media="all" />
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="../Shared/img/logo_joyeria.png">
      </div>
      <h1>INFORME DE VENTAS</h1>
     
      <div id="project">
    
        <div><span>COLABORADOR</span> Richard Victorio</div>
        <div><span>EMAIL</span> <a href="mailto:AFFAREX@gmail.com">AFFAREX@gmail.com</a></div>
        <div><span>FECHA </span>'.$fecha.'</div>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="f">N° Boleta</th>
            <th class="f">Cliente</th>
            <th class ="f">FechaC1</th>
            <th class ="f">FechaC2</th>
            <th class ="f">Cuota 1</th>
            <th class ="f">Cuota 2</th>
            <th class ="total">Total</th>
            <th class ="f">Estado</th>

          </tr>
        </thead>
        <tbody>';

     

      
        $total_dia=0;
        foreach ($arregloBoletas as $boletas) 
        {
      
            $html .='<tr>
            <td class="f">'.$boletas['numBoleta'].'</td>
            <td  class ="f">'.$boletas['nombre'].'</td>
            <td class="f" >'.$boletas['fecha1'].'</td>
            <td class="f" >'.$boletas['fecha2'].'</td>
            <td class ="f"> $'.$boletas['cuota1'].'</td>
            <td class ="f"> $'.$boletas['cuota2'].'</td>
            <td class ="total"> $'.$boletas['importeTotal'].'</td>
            <td class ="f"> '.$boletas['estado'].'</td>
          </tr>';
      
           $total_dia= $boletas['importeTotal']+$total_dia;
           if($boletas['fecha1']!=$boletas['fecha2']){
							
            $totalCuotas=$boletas['cuota1']+$totalCuotas;

        }else{
            $totalCuotas=$boletas['cuota1']+$boletas['cuota2']+$totalCuotas;
        }
        }
        $html .='
           
          <tr>
            <td colspan="7">TOTAL</td>
            <td class="total"> $'.$total_dia.'</td>
          </tr>
          <tr>
            <td colspan="7">SUBTOTAL</td>
            <td class="total"> $'.$totalCuotas.'</td>
          </tr>
          <tr>
            <td colspan="7" class="grand total">GRAND TOTAL</td>
            <td class="grand total"> $'.$total_dia.'</td>
          </tr>
        </tbody>
      </table>
     
    </main>';

$mpdf=new mPDF('C','A4');
$css=file_get_contents('../Shared/css/stylepdf.css');
$mpdf ->writeHTML($css,1);
$mpdf->writeHTML($html);
$mpdf->Output('informe.pdf','I');

      }
      }
?>