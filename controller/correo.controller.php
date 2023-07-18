<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class ControllerCorreos
{
  static public function ctrEnviarCorreoRegistro($correoElectronico)
  {
    $mail = new PHPMailer(true);

    try {
      $mail->isSMTP();
      $mail->Host       = 'smtp.gmail.com';
      $mail->SMTPAuth   = true;
      $mail->Username   = 'dpoblette258@gmail.com';
      $mail->Password   = 'eanewnkcpscqibch';
      $mail->SMTPSecure = 'ssl';
      $mail->Port       = 465;

      //Recipients
      $mail->setFrom('dpoblette258@gmail.com', 'Notificacion Service Desk Qroma');

      $mail->addAddress($correoElectronico);

      //Content
      //$message=file_get_contents('../PhpMailer/correos/correoOFAEnviada.php');
      $message = '<h2>Nueva Solicitud Service Desk</h2>';

      $message .= '<p><strong>Se ha generado una nueva solicitud en el Service Desk, se le enviará un correo cuando esta haya sido atendida.</strong></p>';

      $message .= '<p style="font-family:tahoma, verdana, segoe, sans-serif;line-height:18px;color:#999999;font-size:12px">Este correo se envía de forma automática. Este email es informativo. No responder este correo.</p>';

      $mail->CharSet = "UTF-8";
      $mail->isHTML(true);
      $mail->Subject = 'Nueva solicitud en servicedesk Qroma';
      //$mail->Body    = $message;
      $mail->Body = $message;

      $mail->send();
      echo 'Enviado Correctamente';
    } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
  }

  static public function ctrEnviarCorreoAtencion($correoElectronico, $respuesta)
  {
    $mail = new PHPMailer(true);

    try {
      $mail->isSMTP();
      $mail->Host       = 'smtp.gmail.com';
      $mail->SMTPAuth   = true;
      $mail->Username   = 'dpoblette258@gmail.com';
      $mail->Password   = 'eanewnkcpscqibch';
      $mail->SMTPSecure = 'ssl';
      $mail->Port       = 465;

      //Recipients
      $mail->setFrom('dpoblette258@gmail.com', 'Notificacion Service Desk Qroma');

      $mail->addAddress($correoElectronico);

      //Content
      //$message=file_get_contents('../PhpMailer/correos/correoOFAEnviada.php');
      $message = '<h2>Nueva Respuesta Equipo de Soporte Qroma</h2>';

      $message .= '<p><strong>Tiene una nueva respuesta del ticket :</strong></p>';
      $message .= '<p>'.$respuesta.'</p>';

      $message .= '<p style="font-family:tahoma, verdana, segoe, sans-serif;line-height:18px;color:#999999;font-size:12px">Este correo se envía de forma automática. Este email es informativo. No responder este correo.</p>';

      $mail->CharSet = "UTF-8";
      $mail->isHTML(true);
      $mail->Subject = 'Nueva Respuesta Equipo de Soporte Qroma';
      //$mail->Body    = $message;
      $mail->Body = $message;

      $mail->send();
      echo 'Enviado Correctamente';
    } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
  }

}