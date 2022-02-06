<?php

$SERVER_HOST = 'smtp.strato.de';
$SERVER_USERNAME = 'noreply@ark-life.net';
$SERVER_PASSWORD = 'Jumper8925';



$UUID = $_POST['UUID'];





$USERDATA = get_values('user', $UUID, array('username', 'email');

$VERYCODE = gen_very();

db_update('user', $UUID, array('verycode' => $VERYCODE));






// -----------------------------------------------------------------------------

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php';

$mail = new PHPMailer(true);

// CONFIG
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->Host = $SERVER_HOST;
$mail->Username = $SERVER_USERNAME;
$mail->Password = $SERVER_PASSWORD;

// SENDER
$mail->setFrom("noreply@ark-life.net", 'ARK-LIFE.NET');

// EMPFÄNGER
$mail->addAddress($USERDATA['email'], $USERDATA['username']);

// ANHÄNGE
// $mail->addAttachment('/var/tmp/file.tar.gz');
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');

// CONTENT
$mail->isHTML(true);
$mail->Subject = 'Willkommen bei ARK-LIFE.NET '.$USERDATA['username'].'!';
$mail->Body    = '<a href="http://localhost/Infotafel/index.php?verycode='.$VERYCODE.'">http://localhost/Infotafel/index.php?verycode='.$VERYCODE.'</a>';
$mail->AltBody = '<a href="http://localhost/Infotafel/index.php?verycode='.$VERYCODE.'">http://localhost/Infotafel/index.php?verycode='.$VERYCODE.'</a>';

// ABSCHICKEN
$mail->send();

?>
