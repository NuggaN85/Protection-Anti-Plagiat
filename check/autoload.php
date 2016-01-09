<?php

 $base_dir = 'check/';
 
 function _autoload($b, $f){
  $check = $b . $f; 
  if(!file_exist($check)){
   echo false;
  }
  else {
   echo true;
  }
 }
 
 if( _autoload($base_dir, 'protectionantiplagiat.php') == false ){
  die();
 }
 
?>
