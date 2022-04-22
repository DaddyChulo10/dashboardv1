<?php
session_start();
if (isset($_SESSION['ID'])) {
    header("Location: Index.php");
} else {
?>
    <!DOCTYPE html>
    <html dir="ltr">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Login </title>
        <link href="dist/css/style.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <!--Alertas-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
        <!-- -->

    </head>

    <body>
        <div class="main-wrapper">

            <div class="preloader">
                <div class="lds-ripple">
                    <div class="lds-pos"></div>
                    <div class="lds-pos"></div>
                </div>
            </div>

            <div style="background:url(assets/images/big/auth-bg.jpg) no-repeat center center;" class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative">
                <div class="auth-box row">
                    <div class="col-3"></div>
                    <div class="col-6 bg-white">
                        <h2 class="mt-3 text-center text-dark">Entrar </h2>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="text-dark">Usuario</label>
                                    <input class="form-control" id="user" type="text" placeholder="Escribe tu usuario...">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="text-dark">Contraseña</label>
                                    <input class="form-control" id="pwd" type="password" placeholder="Escribe tu contraseña...">
                                </div>
                            </div>
                            <div class="col-lg-12 text-center">
                                <button onclick="login('enviar')" class="btn btn-block btn-dark">Entrar</button>
                                <br><br>
                            </div>

                        </div>
                    </div>
                    <div class="col-3"></div>
                </div>
            </div>
        </div>

        <script>
            function login(enviar) {
                var user = $('#user').val();
                var pwd = $('#pwd').val();
                var enviar = enviar;

                if (user == '' || pwd == '') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Campos vacios',
                        text: 'Por favor llene los campos',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    console.log('Campos vacios');
                } else {
                    $.ajax({
                        url: 'php/login/login.php',
                        method: 'GET',
                        data: {
                            enviar: enviar,
                            user: user,
                            pwd: pwd,
                        },
                        success: function(r) {
                            console.log(r);
                            if (r == 'Error') {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Usuario o contraseña erroneos',
                                    showConfirmButton: false,
                                    timer: 3000
                                })
                                console.log('Usuario o contraseña erroneos');
                            } else if (r == 'Correcto') {
                                /*
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Bien...',
                                    text: 'Datos correctos',
                                    showConfirmButton: false,
                                    timer: 1500
                                }) */
                                setTimeout(
                                    function() {
                                        window.location.replace("Index.php");
                                    },1);
                                console.log('Datos correctos');
                            }
                        }
                    });
                }
            }
        </script>


        <script src="assets/libs/jquery/dist/jquery.min.js "></script>
        <!-- <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script> -->
        <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js "></script>
        <script>
            $(".preloader ").fadeOut();
        </script>
    </body>

    </html>
<?php
}
?>