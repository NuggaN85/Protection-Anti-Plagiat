<?php 
//===== Les includes des fichier externe
if (file_exists(dirname(__FILE__) . 'papprotect')) {
  require_once(dirname(__FILE__) . 'bad_bots.php');
} else {
  die('S\'il vous plaît mettre les fichiers dans le répertoire papprotect!');
}
//==========
?>
