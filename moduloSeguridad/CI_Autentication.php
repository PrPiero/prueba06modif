<?php

    class CI_Autentication {

        public function AutenticationShow()
        {
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
                <link rel="stylesheet" href="Shared/css/style.css" />

                <title>Login</title>
            </head>
            <body>
                <br><br>          
                <img src="Shared/img/affarex_black.png" class="rounded mx-auto d-block"/>
                <div class="formsesion">
                    <form class="mb-5" method="POST" action="moduloSeguridad/getUsuario.php">
                        <div class="align-self-center w-100 px-lg-5 py-lg-4 p-4 row g-3">
                            <h1 class="text-center">Bienvenido de vuelta</h1>
                            <div class="mb-4">
                                <div class="campo1">
                                    <label for="exampleInputEmail1" class="form-label font-weight-bold text-dark">Email</label>
                                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Ingresa tu email" aria-describedby="passwordHelpInline" >
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="campo1">
                                    <label for="exampleInputPassword1" class="form-label font-weight-bold text-dark">Contraseña</label>
                                    <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Ingresa tu contraseña">
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="campo1">
                                    <button type="submit" class="btn btn-primary" name="btnAceptar" id="btnAceptar">Iniciar sesión</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <p class="mb-1">
		                    <a href="/Project-AFFAREX/moduloSeguridad/restablecer.php">He olvidado mi contraseña</a>
		                </p>


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