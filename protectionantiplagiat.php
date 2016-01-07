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
	
    die();
} 

?>
