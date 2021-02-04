<?php

    class CI_Bienvenida {

      public static function BienvenidaShow($listaPrivilegios)
      {
          //session_start();
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

              <title>Bienvenido</title>
          </head>
          <body>
              <div>
                  <h1>Bienvenido <?php echo $_SESSION['nombre']; ?></h1>
                  <h2><?php echo $_SESSION['rol']; ?></h2>
              </div>
          <?php

              foreach ($listaPrivilegios as $registro)
              {

            

          ?>
          
          
          
                  <nav class="navbar-nav ml-auto">
                      <div class="container-fluid">
                          <div class="textnavbar">
                              <a><?php echo $registro['titulo']; ?></a>
                          </div>
                      </div> 
                  </nav><br>
                  <form action="<?php echo $registro['directorio'] ?>" method="POST">
                      <div class="gestion">
                          <button type="submit" name="<?php echo "btn".str_replace(' ','',$registro['titulo']); ?>" id="<?php echo "btn".str_replace(' ','',$registro['titulo']); ?>" style="border: 0px;"><img src="../Shared/img/<?php echo $registro['imagen']; ?>"></button>
                      </div>
                  </form><br>

                 
          <?php
              }
          ?>
              <!--<div class="padre">
                  <a href="../Shared/CerrarSesion.php" class="btn btn-danger" role="button">Cerrar Sesión</a>
              </div>-->
            <div class="padre">
                <form action="../Shared/CerrarSesion.php">
                    <button type="submit" class="btn btn-primary" name="btncerrarsesion" id="btncerrrasesion">Cerrar Sesion</button>
                </form>
            </div>
              <!-- Optional JavaScript -->
              <!-- Popper.js first, then Bootstrap JS -->
              <script src="https://kit.fontawesome.com/ffec4ec2ed.js" crossorigin="anonymous"></script>
              <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
              <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
          </body>
          </html>
<?php
      }
}
?>