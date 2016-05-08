<?php
//===== Récuperation des fichiers externe.
require ($base_dir.'check/data.php');
//==========

//===== Récuperation des ip v4 & v6 du client.
function getip() {
    $client  = getenv('HTTP_CLIENT_IP');
    $forward = getenv('HTTP_X_FORWARDED_FOR');
    $remote  = getenv('REMOTE_ADDR');

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}
//==========

//===== Récuperation du port et du host.
$up = getenv('REMOTE_PORT');
$uh = gethostbyaddr($_SERVER['REMOTE_ADDR']);
//==========

//===== Donnée des attaques de bot aspirateur.
$ua = getenv('HTTP_USER_AGENT');
// Liste des aspirateurs en fichier externe 'bannav.php'.
if(in_array("$ua", $bannav, true)) { die(); }
foreach ($bannav as $banned) { $comparaison = strstr($ua, $banned);
    if($comparaison!==false) {
        $tentative++;
    }
}
//==========

//===== Récuperation des infos avec fichier auto écrit.
if($tentative > 0) {
if (!function_exists('file_put_contents')) {
    function file_put_contents($files) {  
    } 
}         
// Fichier cnx auto inclus a la racine avec le papprotect.php.
   $files = fopen($base_dir."papprotect/papprotect-log.cnx", "a");
// Le texte que vous voulez avoir dans votre fichier papprotect-log.cnx.
   $log = ('['.$ua.'] ['.getip().'] ['.$up.'] ['.$uh.']');
   fputs($files, "\n" . $log);
   flock($files, LOCK_SH);
   fclose($files);
// Le texte que vous voulez que le voleur recevra dans les fichiers télécharger.
   echo utf8_decode('Notre site web est protégé, vos information sont enregistrer, ['.$ua.'] ['.getip().']');
//==========

   die(); } 

?>
