<?php
/*!
* protectionantiplagiat init v1.0
* Dev: NuggaN85
* Github: NuggaN85
* Twitter: @NuggaN85
* Copyright © 2015 All rights reserved.
* Licensed under CC BY 3.0
*/
function getnav() {
if (preg_match_all("#Opera (.*)(\[[a-z]{2}\];)?$#isU", $_SERVER["HTTP_USER_AGENT"], $version))
{
	$navigateur = 'Opéra ' . $version[1][0];
}
elseif (preg_match_all("#MSIE (.*);#isU", $_SERVER["HTTP_USER_AGENT"], $version))
{
	$navigateur = 'Internet Explorer ' . $version[1][0];
}
elseif (preg_match_all("#Firefox(.*)$#isU", $_SERVER["HTTP_USER_AGENT"], $version))
{
	$version = str_replace('/', '', $version[1][0]);
	$navigateur = 'Firefox ' . $version;
}
elseif (preg_match_all("#Chrome(.*) Safari#isU", $_SERVER["HTTP_USER_AGENT"], $version))
{
	$version = str_replace('/', '', $version[1][0]);
	$navigateur = 'Chrome ' . $version;
}
elseif (preg_match_all("#Opera(.*) \(#isU", $_SERVER["HTTP_USER_AGENT"], $version))
{
	$version = str_replace('/', '', $version[1][0]);
	$navigateur = 'Opéra ' . $version;
}
elseif (preg_match("#Nokia#", $_SERVER["HTTP_USER_AGENT"]))
{
	$navigateur = 'Nokia';
}
elseif (preg_match("#Safari#", $_SERVER["HTTP_USER_AGENT"]))
{
	$navigateur = 'Safari';
}
elseif (preg_match("#SeaMonkey#", $_SERVER["HTTP_USER_AGENT"]))
{
	$navigateur = 'SeaMonkey';
}
elseif (preg_match("#PSP#", $_SERVER["HTTP_USER_AGENT"]))
{
	$navigateur = 'PSP';
}
elseif (preg_match("#Netscape#", $_SERVER["HTTP_USER_AGENT"]))
{
	$navigateur = 'Netscape';
}
else
{
	$navigateur = 'Inconnu';
}
?>
