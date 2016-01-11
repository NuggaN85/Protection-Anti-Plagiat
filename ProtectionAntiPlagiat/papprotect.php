<?php
//===== Récuperation des fichiers externe.
require($base_dir.'check/data.php');
//==========

//===== Récuperation des ip v4 & v6 du client.
function getip() {
    $ip = '';
    if(getenv('HTTP_CLIENT_IP'))
        $ip = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ip = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ip = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ip = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
        $ip = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ip = getenv('REMOTE_ADDR');
    else
        $ip = 'UNKNOWN';
    return $ip;
}
//==========

//===== Donnée des attaques de bot aspirateur.
$user = getenv('HTTP_USER_AGENT') . "\n"; 
if(in_array("$user", $bannav)){ die(); } // Liste des aspirateurs en fichier externe 'bannav.php'.
foreach ($bannav as $banned) { $comparaison = strstr($user, $banned);
    if($comparaison!==false) {
        $tentative++;
    }
}
//==========

//===== Récuperation des infos avec fichier auto écrit.
if($tentative > 0){
   $files = fopen("papprotect-log.cnx", "a"); // Fichier cnx auto inclus a la racine avec le protectionantiplagiat.php.
   $log = ('[Information] Aspirateur : '.$user.' Adresse ip : '.getip().''); // Le texte que vous voulez avoir dans votre fichier protectionantiplagiat.cnx.
   fwrite($files, "\n" . $log);
   fclose($files);
   echo utf8_decode('[Sécurité] Notre site web est protégé, vos information sont enregistrer <br><br>[Information] : '.$user.' '.getip().''); // Le texte que vous voulez que le voleur recevra dans les fichiers télécharger.
//==========

   die(); } 

?>
