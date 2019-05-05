<?php
//===== Les includes des fichier externe
if (file_exists(__DIR__.'papprotect')) {
  require (__DIR__.'bad_bots.php');
} else {
  die('S\'il vous plaît mettre les fichiers dans le répertoire papprotect!');
}
//==========
?>
