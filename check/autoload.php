<?php
$base_dir = 'chek/';
require_once($base_dir.'os.php');
require_once($base_dir.'navigateur.php');
require_once($base_dir.'bannav.php');

if (file_exists($base_dir)) {
    require('protectionantiplagiat.php');
  }
?>
