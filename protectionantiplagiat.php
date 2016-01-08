<?php
/*!
* protectionantiplagiat init v1.0
* Dev: NuggaN85
* Github: NuggaN85
* Twitter: @NuggaN85
* Copyright © 2015 All rights reserved.
* Licensed under CC BY 3.0
*/
require($base_dir.''autoloader.php'');
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
$useragent = $_SERVER['HTTP_USER_AGENT'] . "\n";
if(in_array("$useragent", $bannav)){ die(); } // Liste des aspirateurs en fichier externe 'bannav.php'.
foreach ($bannav as $banned) { $comparaison = strstr($useragent, $banned);
    if($comparaison !== false) {
        $tentative++;
    }
}
//----------------------------------------------------
// récuperation des infos avec fichier auto écrit
//----------------------------------------------------
if($tentative > 0){
   $files = fopen("protectionantiplagiat.cnx", "a"); // Fichier cnx auto inclus a la racine avec le protectionantiplagiat.php.
   $log = '[Information] Aspirateur : '.$useragent.' Adresse ip : ' .getip(); // Le texte que vous voulez avoir dans votre fichier protectionantiplagiat.cnx.
   fputs($files, "\n" . $log);
   fclose($files);
   echo utf8_decode('[Sécurité] Notre site web est protégé, vos information sont enregistrer <br><br>[Information] : '.$useragent.' '.getip().''); // Le texte que vous voulez que le voleur recevra dans les fichiers télécharger.
	
   die(); } 

?>
