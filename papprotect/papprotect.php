<?php
//===== Récupération des fichiers externes.
// initialisation des variables
$base_dir = __DIR__ . '/';
$tentative = 0;

// Récupération des fichiers externes
$protect_file = $base_dir . 'papprotect/papprotect.php';
$log_file = $base_dir . 'papprotect/papprotect-log.cnx';

if (!file_exists($protect_file)) {
  die('Les fichiers de protection sont manquants!');
} else {
  require_once($protect_file);
}

// Fonction pour récupérer l'adresse IP de l'utilisateur
function getUserIP()
{
  foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED_PROTO', 'HTTP_CF_VISITOR', 'HTTP_CF_CONNECTING_IP', 'X-Real-IP', 'REMOTE_ADDR') as $key) {
    if (array_key_exists($key, $_SERVER) === true) {
      foreach (array_map('trim', explode(',', $_SERVER[$key])) as $ip) {
        if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) !== FALSE) {
          return $ip;
        } else {
          return $ip;
        }
      }
    }
  }
  return '';
}

//===== Récupération du port et du host.
$ra = $_SERVER['REMOTE_ADDR'];
$up = $_SERVER['REMOTE_PORT'];

//===== Données des attaques de bot aspirateur.
$ss = $_SERVER['SERVER_SOFTWARE'];
$ua = $_SERVER['HTTP_USER_AGENT'];
$sf = $_SERVER['SCRIPT_FILENAME'];

// Liste des aspirateurs en fichier externe "bad_bots.php". 
$bad_bots = require($base_dir . 'papprotect/bad_bots.php');

if (in_array($ua, $bad_bots, true)) {
    die();
} else {
    $tentative = 0;
    foreach ($bad_bots as $banned) {
        if (strpos($ua, $banned) !== false) {
            $tentative++;
        }
    }
}

//===== Récupération des infos avec fichier auto-écrit.
if ($tentative > 0) {
    if (!function_exists("file_put_contents")) {
        function file_put_contents($files) {  
        } 
    } 
  
 // Fichier papprotect-log.cnx auto inclus à la racine du dossier papprotect. 
    $files = fopen($base_dir . "papprotect/papprotect-log.cnx", "a");
  
// Le texte que vous voulez avoir dans votre fichier papprotect-log.cnx.
    $log = "[" . $ss . "] [" . $ua . "] [" . getUserIP() . "] [" . $up . "] [" . $ra . "] [" . $sf . "]";
    fputs($files, "\n" . $log);
    flock($files, LOCK_SH);
    fclose($files);
  
// Le texte que vous voulez que le voleur reçoive dans les fichiers téléchargés.
$message = "Votre téléchargement est en cours de traitement. Veuillez patienter...";
echo '<div style="text-align:center;"><img src="https://camo.githubusercontent.com/e73fb5bda4df97a30987b09cae8cf58b6e76ac7f1ca41753671050be1a6e5c33/68747470733a2f2f65787465726e616c2d636f6e74656e742e6475636b6475636b676f2e636f6d2f69752f3f753d68747470732533412532462532467777772e666964656c697a617274652e7074253246626c6f6725324677702d636f6e74656e7425324675706c6f616473253246323031392532463039253246315f312d31303234783536312e706e6726663d31266e6f66623d31266970743d646631653837663661336238313133653333663135633463616161373863306333306438313630656132633933643039636131626435666565356338363661372669706f3d696d61676573" border="0" /></div>';
echo "<br><br>";
echo utf8_decode('<div style="width: 100%; text-align: center; font-weight: bold">[Site web est protégé, vos informations sont enregistrées] <br><br>'.$ss.' '.$ua.' <br><br>IP CLIENT : '.getUserIP().' <br><br>PORT CLIENT : '.$up.' <br><br>HOST CLIENT : '.$ra.'</div>');
echo "<br><br>";
echo utf8_decode('<div style="width: 100%; text-align: center; font-weight: bold">[Website is protected, your information is recorded] <br><br>'.$ss.' '.$ua.' <br><br>IP CLIENT : '.getUserIP().' <br><br>PORT CLIENT : '.$up.' <br><br>HOST CLIENT : '.$ra.'</div>');

      exit(); } 
?>
