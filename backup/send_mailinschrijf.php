<?php
include_once(__DIR__ . '/init.php');

$naam = $_POST['naam'];
$achternaam = $_POST['achternaam'];
$straat = $_POST['straat'];
$postcodeplaats = $_POST['postcodeplaats'];
$posted_email = $_POST['email'];
$telefoonnummer = $_POST['telefoonnummer'];
$studie = $_POST['studie'];
$beroep = $_POST['beroep'];
$opmerkingen_vragen = $_POST['opmerkingen_vragen'];
$inschrijving = $_POST['inschrijving'];
foreach($inschrijving as $item){
$list .= $item." ";
}

$email = new fEmail;
$email->addRecipient('lauraelbertsen@gmail.com', 'Laura Elbertsen');
$email->setFromEmail('info@goddessfusion.com');
$email->setSubject('Reactie van reactieformulier van Goddess Fusion.com');

$body = <<<EOT
Er is een reactie gestuurd via de website Goddessfusion.com

Naam: $naam
Achternaam: $achternaam
Straat: $straat
Postcode en plaats: $postcodeplaats
Email: $posted_email
Telefoonnummer: $telefoonnummer
Studie: $studie
Beroep: $beroep
Opmerkingen/vragen: $opmerkingen_vragen
Heeft zich ingeschreven voor: $list \n

EOT;
$email->setBody($body);

try {
    $email->send();
    header("Location:bevestiging_mail_verstuurd.html");
    exit;
}
catch (Exception $e) {
    header("Location:mail_foutmelding.html");
    exit;    
}
?>