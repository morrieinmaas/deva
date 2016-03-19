<?php
include_once(__DIR__ . '/init.php');

$naam = $_POST['naam'];
$posted_email = $_POST['email'];
$opmerkingen_vragen = $_POST['opmerkingen_vragen'];

$email = new fEmail;
$email->addRecipient('lauraelbertsen@gmail.com', 'Laura Elbertsen');
$email->setFromEmail('info@goddessfusion.com');
$email->setSubject('Reactie van reactieformulier van Goddess Fusion.com');

$body = <<<EOT
Er is een reactie gestuurd via de website Goddessfusion.com

Naam: $naam
Email: $posted_email
Opmerkingen/vragen: $opmerkingen_vragen

EOT;
$email->setBody($body);

try {
    $email->send();
    header("Location:bevestiging_mail_verstuurd_en.html");
    exit;
}
catch (Exception $e) {
    header("Location:mail_foutmelding_en.html");
    exit;    
}
?>
