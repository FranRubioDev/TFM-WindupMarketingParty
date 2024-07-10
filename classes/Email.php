<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email {

    public $email;
    public $nombre;
    public $token;
    
    public function __construct($email, $nombre, $token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion() {

         // create a new object
         $mail = new PHPMailer();
         $mail->isSMTP();
         $mail->Host = $_ENV['EMAIL_HOST'];
         $mail->SMTPAuth = true;
         $mail->Port = $_ENV['EMAIL_PORT'];
         $mail->Username = $_ENV['EMAIL_USER'];
         $mail->Password = $_ENV['EMAIL_PASS'];

         // Configurar el tipo de seguridad
         $mail->SMTPSecure = 'ssl'; // Utilizar SSL
     
         $mail->setFrom('hola@franrubio.dev');
         $mail->addAddress($this->email, $this->nombre);
         $mail->Subject = 'Confirma tu Cuenta';

         // Set HTML
         $mail->isHTML(true);
         $mail->CharSet = 'UTF-8';

         $contenido = '<html>';
         $contenido .= "<p><strong>Hola " . $this->nombre .  "</strong> Te has registrado correctamente en Windup Marketing Party, pero es necesario confirmarla</p>";
         $contenido .= "<p>Haz click aquí: <a href='" . $_ENV['HOST'] . "/confirmar-cuenta?token=" . $this->token . "'>Confirmar Cuenta</a>";       
         $contenido .= "<p>Si no has creado tu la cuenta, puedes ignorar el mensaje</p>";
         $contenido .= '</html>';
         $mail->Body = $contenido;

         // Enviar el mail
         if(!$mail->send()) {
             echo 'El mensaje no pudo ser enviado.';
             echo 'Mailer Error: ' . $mail->ErrorInfo;
         } else {
             echo 'El mensaje ha sido enviado';
         }
    }

    public function enviarInstrucciones() {

        // create a new object
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = $_ENV['EMAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Port = $_ENV['EMAIL_PORT'];
        $mail->Username = $_ENV['EMAIL_USER'];
        $mail->Password = $_ENV['EMAIL_PASS'];

        // Configurar el tipo de seguridad
        $mail->SMTPSecure = 'ssl'; // Utilizar SSL
    
        $mail->setFrom('hola@franrubio.dev');
        $mail->addAddress($this->email, $this->nombre);
        $mail->Subject = 'Reestablece tu contraseña';

        // Set HTML
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';

        $contenido = '<html>';
        $contenido .= "<p><strong>Hola " . $this->nombre .  "</strong> Has solicitado reestablecer tu contraseña, sigue el siguiente enlace para hacerlo.</p>";
        $contenido .= "<p>Presiona aquí: <a href='" . $_ENV['HOST'] . "/recuperar?token=" . $this->token . "'>Reestablecer Password</a>";        
        $contenido .= "<p>Si tu no solicitaste este cambio, puedes ignorar el mensaje</p>";
        $contenido .= '</html>';
        $mail->Body = $contenido;

        // Enviar el mail
        if(!$mail->send()) {
            echo 'El mensaje no pudo ser enviado.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'El mensaje ha sido enviado';
        }
    }
}
