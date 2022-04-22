<?php
#IACSAsistema@gmail.com
#IACSAPC4.

$correo = $_POST['Correo'];
$asunto = $_POST['Asunto'];
$mensaje = $_POST['Mensaje'];


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'iacsasistema@gmail.com';
    $mail->Password   = 'IACSAPC4.';
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    //Recipients
    $mail->setFrom('iacsasistema@gmail.com', 'IACSA');
    $mail->addAddress($correo);
    //Content
    $mail->isHTML(true);
    $mail->Subject = $asunto;
    $mail->Body    = $mensaje . '
                   
                    <br>
                    <br>
                    <br>
                    <p style="color: green;"> 
                    Ingeniería, Automatización y Control Industrial, S.A. DE C.V. <br>
                    44 Poniente No, 502 <br> 
                    Esq. Blvd. 5 de Mayo <br>
                    Colonia Santa María C. P. 72080 <br>
                    Puebla. Pue. México. <br>
                    Tel. (222) 220 5444 <br>
                    </p>
                    ';
    $mail->CharSet = 'UTF-8';


    $mail->send();
    echo '<script type="text/javascript">
    alert("Se ha enviado el mensaje ha este correo' . $correo . '")
    window.location.href="../../Proveedores.php";
    </script>';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
