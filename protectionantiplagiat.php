<?php
//include('../check/check.cnx');
//require '../check/copyright.js';

//$filename = '../check/copyright.js';
//if (file_exists($filename)) {
//	return false;
//}
//    return true;
//  }
/*!
 * protectionantiplagiat init v1.0
 * Dev: NuggaN85
 * Github: NuggaN85
 * Twitter: @NuggaN85
 * Copyright © 2015 All rights reserved.
 * Licensed under CC BY 3.0
 */
//----------------------------------
//récuperation des ip du client 
//----------------------------------
function getip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
//--------------------------
//récuperation de l'url
//--------------------------
function geturl() {
    $pageURL = 'http';
    if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
        $pageURL .= "://";
    if ($_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
    } else {
        $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    }
    return $pageURL;
}
//------------------------------------------
//donnée des attaques de bot aspirateur
//------------------------------------------
$navigateur = $_SERVER["HTTP_USER_AGENT"];
$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
$bannav = Array('HTTrack', 'SiteSucker', 'Ezooms', 'EasouSpider', 'Baiduspider', 'AhrefsBot', 'HTTPClient', 'hors ligne', 'httpdown', 'Offline', 'PageGrabber', 'SiteSnagger', 'Teleport', 'WebCapture', 'WebCopier', 'webcopy', 'WebMirror', 'WebReaper', 'WebZIP', 'Alexibot', 'Aqua_Products', 'asterias', 'b2w', 'BackDoor', 'BackWeb', 'BackStreet', 'Bandit', 'BatchFTP', 'Black.Hole', 'BlackWidow', 'BlowFish', 'BotALot', 'BotRightHere', 'BuiltBotTough', 'Bullseye', 'bumblebee', 'BunnySlippers', 'capture', 'Cegbfeieh', 'CheeseBot', 'CherryPicker', 'CherryPickrElite', 'CherryPickerSE', 'ChinaClaw', 'clipping', 'clsHTTP', 'collage', 'Copernic', 'Copier', 'CopyRightCheck', 'Cosmos', 'Crescent', 'Custo', 'DA ', 'Demon', 'Density', 'Disco', 'disco', 'DISCoFinder', 'DittoSpyder', 'Download', 'eCatch', 'EirGrabber', 'Email', 'email', 'EmeraldShield', 'emporter', 'EroCrawler', 'Extractor', 'EyeNetIE', 'FairAd', 'Filangy', 'Flaming', 'FlashGet', 'FlickBot', 'Foobot', 'FrontPage', 'Gaisbot', 'GetRight', 'GetSmart', 'GetWeb', 'GetWebPage', 'gigabaz', 'Go-Ahead', 'Go!Zilla', 'GornKer', 'gotit', 'Grabber', 'GrabNet', 'Grafula', 'Hari', 'Harvest', 'hloader', 'HMSE_Robot', 'HMView', 'httplib', 'humanlinks', 'Indy', 'InfoNaviRobot', 'Iron', 'InterGET', 'Intraformant', 'Jenny', 'Jetcar', 'JOC', 'JustView', 'kapere', 'Kenjin', 'larbin', 'LeechFTP', 'LexiBot', 'LibWeb', 'LinkScan', 'LinkextractorPro', 'LinkWalker', 'LNSpiderguy', 'loader', 'lwp-trivial', 'Microsoft.URL', 'Microsoft URL', 'Missigua', 'Mister PiX', 'Mata', 'MIDown', 'MIIxpc', 'MJ12bot', 'moget', 'NetAnts', 'NetMechanic', 'Navroad', 'NearSite', 'NetAttache', 'NetMechanic', 'NetSpider', 'NetZIP', 'NICErsPRO', 'Ninja', 'NPBot', 'Octopus', 'Offline', 'Openbot', 'Openfind', 'Oracle', 'PageGrabber', 'Papa', 'pavuk', 'pcBrowser', 'PerMan', 'PersonaPilot', 'PingALink', 'ProPower', 'ProWeb', 'Python', 'PycURL', 'QuepasaCreep', 'QueryN', 'Quester', 'Radiation', 'RealDownload', 'Reaper', 'Recorder', 'ReGet', 'replacer', 'RepoMonkey', 'RMA', 'SearchExpress', 'searchpreview', 'SiteSnagger', 'SlySearch', 'SmartDownload', 'snagger', 'Snake', 'spanner', 'SpankBot', 'Stripper', 'Sucker', 'SuperBot', 'SuperHTTP', 'Surfbot', 'suzuran', 'Syntryx', 'Szukacz', 'Telesoft', 'TheNomad', 'TightTwatBot', 'Titan', 'toCrawl', 'True_Robot', 'turingos', 'TurnitinBot', 'URL Control', 'URL de contrôle', 'UrlDispatcher', 'urllib', 'URL_Spider_Pro', 'URLy', 'Vampire', 'VCI', 'Veuve', 'VoidEYE', 'WebAuto', 'WebBandit', 'WebCapture', 'Webclipping', 'webcollage', 'webcopy', 'WebEMail', 'WebEnhancer', 'WebFetch', 'webfetch', 'WebGo', 'Web Image', 'Web.Image', 'WebIndexer', 'WebLeacher', 'WebmasterWorld', 'WebMiner', 'WebMirror', 'WebPictures', 'WebSauger', 'Website', 'Webster', 'WebStripper', 'Web Sucker', 'WebWalker', 'WebWhacker', 'WebZIP', 'Wget', 'WWW-Collector', 'wwwoffle', 'Whacker', 'whizbang', 'Zeus', 'Python-urllib'); //Ajoutez différents user-agent dans la liste
foreach ($bannav as $banned) {
    $comparaison = strstr($navigateur, $banned);
    if(strstr($navigateur, $banned)) {
	    $write_this = '[Information] Aspirateur : '.$navigateur.' Host : '.$hostname.' Adresse ip : ' .getip(); // Le texte que vous voulez avoir dans votre fichier protectionantiplagiat.cnx
		$tentative++;
	}
}
//----------------------------------------------------
// récuperation des infos avec fichier auto écrit
//----------------------------------------------------
if($tentative > 0){
	$write_here = fopen("protectionantiplagiat.cnx", "a"); // Fichier cnx auto inclus a la racine avec le protectionantiplagiat.php
	fwrite($write_here, "\n" . $write_this);
	fclose($write_here);
	echo utf8_decode( '[Sécurité] Notre site web est protégé contre le vole et le spam, vos information serons automatiquement bannie sur la base de donnée de projecthoneypot <br><br> [Information] : '.$navigateur.' '.$hostname.' '.getip().''); // Le texte que vous voulez que le voleur recevra dans les fichiers télécharger	
//-------------------------
// Notification emails
//-------------------------
$email_expediteur = 'noreply@protection-anti-plagiat.com'; 
$email_reply = 'noreply@protection-anti-plagiat.com';
$headers = 'From: "PAP.COM" <'.$email_expediteur.'>'."\n"; 
$headers .= 'Return-Path: <'.$email_reply.'>'."\n";
$headers .= 'Content-Type: text/html; charset="iso-8859-1"'."\r\n";
$headers .= 'Content-Transfer-Encoding: 8bit';
$destinataire .= 'VOTRE EMAIL';
$sujet .= '[protection-anti-plagiat]';
$message = '[Information] <br><br>Aspirateur : '.$navigateur.' <br><br>Url : '.geturl().' <br><br>Host : '.$hostname.' <br><br>Adresse ip : '.getip().'';
if(mail($destinataire,$sujet,$message,$headers))
	
	die();
} 

?>
