<?php
//===== Les includes des fichier externe
if (file_exists($base_dir.'papprotect')) {
  require_once ($base_dir.'bad_bots.php');
} else {
  die('S\'il vous plaît mettre les fichiers dans le répertoire papprotect !');
}
//==========
?>
