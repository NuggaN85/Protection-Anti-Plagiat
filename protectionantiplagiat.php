<?php
/*!
* protectionantiplagiat init v1.0
* Dev: NuggaN85
* Github: NuggaN85
* Twitter: @NuggaN85
* Copyright © 2015 All rights reserved.
* Licensed under CC BY 3.0
*/
$base_dir = 'chek/';
require($base_dir.'os.php');
require($base_dir.'navigateur.php');
require($base_dir.'bannav.php');
//------------------------------------------
//récuperation des ip v4 & v6 du client 
//------------------------------------------
function getip() {
    $ipaddress = '';
    if(getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
//---------------------------------------------
//récuperation de l'url pour le multi site
//---------------------------------------------
function geturl() {
    $pageURL = 'http';
    if($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
        $pageURL .= "://";
    if($_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
    } else {
        $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    }
    return $pageURL;
}
//------------------------------------------
//donnée des attaques de bot aspirateur
//------------------------------------------
$user_agent = $_SERVER['HTTP_USER_AGENT'] . "\n";
$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
if(in_array("$user_agent", $bannav)){ die(); } // Liste des aspirateurs en fichier externe 'bannav.php'.
foreach ($bannav as $banned) { $comparaison = strstr($user_agent, $banned);
    if($comparaison !== false) {
       $write_this = '[Information] Aspirateur : '.$user_agent.' Host : '.$hostname.' Adresse ip : ' .getip(); // Le texte que vous voulez avoir dans votre fichier protectionantiplagiat.cnx.
       $tentative++;
    }
}
//----------------------------------------------------
// récuperation des infos avec fichier auto écrit
//----------------------------------------------------
if($tentative > 0){
   $write_here = fopen("protectionantiplagiat.cnx", "a"); // Fichier cnx auto inclus a la racine avec le protectionantiplagiat.php.
   fwrite($write_here, "\n" . $write_this);
   fclose($write_here);
   echo utf8_decode( '[Sécurité] Notre site web est protégé contre le vole et le spam, vos information serons automatiquement bannie sur la base de donnée de projecthoneypot <br><br> [Information] : '.$user_agent.' '.$hostname.' '.getip().''); // Le texte que vous voulez que le voleur recevra dans les fichiers télécharger.	
//-------------------------
// Notification emails
//-------------------------
$email_expediteur = 'noreply@protection-anti-plagiat.com'; 
$email_reply = 'noreply@protection-anti-plagiat.com';
$headers = 'From: "PAP.COM" <'.$email_expediteur.'>'."\n"; 
$headers .= 'Return-Path: <'.$email_reply.'>'."\n";
$headers .= 'Content-Type: text/html; charset="iso-8859-1"'."\r\n";
$headers .= 'Content-Transfer-Encoding: 8bit';
$destinataire .= 'VOTRE EMAIL';
$sujet .= '[protection-anti-plagiat]';
$message = '[Information] <br><br>Aspirateur : '.$user_agent.' <br><br>Url : '.geturl().' <br><br>Host : '.$hostname.' <br><br>Adresse ip : '.getip().'';
if(mail($destinataire,$sujet,$message,$headers))
	
    die();
} 

?>
