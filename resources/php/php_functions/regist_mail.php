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

$mail->Body    = '<h3><span style="color: #111111;">Hallo '.$USERNAME.',</span></h3>
                  <p><span style="color: #111111;">Wir heisen dich in unserer Community herzlich Willkommen und w&uuml;nschen dir viel spa&szlig;!</span></p>
                  <p><span style="color: #111111;">Mit diesem Aktivierungscode kannst du deinen Acount freischalten.</span></p>
                  <p><span style="color: #111111;">Gib den Code nicht an andere weiter.</span></p>
                  <h3><strong><span style="color: #111111;"><span style="color: #3366ff;">'.$CODE.'</span></span></strong></h3>

                  <p>oder</p>

                  <a href="http://localhost/Infotafel/index.php?code='.$CODE.'">http://localhost/Infotafel/index.php?code='.$CODE.'</a>

                  <p>Mit freundlichen Gr&uuml;&szlig;en das ARK-LIFE.NET Team.</p>';


$mail->AltBody = 'Dein Aktivierungscode ist: '.$CODE;

$mail->send();

?>
