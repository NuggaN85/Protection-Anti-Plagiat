<?php
$email_expediteur = 'noreply@protection-anti-plagiat.com'; 
$email_reply = 'noreply@protection-anti-plagiat.com';
$headers = 'From: "PAP.COM" <'.$email_expediteur.'>'."\n"; 
$headers .= 'Return-Path: <'.$email_reply.'>'."\n";
$headers .= 'Content-Type: text/html; charset="iso-8859-1"'."\r\n";
$headers .= 'Content-Transfer-Encoding: 8bit';
$destinataire .= 'VOTRE EMAIL';
$sujet .= '[protection-anti-plagiat]';
$message = ''.$useragent.' '.$os.' '.$navigateur.'';
if(mail($destinataire,$sujet,$message,$headers))
?>
