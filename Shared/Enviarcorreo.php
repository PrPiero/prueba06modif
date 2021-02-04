
<?php 


    

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

session_start();   //REANUDAMOS LA SESION CREADA EN LA PAGINA getformCorreo.php
$varsesion=$_SESSION['email'];  
$varID=$_GET["varID"];  //obtenemos el valor del id  enviado por el header location y lo guardamos en la variable #varID
$varid=$_SESSION['id']; //guarda la sesion de valor=$varID en la variable $varid 
//$varid !=$varID esta comparacion sirve para eviten ingresar cuando cambian el valor del id por la url ,es decir deben ser iguales ya que se esta enviando el mismo valor y no diferentes.
if ($varid != $varID || $varsesion == null ||  $varsesion=='' || $varid==null ) {
    echo "Acceso no permitido";
    ?>
    <form action="../index.php" method="post">
    <br>
    <input type="submit" value="Inicio">
    <?php
    die();              //Esto significa que ahi pare la aplicacion y nada de codigo que este por debajo se ejecute

}
//$EmailRecibido=$_GET["Email"];  //RECIBIMOS EL VALOR DEL CORREO enviado por header location
$mail = new PHPMailer(true);  //Instanciando la clase PHPMailer
//$varID=$_GET["varID"];

try {
    
    //Server settings
    $mail->SMTPDebug = 0;                     // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'affarex2021@gmail.com';                     // SMTP username
    $mail->Password   = 'affarex123456';                               // SMTP password
    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    $mail->IsHTML(true);
    //Recipients
    $mail->setFrom('affarex2021@gmail.com', 'Empresa Affarex'); //emisor
    $mail->addAddress($varsesion);     // receptor(es)
   

   

    // Content
    $mail->isHTML(true);                                  // para que el correo acepte formato HTML
    $mail->Subject = 'Restablecer Contrasenia';
    $mail->Body    =  ' 
    
    
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
<form action="http://localhost:90/Project-AFFAREX/moduloSeguridad/getFormRestablecerContrasenia.php?varCambio='.$varsesion.'&varid='.$varid.' " method="post" >
<h1>Ingresar al siguiente formulario</h1>
<input type="submit" value="Ingresar" name="enviar">
</form>
</body>
</html>
    
    ' ;

    $mail->send();
    echo 'El mensaje se envio correctamente';
 ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar correo</title>
</head>
<body>
<br>
<br>
<form action="../moduloSeguridad/getComprobarDatos.php?boton=botonsubmit" method="post">
    <input type="submit" value="Volver">
    <input type="hidden" name="id" value="<?php echo $varID;?>">
    </form>
</body>
</html>

   <?php 
} catch (Exception $e) {
    echo 'Error al enviar el mensaje:', $mail->ErrorInfo;
}
session_destroy(); //destruimos la sesiones(eliminamos sus valores) para que al actualizar la pagina o al acceder desde otra ventana no tenga acceso y evitar enviar varios correos 
?>

