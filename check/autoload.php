<?php
$base_dir = 'chek/';
require_once($base_dir.'os.php');
require_once($base_dir.'navigateur.php');
require_once($base_dir.'bannav.php');

function __autoload($base_dir)
{
    require('protectionantiplagiat.php', $base_dir);
}
if(!file_exist('protectionantiplagiat.php'){ 
    
    die(); 
}
?>
