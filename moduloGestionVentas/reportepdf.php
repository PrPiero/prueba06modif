<?php 


class Reportepdf {

    public static function ReporteShow($arregloInformes)
    {
    
      date_default_timezone_set("America/Lima");
      $fecha=date("Y-m-d");
require_once('../Shared/lib/pdf/mpdf.php');
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
      <h1>REPORTE DE INFORMES</h1>
     
      <div id="project">
    
        <div><span>COLABORADOR</span> Hamet Calderon</div>
        <div><span>EMAIL</span> <a href="mailto:AFFAREX@gmail.com">AFFAREX@gmail.com</a></div>
        <div><span>FECHA </span>'.$fecha.'</div>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="f">N° Informe</th>
            <th class="f">Total Informe</th>
            <th class ="f">Fecha</th>            

          </tr>
        </thead>
        <tbody>';

     

      
        $total_informes=0;
        foreach ($arregloInformes as $informes) 
        {
      
            $html .='<tr>
            <td class="f">'.$informes['idinforme'].'</td>
            <td  class ="f">'.$informes['total_dia'].'</td>
            <td class="f" >'.$informes['fecha'].'</td>            
          </tr>';
      
          $total_informes= $informes['total_dia']+$total_informes;         
        }
        $html .='
           
          <tr>
            <td colspan="4" class="f" >TOTAL</td>
            <td class="f"> $'.$total_informes.'</td>
          </tr>          
        </tbody>
      </table>
     
    </main>';

$mpdf=new mPDF('c','A4');
$css=file_get_contents('../Shared/css/style.css');
$mpdf ->writeHTML($css,1);
$mpdf->writeHTML($html);
$mpdf->Output('reporte.pdf','I');

      }
      }
?>