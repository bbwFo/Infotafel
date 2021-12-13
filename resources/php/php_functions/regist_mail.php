<?php

$USERNAME = $_POST["USERNAME"];
$EMAIL = $_POST["EMAIL"];

include 'db.php';

$zeile = $db -> prepare("SELECT code FROM user WHERE username = '$USERNAME'");
$zeile -> execute();
$db_result = $zeile -> fetchAll();

foreach ($db_result as $spalte) {
  $CODE = $spalte["code"];
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../../vendor/autoload.php';

$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->Host = "smtp.strato.de";
$mail->SMTPAuth = true;
$mail->Username = "info@ark-life.net";
$mail->Password = "Jumper8925";

$mail->setFrom("noreply@ark-life.net", 'ARK-LIFE.NET');
$mail->addAddress($EMAIL, $USERNAME);

// //Attachments
// $mail->addAttachment('/var/tmp/file.tar.gz');
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');

//Content
$mail->isHTML(true);
$mail->Subject = 'Willkommen bei ARK-LIFE.NET '.$USERNAME.'!';
$mail->Body    = 'Dein Aktivierungscode ist: <b>'.$CODE.'</b>';
$mail->AltBody = 'Dein Aktivierungscode ist: '.$CODE;

$mail->send();

?>
